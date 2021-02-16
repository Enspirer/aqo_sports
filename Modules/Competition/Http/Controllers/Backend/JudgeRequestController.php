<?php

namespace Modules\Competition\Http\Controllers\Backend;

use App\Models\Auth\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\CompetitionRule;
use Modules\Competition\Entities\JudgeDetails;
use DataTables;
class JudgeRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($competition_id)
    {
        $competitionDetails = Competition::where('id',$competition_id)->first();

        return view('competition::backend.judge_request.index',[
            'competitionDetails' => $competitionDetails
        ]);
    }


    public function judgeRequetDetails($competition_id)
    {

        $compeition =JudgeDetails::where('competition_id',$competition_id)->get();
        return Datatables::of($compeition)
            ->addColumn('action', function($row){
                $btn1 = '<a href="'.route('admin.competition.judgeRequest.show',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-eye"></i> View </a>';

                return $btn1;

            })
            ->addColumn('judge_name', function($row){
                $userDetails = User::where('id',$row->user_id)->first();

                return $userDetails->first_name.' '.$userDetails->last_name;
            })
            ->rawColumns(['action'])
            ->make();

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
       return view('competition::backend.judge_request.show');
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
