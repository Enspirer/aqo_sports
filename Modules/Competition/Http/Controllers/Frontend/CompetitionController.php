<?php

namespace Modules\Competition\Http\Controllers\Frontend;

use App\Models\Auth\User;
use function GuzzleHttp\Promise\all;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\CompetitionCategory;
use Carbon\Carbon;
class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('competition::index');
    }


    public function explorer($category_id,$keyword,$sort,$type,$contry,$start_date,$end_date)
    {
        $categories = CompetitionCategory::all();
        $competitions = Competition::query();




        if($category_id != 'all' ){
            $competitions =  $competitions->where('id',$category_id);
        }

        if($keyword != 'all')
        {
            $competitions = $competitions->where('name', 'like', $keyword );
        }

        if($sort == 'desc')
        {
            $competitions = $competitions->orderBy('started_date','desc');
        }elseif ($sort == 'asc')
        {
            $competitions = $competitions->orderBy('started_date','asc');
        }

        if($type == 'explorer')
        {

        }

        $competitions = $competitions->get();
        return view('competition::frontend.explorer',
            [
                'categories' => $categories,
                'competitions' => $competitions
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

        return view('competition::backend.competition.edit');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('competition::backend.competition.edit');
    }

    public function competition_page($id)
    {
        $competitionDetails = Competition::where('id',$id)->first();
        $carbonStartDate = new Carbon($competitionDetails->started_date);
        $carbonEndDate = new Carbon($competitionDetails->end_date);
        $carbonTody = new Carbon(today());
        $userDetails = User::where('id',$competitionDetails->user_id)->first();
        $gameRules = json_decode($competitionDetails->game_rules);


        if($carbonEndDate < $carbonTody)
        {
            $exp = 'Closed';
        }else{
            $exp = 'Open';
        }
        return view('competition::frontend.competition_page',[
            'competition_details' => $competitionDetails,
            'start_date' =>$carbonStartDate->format('M d Y'),
            'end_date' =>$carbonEndDate->format('M d Y'),
            'is_closed' => $exp,
            'userDetails' => $userDetails,
            'gameRule' => $gameRules,
        ]);
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
