<?php

namespace Modules\Competition\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Module;
use DataTables;
use Modules\Competition\Entities\Competition;
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
        return view('competition::backend.competition.competion_creator');
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
        //Game Rules
        $ruleNames= $request->rule_name;
        $ruleDescriptions = $request->rule_name;
        $outArray =[];
        if($ruleNames != null)
        {
            foreach ($ruleNames as $ruleName){
                foreach ($ruleDescriptions as $ruleDescription)
                {
                    $out2 = [
                        'rule_description' => $ruleDescription,
                        'rule_name' => $ruleName
                    ];
                }
                array_push( $outArray, $out2);
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

        $getRegiterFormData = json_decode($getCompetionDetaills->register_form);

        return view('competition::edit',[
            'competition_details' => $getCompetionDetaills,
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


    public function getTableDetails()
    {
        $compeition = Competition::all();
        return Datatables::of($compeition)
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('admin.competition.edit',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit </a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make();
    }
}
