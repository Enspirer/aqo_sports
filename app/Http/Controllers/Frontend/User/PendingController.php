<?php

namespace App\Http\Controllers\Frontend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\Competitor;

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
}
