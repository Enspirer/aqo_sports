<?php

namespace Modules\Competition\Http\Controllers\Backend;

use App\Models\Auth\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\CompetitionRule;
use Modules\Competition\Entities\Competitor;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($competitionID)
    {
        $competitionDetails = Competition::where('id',$competitionID)->first();
        $markSection = json_decode($competitionDetails->marks_sections);
        $roundSection = json_decode($competitionDetails->rounds_section);
        $competitorDetails = Competitor::where('competition_id',$competitionID)->get();

        $treml = get_competitor_all_score(1);




        return view('competition::backend.score_board.view_score',[
            'markSection' => $markSection,
            'roundSection' => $roundSection,
            'competitor_details' => $competitorDetails,
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
        return view('competition::show');
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
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
