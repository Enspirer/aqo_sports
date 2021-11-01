<?php

namespace Modules\Competition\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\CompetitionRule;
use Modules\Competition\Entities\Competitor;
use DataTables;

class LeaderBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    // public function index()
    // {
    //     return view('frontend.user.leader_board');
    // }

    public function index()
    {
        return view('frontend.user.leader_board');
    }

    public function getCompetitions(Request $request)
    {

        $user_id = auth()->user()->id;

        $data = Competitor::where('user_id', $user_id)
            ->where('competitor_status', 1)
            ->get();

        

        
        if($request->ajax())
        {
            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('frontend.user.my_leader_board.get_competition_score', $data->competition_id).'" name="view" id="'.$data->competition_id.'" class="view btn btn-primary btn-sm ml-3" style="margin-right: 10px">View Score </a>';
                
                    return $button;
                })

                ->addColumn('competition_name', function($data){
                    $name = Competition::where('id', $data->competition_id)->first()->competition_name;
                 
                    return $name;
                })

                ->rawColumns(['action','competition_name'])
                ->make(true);
        }
        
        return back();
    }


    public function getCompetitionScore($id)
    {
        $competitionDetails = Competition::where('id',$id)->first();
        $markSection = json_decode($competitionDetails->marks_sections);
        $roundSection = json_decode($competitionDetails->rounds_section);
        $competitorDetails = Competitor::where('competition_id',$id)->where('competitor_status',1)->get();

        return view('frontend.user.leader_board_score',[
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
