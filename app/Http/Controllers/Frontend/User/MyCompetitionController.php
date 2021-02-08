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
        $competitorDetails = Competitor::where('user_id',auth()->user()->id)
            ->where('competitor_status',1)
            ->get();

        $mycompetitions = [];
        foreach ($competitorDetails as $myCompetition)
        {
            $getCompetitionDetails = Competition::where('id',$myCompetition->competition_id)->first();
            $output = [
                'competition_name' => $getCompetitionDetails->competition_name,
                'description' => $getCompetitionDetails->description,
                'feature_image' => $getCompetitionDetails->feature_image,
            ];
            array_push($mycompetitions,$output);
        }

        return view('frontend.user.my_competition',[
            'my_competitions' => $mycompetitions
        ]);
    }
}
