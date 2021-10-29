<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\Competitor;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.user_dashboard');
    }
}
