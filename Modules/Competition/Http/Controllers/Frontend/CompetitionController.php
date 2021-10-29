<?php

namespace Modules\Competition\Http\Controllers\Frontend;

use App\Models\Auth\User;
use App\Models\CompetitionVotes;
use function GuzzleHttp\Promise\all;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\CompetitionCategory;
use Carbon\Carbon;
use Modules\Competition\Entities\Competitor;
use Modules\Competition\Entities\JudgeDetails;
use Modules\Competition\Entities\Organizer;
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
        $keyword = $request->search_keyword;

        return redirect()->route('frontend.explorer', ['category', $keyword ,'desc', 'country', 'start_date', 'end_date']);

    }


    public function searchFilters(Request $request)
    {
        if(request('countries') != null) {
            $country = request('countries');
        }
        else {
            $country = 'country';
        }

        if(request('categories') != null) {
            $category_id = request('categories');
        }
        else {
            $category_id = 'category';
        }

        if(request('start_date') != null) {
            $start_date = request('start_date');
        }
        else {
            $start_date = 'start_date';
        }

        if(request('end_date') != null) {
            $end_date = request('end_date');
        }
        else {
            $end_date = 'end_date';
        }


        $keyword = 'keyword';
        $sort = 'desc';
        

        return redirect()->route('frontend.explorer', [
            $category_id,
            $keyword,
            $sort,
            $country,
            $start_date,
            $end_date,
        ]);
    }


    public function explorer($category_id, $keyword, $sort, $country, $start_date, $end_date)
    {

        $categories = CompetitionCategory::all();
        $competitions = Competition::query();
        $categoryDetails = CompetitionCategory::where('id',$category_id)->first();

        if($categoryDetails){
            $categoryName = $categoryDetails->category_name;
        }
        else{
            $categoryName = 'all competitions';
        }

        if($category_id != 'category' ){
            $competitions =  $competitions->where('id', $category_id);
        }

        if($sort == 'desc'){
            $competitions = $competitions->orderBy('started_date','desc');
        }
        elseif ($sort == 'asc'){
            $competitions = $competitions->orderBy('started_date','asc');
        }


        if($start_date != 'start_date' && $end_date != 'end_date') {
            $competitions->where('started_date', '>=', $start_date)->where('end_date', '<=', $end_date);
        }
        elseif($start_date != 'start_date' && $end_date == 'end_date'){
            $competitions->where('started_date', '>=', $start_date);
        }
        elseif($start_date == 'start_date' && $end_date != 'end_date'){
            $competitions->where('end_date', '<=', $end_date);
        }


        if($keyword != 'keyword'){
            $competitions->where('competition_name', 'like', '%' .  $keyword . '%');
        }

        $competitions = $competitions->get();


        return view('competition::frontend.explorer',
            [
                'categories' => $categories,
                'competitions' => $competitions,
                'category_name' => $categoryName,
                'keyword' => $keyword,
                'start_date' => $start_date,
                'end_date' => $end_date
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
        $organizerDetails = Organizer::where('user_id',$competitionDetails->user_id)->first();

        $competitionDetails = Competition::where('id',$id)->first();
        $markSection = json_decode($competitionDetails->marks_sections);
        $roundSection = json_decode($competitionDetails->rounds_section);
        $competitorDetails = Competitor::where('competition_id',$id)->get();

    

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
            'categoryDetails' => $categoryDetails,
            'organizer_details' => $organizerDetails,
            'markSection' => $markSection,
            'roundSection' => $roundSection,
            'competitor_details' => $competitorDetails,
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


    public function competitionVoting(Request $request)
    {    
        
        $user_id = auth()->user()->id;
            
        $vote = new CompetitionVotes;

        $competitor = Competitor::where('id', $request->competitor_id)->first()->user_id;
        
        $vote->user_id = $user_id;
        $vote->vote = 1;
        $vote->competitor_id = $request->competitor_id;
        $vote->competition_id = $request->competition_id;


        $vote->save();
   
        return back()->with(['success' => 'success', 'competitor' => $competitor]);          

    }
}
