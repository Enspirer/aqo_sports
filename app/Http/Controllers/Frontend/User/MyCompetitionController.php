<?php

namespace App\Http\Controllers\Frontend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\Competitor;
use Modules\Competition\Entities\Performance;

class MyCompetitionController extends Controller
{
    public function index()
    {
        $competitorDetails = Competitor::where('user_id', auth()->user()->id)
            ->where('competitor_status', 1)
            ->get();

        $mycompetitions = [];
        foreach ($competitorDetails as $myCompetition) {
            $getCompetitionDetails = Competition::where('id', $myCompetition->competition_id)->first();
            $output = [
                'id' => $getCompetitionDetails->id,
                'competition_name' => $getCompetitionDetails->competition_name,
                'description' => $getCompetitionDetails->description,
                'feature_image' => $getCompetitionDetails->feature_image,
            ];
            array_push($mycompetitions, $output);
        }

        return view('frontend.user.my_competition', [
            'my_competitions' => $mycompetitions,
        ]);
    }

    public function performance_page($id)
    {
        $competitionDetails = Competition::where('id', $id)->first();
        $competitiorDetails = Competitor::where('competition_id', $id)
            ->where('user_id', auth()->user()->id)

            ->first();

        $roundSection = json_decode($competitionDetails->rounds_section);
        $marksSection = json_decode($competitionDetails->marks_sections);



        return view('frontend.user.perfermance', [
            'competitorDetails' => $competitiorDetails,
            'competitionDetails' => $competitionDetails,
            'roundDetails' => $roundSection,
            'marksSections' => $marksSection
        ]);
    }

    public function postPerformance(Request $request)
    {
        $forfomance = Competitor::where('id', $request->competitor_id)
            ->update([
               'performance_link' => $request->performance_link,
               'performance_description' => $request->performance_description
            ]);
        return back();
    }

    public function save_performance(Request $request)
    {
        if($request->performance_id == null)
        {
            $performance = new Performance;
            $performance->performance_link = $request->performance_link;
            $performance->competition_id = $request->competition_id;
            $performance->competitor_id = $request->competitior_id;
            $performance->round_name = $request->round;
            $performance->performance_description = $request->description;
            $performance->full_score = 0;
            $performance->score_details = null;
            $performance->save();

        }else{
            Performance::where('id',$request->performance_id)
                ->whereYear('created_at',date('Y'))
                ->update([
               'performance_link' =>  $request->performance_link,
               'competition_id' =>  $request->competition_id,
               'competitor_id' =>  $request->competitior_id,
               'round_name' =>  $request->round,
               'performance_description' =>  $request->description,
               'full_score' =>  0,
               'score_details' =>  $request->score_details,
            ]);
        }

        return back();

    }


}
