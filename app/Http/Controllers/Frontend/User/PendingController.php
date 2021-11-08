<?php

namespace App\Http\Controllers\Frontend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\Competitor;
use App\Models\Auth\User;
use function GuzzleHttp\Promise\all;


class PendingController extends Controller
{
    public function pending_competition()
    {
        $getDetails = Competitor::where('user_id',auth()->user()->id)
            ->where('competitor_status',0)
            ->get();
        $competitionID = [];

        if(count($getDetails) != 0)
        {
            foreach ($getDetails as $getDetail)
            {
                $CompetitionDetails = Competition::where('id',$getDetail->competition_id)->first();

                $competitionDetailsArray = [
                    'competition_name' =>$CompetitionDetails->competition_name,
                    'category_id' =>$CompetitionDetails->category_id,
                    'feature_image' =>$CompetitionDetails->feature_image,
                    'competitor_id' =>$getDetail->id,
                    'competition_id' =>$CompetitionDetails->id, 
                    'register_form' =>$CompetitionDetails->register_form,
                ];

                array_push($competitionID,$competitionDetailsArray);
            }
        }else{
            $competitionID = null;
        }
        return view('frontend.user.pending_competition',
            [
                'getDetails' => $competitionID
            ]);
    }

    public function com_reg_form($id)
    {
        // dd($id);
        $competition_details = Competition::where('id',$id)->first();
       
        return view('frontend.user.pending_com_reg',[
            'competition_details' => $competition_details
        ]);
    }

    public function register_request_update(Request $request)
    {
        dd($request);

        $competitionDetails = Competition::where('id',$request->competition_id)->first();
        $competitior = self::registerupdateDetails($request,$competitionDetails->register_form);
        $competitor = new Competitor;
        $competitor->user_id = auth()->user()->id;
        $competitor->competitior_type = 1;
        $competitor->competitor_status  = 0;
        $competitor->score  = 0;
        $competitor->description  = 0;
        $competitor->competition_id  = $request->competition_id;
        $competitor->competition_form  = $competitionDetails->register_form;
        $competitor->competition_details  = json_encode($competitior);

        Competitor::where('id',$request->competition_id)->update(['status' => $request->status]);

        return back()->with('competition_applied', 'competition_applied');
    }


    public static function registerupdateDetails ($request,$register_form)
    {
        $requestValue = array_except($request->all(), ['_token']);
        $registerDetails = json_decode($register_form);
        $finalOur = [];
        foreach ($registerDetails as $registerDetail)
        {
            if (isset($registerDetail->name)){
                if($request->file($registerDetail->name))
                {

                    $imageName = time().'.'.$request->file($registerDetail->name)->getClientOriginalExtension();
                    $fullURLs = $request->file($registerDetail->name)->move(public_path('files'), $imageName);
                    $value = $imageName;
                    $type = $request->file($registerDetail->name)->getClientOriginalExtension();
                }else{
                    $value = $requestValue[$registerDetail->name];
                    $type = 'text';
                }
            }else{
                $value = 'null';
                $type = 'not_input';
            }

            $output = [
              'label' => $registerDetail->label,
              'value' => $value,
              'type' => $type,
            ];
            array_push($finalOur,$output);
        }
        return $finalOur;
    }
}
