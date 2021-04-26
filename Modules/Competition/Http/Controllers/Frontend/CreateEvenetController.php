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

    public function orz_create_competition_store(Request $request)
    {
        $validatedData = $request->validate([
            'competition_name' => 'required:max:255',
            'competition_description' => 'required',
            'is_feature' => 'required',
            'category' => 'required',
            'payment_type' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $competition = new Competition;
        $competition->competition_name = $request->competition_name;
        $competition->description = $request->competition_description;
        $competition->is_feature = $request->is_feature;
        if($request->file('feature_image'))
        {
            //Feature Images
            $imageName = time().'.'.$request->feature_image->getClientOriginalExtension();
            $fullURLs = $request->feature_image->move(public_path('files'), $imageName);
            $competition->feature_image = $imageName;
        }else{
            $competition->feature_image = 'no_img.jpg';
        }
        $competition->user_id = auth()->user()->id;
        $competition->category_id = $request->category;
        $competition->payment_type = $request->payment_type;
        $competition->status = $request->status;
        $competition->started_date = $request->start_date;
        $competition->end_date = $request->end_date;
        $competition->register_form = $request->register_form_data;
        $competition->marks_sections = json_encode($request->marks_sections);
        $competition->rounds_section = json_encode($request->rounds_section);

        //Game Rules
        $ruleNames= $request->rule_name;
        $ruleDescriptions = $request->description_rule;
        $outArray =[];
        if($ruleNames != null)
        {
            foreach ($ruleNames as $key=>$ruleName){
                $outputArray = [
                    'rule_name' => $ruleName,
                    'rule_description' =>$ruleDescriptions[$key]
                ];
                array_push($outArray,$outputArray);
            }
        }

        $jsonOutput = json_encode($outArray);
        $competition->game_rules = $jsonOutput;
        $competition->save();
        return back();
    }

    public function create_competition()
    {
        $getCategory = CompetitionCategory::all();
        return view('frontend.user.orgz_create_competition',[
            'get_category' => $getCategory,
        ]);
    }


    public function orz_edit_competition($id)
    {
        $getCompetionDetaills = Competition::where('id',$id)->first();
        $getGameRules = json_decode($getCompetionDetaills->game_rules);
        $getCategory = CompetitionCategory::all();
        $getCompetitionForm = json_decode($getCompetionDetaills->register_form);
        $encorededJson = json_encode($getCompetitionForm);

        return view('frontend.user.orgz_edit_competition',[
            'competition_details' => $getCompetionDetaills,
            'game_rules' => $getGameRules,
            'get_category' => $getCategory,
            'form_data' => $encorededJson,
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
