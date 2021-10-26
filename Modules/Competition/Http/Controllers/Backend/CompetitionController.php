<?php

namespace Modules\Competition\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Module;
use DataTables;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\CompetitionCategory;
use Validator;
use File;
use Storage;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('competition::backend.competition.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $getCategory = CompetitionCategory::all();
        return view('competition::backend.competition.competion_creator',[
            'get_category' => $getCategory,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
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
        $getCompetionDetaills = Competition::where('id',$id)->first();
        $getGameRules = json_decode($getCompetionDetaills->game_rules);
        $getCategory = CompetitionCategory::all();
        $getCompetitionForm = json_decode($getCompetionDetaills->register_form);
        $encorededJson = json_encode($getCompetitionForm);
        return view('competition::backend.competition.edit',[
            'competition_details' => $getCompetionDetaills,
            'game_rules' => $getGameRules,
            'get_category' => $getCategory,
            'form_data' => $encorededJson,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
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

        if($request->file('feature_image'))
        {
            //Feature Images
            $imageName = time().'.'.$request->feature_image->getClientOriginalExtension();
            $fullURLs = $request->feature_image->move(public_path('files'), $imageName);
            $competition_feature_img = $imageName;
        }else{
            $competition_feature_img = $request->feature_image_name;
        }

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
        $competition = Competition::where('id',$request->id)->update(
            [
                'competition_name' => $request->competition_name,
                'description' => $request->competition_description,
                'is_feature' => $request->is_feature,
                'feature_image' => $competition_feature_img,
                'category_id' => $request->category,
                'payment_type' => $request->payment_type,
                'status' => $request->status,
                'started_date' => $request->start_date,
                'end_date' => $request->end_date,
                'register_form' => $request->register_form_data,
                'game_rules' => $jsonOutput,
                'marks_sections' => json_encode($request->marks_sections),
                'rounds_section' => json_encode($request->rounds_section)
            ]
        );
        return redirect()->route('admin.competition');
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


    public function getTableDetails()
    {
        $compeition = Competition::all();
        return Datatables::of($compeition)
            ->addColumn('action', function($row){
                $btn1 = '<a href="'.route('admin.competition.edit',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit </a>';
                $btn2 = ' <a href="'.route('admin.competitior.index',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-users"></i> View Competitors </a>';
                $btn3 = ' <a href="'.route('admin.competition.register_judge.edit',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit judges Form</a>';
                $btn4 = ' <a href="'.route('admin.competition.judge_request.index',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-user"></i> Judges</a>';
                $btn5 = ' <a href="'.route('admin.competition.score_board',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-list"></i> Score</a>';
                return $btn1.$btn2.$btn3.$btn4.$btn5;
            })
            ->rawColumns(['action'])
            ->make();
    }
}
