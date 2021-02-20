<?php

namespace Modules\Competition\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\Competitor;
use Modules\Competition\Entities\JudgeDetails;

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
        return view('frontend.user.competitor_page',[
            'competitor_details' => $competitiorDetails,
            'competition_details' => $competitionDetails
        ]);
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
}
