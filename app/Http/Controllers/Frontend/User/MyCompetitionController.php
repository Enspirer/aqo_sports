<?php

namespace App\Http\Controllers\Frontend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\Competitor;

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


        return view('frontend.user.perfermance', [
            'competitorDetails' => $competitiorDetails,
            'competitionDetails' => $competitionDetails
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


}
