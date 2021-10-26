<?php

namespace Modules\Competition\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;
use Modules\Competition\Entities\Organizer;
use App\Models\Auth\User;
class OrganizerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('competition::backend.organizer_request.index');
    }

    public function show($id)
    {
        $orgaizerDetails = Organizer::where('id',$id)->first();
        $userDetails = User::where('id',$orgaizerDetails->user_id)->first();
        return view('competition::backend.organizer_request.show',[
            'user_details' => $userDetails,
            'organizer_details' => $orgaizerDetails
        ]);
    }


    public function getTableDetails()
    {
        $compeition = Organizer::all();
        return Datatables::of($compeition)
            ->addColumn('action', function($row){
                $btn1 = '<a href="'.route('admin.competition.organizer_request.show',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-eye"></i> View </a>';
                return $btn1;
            })
            ->addColumn('user_details', function($row){
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
        $glmi = Organizer::where('id',$request->id)->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.competition.organizer_request.index')->withFlashSuccess('Updated Successfully');
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
