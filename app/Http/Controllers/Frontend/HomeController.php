<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Modules\Competition\Entities\CompetitionCategory;
use Modules\Competition\Entities\Competition;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $competitionCategory = CompetitionCategory::all();
        $trendingCompetition = Competition::where('is_feature', 1)->get();
        return view('frontend.index',[
            'competitionCategory' => $competitionCategory,
            'trendingCompetition' => $trendingCompetition
        ]);

    }
}
