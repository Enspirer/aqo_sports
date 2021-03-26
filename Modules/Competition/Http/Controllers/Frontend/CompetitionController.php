<?php

namespace Modules\Competition\Http\Controllers\Frontend;

use App\Models\Auth\User;
use function GuzzleHttp\Promise\all;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\CompetitionCategory;
use Carbon\Carbon;
use Modules\Competition\Entities\Competitor;
use Modules\Competition\Entities\JudgeDetails;
use Modules\Competition\Http\Controllers\Backend\CategoryController;


class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

    }


    public function search(Request $request)
    {
        $requestdetails = $request->search_keyword;

        return redirect()->route('frontend.explorer',['all', $requestdetails ,'desc','explorer','all','null','null']);

    }


    public function explorer($category_id,$keyword,$sort,$type,$contry,$start_date,$end_date)
    {
        $categories = CompetitionCategory::all();
        $competitions = Competition::query();

        $categoryDetails = CompetitionCategory::where('id',$category_id)->first();

        if($categoryDetails)
        {
            $categoryName = $categoryDetails->category_name;

        }else{
            $categoryName = 'All';
        }

        if($category_id != 'all' ){
            $competitions =  $competitions->where('id',$category_id);
        }

        if($keyword != 'all')
        {
            $competitions = $competitions->where('competition_name', 'like', $keyword );
        }

        if($sort == 'desc')
        {
            $competitions = $competitions->orderBy('started_date','desc');
        }elseif ($sort == 'asc')
        {
            $competitions = $competitions->orderBy('started_date','asc');
        }

        if($type == 'explorer')
        {

        }
        $competitions = $competitions->get();


        return view('competition::frontend.explorer',
            [
                'categories' => $categories,
                'competitions' => $competitions,
                'category_name' => $categoryName,
                'keyword' => $keyword
            ]);
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('competition::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

        return view('competition::backend.competition.edit');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('competition::backend.competition.edit');
    }

    public function competition_page($id)
    {
        $competitionDetails = Competition::where('id',$id)->first();
        $carbonStartDate = new Carbon($competitionDetails->started_date);
        $carbonEndDate = new Carbon($competitionDetails->end_date);
        $carbonTody = new Carbon(today());
        $userDetails = User::where('id',$competitionDetails->user_id)->first();
        $gameRules = json_decode($competitionDetails->game_rules);
        $competiorDetails = Competitor::IsAppliedCompetition($id);
        $getCompetitorDetails = Competitor::getAppliedCompetitorsUsers($id,1);
        $categoryDetails = CompetitionCategory::where('id',$competitionDetails->category_id)->first();



        if($carbonEndDate < $carbonTody)
        {
            $exp = 'Closed';
        }else{
            $exp = 'Open';
        }
        return view('competition::frontend.competition_page',[
            'competition_details' => $competitionDetails,
            'start_date' =>$carbonStartDate->format('M d Y'),
            'end_date' =>$carbonEndDate->format('M d Y'),
            'is_closed' => $exp,
            'userDetails' => $userDetails,
            'gameRule' => $gameRules,
            'competitorDetails' => $competiorDetails,
            'getCompetitorDetails' => $getCompetitorDetails,
            'categoryDetails' => $categoryDetails
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function register_request(Request $request)
    {
        $competitionDetails = Competition::where('id',$request->competition_id)->first();
        $competitior = self::registerDetails($request,$competitionDetails->register_form);
        $competitor = new Competitor;
        $competitor->user_id = auth()->user()->id;
        $competitor->competitior_type = 1;
        $competitor->competitor_status  = 0;
        $competitor->score  = 0;
        $competitor->description  = 0;
        $competitor->competition_id  = $request->competition_id;
        $competitor->competition_form  = $competitionDetails->register_form;
        $competitor->competition_details  = json_encode($competitior);
        $competitor->save();
        return back();
    }


    public static function registerDetails ($request,$register_form)
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


    public function register_judge(Request $request)
    {
        $requestDetail = $request->competition_id;
        $details = Competition::where('id',$requestDetail)
            ->first();
        $OutputDetails = self::registerDetails($request,$details->judge_register_form);
        $judgeDetails = new JudgeDetails;
        $judgeDetails->user_id = auth()->user()->id;
        $judgeDetails->form_details = $details->judge_register_form;
        $judgeDetails->submit_details = json_encode($OutputDetails);
        $judgeDetails->competition_id = $requestDetail;
        $judgeDetails->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
