<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Modules\Competition\Entities\Organizer;
use Modules\Competition\Entities\JudgeDetails;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\Competitor;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $organizer = Organizer::get()->where('status',1)->count();
        $competition = Competition::get()->where('status',1)->count();
        $judgedetails = JudgeDetails::get()->where('status',1)->count();
        $competitor = Competitor::get()->count();
        
        return view('backend.dashboard',[
            'organizer' => $organizer,
            'competition' => $competition,
            'judgedetails' => $judgedetails,
            'competitor' => $competitor
        ]);
    }
}
