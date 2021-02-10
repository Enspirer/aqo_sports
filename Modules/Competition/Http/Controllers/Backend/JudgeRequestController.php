<?php

namespace Modules\Competition\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\CompetitionRule;

class JudgeRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($competition_id)
    {

//        return view('competition::index');
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

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($competition_id)
    {
        $competitionDetails = Competition::where('id',$competition_id)->first();
        $getCompetitionForm = json_decode($competitionDetails->judge_register_form);


        return view('competition::backend.judge_register_form.index',[
            'competitionDetails' => $competitionDetails,
            'judge_register_form' => $getCompetitionForm,
        ]);
    }

    public function postDetails (Request $request)
    {
        $id = $request->id;
        $register_form_data_judge = $request->register_form_data;

        Competition::where('id',$id)->update([
           'judge_register_form' => $register_form_data_judge
        ]);

        return back();
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
