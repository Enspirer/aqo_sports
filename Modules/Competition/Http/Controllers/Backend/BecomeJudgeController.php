<?php

namespace Modules\Competition\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\JudgeRequest;
use DataTables;
use App\Models\Auth\User;



class BecomeJudgeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('competition::backend.become_judge.index');
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
        $judge_details = JudgeRequest::where('id',$id)->first();
        $user_details = User::where('id',$judge_details->user_id)->first();

        return view('competition::backend.become_judge.show',[
            'user_details' => $user_details,
            'judge_details' => $judge_details
        ]);
    }

    public function get_details()
    {
        $judge_request = JudgeRequest::get();
        return Datatables::of($judge_request)
            ->addColumn('action', function($row){
                $btn1 = '<a href="'.route('admin.become_judge.show',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fas fa-info-circle"></i> View </a>';
                $btn2 = ' <button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                return $btn1.$btn2;
            })
            ->addColumn('status', function($data){
                if($data->status == 'Pending'){
                    $status = '<span class="badge badge-warning">Pending</span>';
                }
                else{
                    $status = '<span class="badge badge-success">Approved</span>';
                }   
                return $status;
            })
            ->rawColumns(['action','status'])
            ->make();
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
    public function update(Request $request)
    {
        $jr = JudgeRequest::where('id',$request->id)->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.become_judge.index')->withFlashSuccess('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data = JudgeRequest::findOrFail($id);
        $data->delete(); 
    }
}
