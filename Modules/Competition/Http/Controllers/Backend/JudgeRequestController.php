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
use Modules\Competition\Entities\Competitor;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class JudgeRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($competition_id)
    {
        $competitionDetails = Competition::where('id',$competition_id)->first();
        $competition = Competition::where('id',$competition_id)->first();
        return view('competition::backend.judge_request.index',[
            'competitionDetails' => $competitionDetails
        ]);
    }


    public function judgeRequetDetails($competition_id)
    {

        $compeition =JudgeDetails::where('competition_id',$competition_id)->get();
        return Datatables::of($compeition)
            ->addColumn('action', function($row){
                $btn1 = '<a href="'.route('admin.competition.judgeRequest.show',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fas fa-info-circle"></i> View </a>';
                $btn2 = ' <button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                return $btn1.$btn2;
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
        $judgeDetails = JudgeDetails::where('id',$id)->first();
        $userDetails = User::where('id',$judgeDetails->user_id)->first();
        $competionDetails = Competition::where('id',$judgeDetails->competition_id)->first();

        $requestFormDetails = json_decode($judgeDetails->submit_details);

        return view('competition::backend.judge_request.show',[
            'competitionDetails' => $competionDetails,
            'userDetais' => $userDetails,
            'JudgeformDetails' =>$requestFormDetails,
            'judgeDetails' => $judgeDetails
        ]);

    }

    public function ChangeStatus(Request $request)
    {
        if($request->status == 0)
        {
            $userDetails = User::find(1);
            $userDetails->revokePermissionTo('view judge function');


        }else if($request->status == 1)
        {
            $userDetails = User::find(1);
            $userDetails->givePermissionTo('view judge function');

        }else if($request->status == 2)
        {
            $userDetails = User::find(1);
            $userDetails->revokePermissionTo('view judge function');
        }
        JudgeDetails::where('id',$request->judge_id)->update([
           'status' => $request->status
        ]);

        return redirect()->route('admin.competition.judge_request.index',$request->competition_id)->withFlashSuccess('Updated Successfully');
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

        return redirect()->route('admin.competition')->withFlashSuccess('Added Successfully');

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
        $data = JudgeDetails::findOrFail($id);
        $data->delete(); 
    }
}
