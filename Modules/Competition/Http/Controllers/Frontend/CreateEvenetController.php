<?php

namespace Modules\Competition\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\Competitor;
use Modules\Competition\Entities\Organizer;
use Modules\Competition\Entities\CompetitionCategory;
class CreateEvenetController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $storeRequest = Organizer::where('user_id',auth()->user()->id)->first();
        $comeptition = Competition::where('user_id',auth()->user()->id)->get();


        return view('frontend.user.register_as_organizer',[
            'organizer_details' => $storeRequest,
            'competitions' => $comeptition
        ]);
    }

    public function create_competition()
    {
        $getCategory = CompetitionCategory::all();
        return view('frontend.user.orgz_create_competition',[
            'get_category' => $getCategory,
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
        $organizeer = new Organizer;
        $organizeer->organization = $request->organization;
        $organizeer->contact_details = $request->contact_details;
        $organizeer->address = $request->address;
        $organizeer->country = $request->country;
        $organizeer->status = 0;
        $organizeer->user_id = auth()->user()->id;
        $organizeer->save();
        return back();
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
