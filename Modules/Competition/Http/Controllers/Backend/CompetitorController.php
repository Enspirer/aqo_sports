<?php

namespace Modules\Competition\Http\Controllers\Backend;

use App\Models\Auth\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\CompetitionCategory;
use Modules\Competition\Entities\Competitor;
use DataTables;

class CompetitorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($id)
    {
        $CompetitionDetails = Competition::where('id',$id)->first();



        return view('competition::backend.competitors.index',[
            'competitionDetails' => $CompetitionDetails
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

        $competitor = Competitor::where('id',$id)->first();

        $competionDetails = Competition::where('id',$competitor->competition_id)->first();
        $userDetails = User::where('id',$competitor->user_id)->first();
        $categoryDetails = CompetitionCategory::where('id',$competionDetails->category_id)->first();
        $requestFormDetails = json_decode($competitor->competition_details);



        return view('competition::backend.competitors.show',[
                'competitorDetails' => $competitor,
                'competitionDetails' => $competionDetails,
                'userDetais' => $userDetails,
                'categoryDetails' => $categoryDetails,
                'competitionformDetails' =>$requestFormDetails
            ]);
    }

    public function changeStatus(Request $request)
    {
        $competitions = Competitor::where('id',$request->competitor_id)->update(
            [
                'competitor_status' => $request->accept_status
            ]
        );

        return back();

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
        $data = Competitor::findOrFail($id);
        $data->delete(); 
    }

    public function getTableDetails($id)
    {
        $competitors = Competitor::where('competition_id',$id)->get();

        return Datatables::of($competitors)
            ->addColumn('competitor_name', function($row){
                $userDetails = User::where('id',$row->user_id)->first();
                return $userDetails->first_name.' '.$userDetails->last_name;
            })
            ->addColumn('action', function($row){
                $btn1 = '<a href="'.route('admin.competitior.show',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fas fa-info-circle"></i> View </a>';
                $btn2 = ' <a href="" class="edit btn btn-primary btn-sm"><i class="fa fa-bars"></i> Performance</a>';
                $btn3 = ' <button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                return $btn1.$btn2.$btn3;
            })
            ->rawColumns(['action'])
            ->make();
    }
}
