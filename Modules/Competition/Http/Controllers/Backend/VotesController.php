<?php

namespace Modules\Competition\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Auth\User;
use App\Models\CompetitionVotes;
use DataTables;
use Modules\Competition\Entities\Competitor;
use Modules\Competition\Entities\Competition;

class VotesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($id)
    {
        // dd($id);
        $competition = Competition::where('id',$id)->first();

        return view('competition::backend.votes.index',[
            'competition' => $competition
        ]);
    }

    public function get_details($id)
    {
        $competitors = Competitor::where('competition_id',$id)->get();
        // dd($competitors);

        return Datatables::of($competitors)           
            
            ->addColumn('competitor_name', function($row){                      
                
                $competitor = CompetitionVotes::where('competitor_id',$row->id)->first();
                
                $competitor_user = User::where('id',$row->user_id)->first();
                
                return $competitor_user->first_name.' '.$competitor_user->last_name;
            })

            ->addColumn('votes', function($row){
                $votes_count = CompetitionVotes::where('competitor_id',$row->id)->count();

                return $votes_count;
            })
            ->rawColumns(['competitor_name','votes'])
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
