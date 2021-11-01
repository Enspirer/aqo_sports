<?php

namespace Modules\Competition\Http\Controllers\Frontend;

use App\Models\Auth\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\Competitor;
use Modules\Competition\Entities\JudgeDetails;
use DB;
use Modules\Competition\Entities\JudgmentMarks;
use App\Models\JudgeRequest;

class MyJudgmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $competotorIDs = JudgeDetails::getJudgeCompetition(auth()->user()->id);
        $competitionDetails = Competition::wherein('id',$competotorIDs)->get();
        return view('frontend.user.my_judgment',[
            'competition_details' => $competitionDetails,
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


    public function viewCompetitor($id)
    {
        $competitiorDetails = Competitor::where('id',$id)->first();
        $competitionDetails = Competition::where('id',$competitiorDetails->competition_id)
            ->first();
        $userDetails = User::where('id',$competitiorDetails->user_id)
            ->first();

        $roundSection = json_decode($competitionDetails->rounds_section);
        $marksSection = json_decode($competitionDetails->marks_sections);


        return view('frontend.user.competitor_page',[
            'competitorDetails' => $competitiorDetails,
            'competitionDetails' => $competitionDetails,
            'user_details' => $userDetails,
            'marksSections'=>$marksSection,
            'roundDetails' => $roundSection,
        ]);
    }


    public static function generateCompetitorAllScore($competitor_id)
    {
        $getJudgeResult = JudgmentMarks::where('competitor_id',$competitor_id)
            ->get();

        $resultOut = [];

        foreach ($getJudgeResult as $judmentResult)
        {
            $judgementResult = json_decode($judmentResult->judge_score_details);
            array_push($resultOut,$judgementResult);
        }


    }

    public function add_marks_judge(Request $request)
    {
        // dd($request);

        if($request->marks != null){
            
            $markSection = $request->mark_section;
            $marks = $request->marks;
            $round_name = $request->round_section;
            $competitor_id = $request->competitor_id;
            $competition_id = $request->competition_id;
            $getCompetitorDetails = Competitor::where('id',$competitor_id)->first();
            $getCompetitionDetails = Competition::where('id',$competition_id)->first();
            $calulateAllScore = array_sum($marks);
            self::generateCompetitorAllScore($competitor_id);
            $finalArrayMarks = [];
            foreach ($markSection as $key => $marksections)
            {
                $arrayout = [
                'mark_section' => $marksections,
                'score' => $marks[$key]
                ];
                array_push($finalArrayMarks,$arrayout);
            }
                $judgeDetails = new JudgmentMarks;
                $judgeDetails->judge_id = auth()->user()->id;
                $judgeDetails->competitor_id = $competitor_id;
                $judgeDetails->competition_id = $competition_id;
                $judgeDetails->score = $getCompetitorDetails->score;
                $judgeDetails->judge_score = $calulateAllScore ;
                $judgeDetails->competitor_all_score = $getCompetitorDetails->score;
                $judgeDetails->judge_score_details = json_encode($finalArrayMarks);
                $judgeDetails->competitor_all_score_details = 1;
                $judgeDetails->round_name = $round_name;
                $judgeDetails->save();

        }else{
            
            $markSection = $request->mark_section;
            $marks_update = $request->marks_update;
            $round_name = $request->round_section;
            $competitor_id = $request->competitor_id;
            $competition_id = $request->competition_id;
            $getCompetitorDetails = Competitor::where('id',$competitor_id)->first();
            $getCompetitionDetails = Competition::where('id',$competition_id)->first();
            $calulateAllScore = array_sum($marks_update);
            self::generateCompetitorAllScore($competitor_id);
            $finalArrayMarks = [];
            foreach ($markSection as $key => $marksections)
            {
                $arrayout = [
                'mark_section' => $marksections,
                'score' => $marks_update[$key]
                ];
                array_push($finalArrayMarks,$arrayout);
            }
                $judgeDetails = new JudgmentMarks;
                $judgeDetails->judge_id = auth()->user()->id;
                $judgeDetails->competitor_id = $competitor_id;
                $judgeDetails->competition_id = $competition_id;
                $judgeDetails->score = $getCompetitorDetails->score;
                $judgeDetails->judge_score = $calulateAllScore ;
                $judgeDetails->competitor_all_score = $getCompetitorDetails->score;
                $judgeDetails->judge_score_details = json_encode($finalArrayMarks);
                $judgeDetails->competitor_all_score_details = 1;
                $judgeDetails->round_name = $round_name;

                JudgmentMarks::where('round_name',$round_name)->where('judge_id',auth()->user()->id)->where('competitor_id',$request->competitor_id)->where('competition_id',$request->competition_id)->update($judgeDetails->toArray());

            

        }

        

        return back();
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
        $competitiorDetails = Competitor::getAppliedCompetitorsUsers($id,1);
        $competitionDetails = Competition::where('id',$id)->first();
        return view('frontend.user.view_judgment',[
            'competitorDetails' => $competitiorDetails,
            'competitionDetails' =>$competitionDetails
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('competition::edit');
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

    /**
     * Remove the specified reCsource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function judge_form(Request $request)
    {

       if($request->file('id_card'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->id_card->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->id_card->move(public_path('files/judge_form'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $add = new JudgeRequest;

        $add->judge_name=$request->judge_name; 
        $add->institute=$request->institute;
        $add->introduction=$request->introduction;
        $add->skills=$request->skills;
        $add->user_id=auth()->user()->id;
        $add->id_card=$image_url;
        $add->status='Pending';
        $add->save();

        return redirect()->route('frontend.user.dashboard')->withFlashSuccess('The request has been sent successfully'); 
    }

    public function judge_form_update(Request $request)
    {

       if($request->file('id_card'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->id_card->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->id_card->move(public_path('files/judge_form'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $detail = JudgeRequest::where('id',$request->hidden_id)->first();
            $image_url = $detail->id_card;
        } 

        $update = new JudgeRequest;

        $update->judge_name=$request->judge_name; 
        $update->institute=$request->institute;
        $update->introduction=$request->introduction;
        $update->skills=$request->skills;
        $update->user_id=auth()->user()->id;
        $update->id_card=$image_url;
        $update->status='Pending';
        
        JudgeRequest::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('frontend.user.dashboard')->withFlashSuccess('Updated request has been sent successfully'); 
    }

}
