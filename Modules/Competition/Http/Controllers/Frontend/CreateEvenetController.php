<?php

namespace Modules\Competition\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\Competitor;
use Modules\Competition\Entities\Organizer;
use Modules\Competition\Entities\CompetitionCategory;
use Modules\Competition\Entities\JudgeDetails;
use App\Models\Auth\User;
use DataTables;
use DB;


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

    public function updateOrganizer(Request $request)
    {
        $organizer = DB::table('organizers') ->where('id', request('hidden_id'))->update(
            [
                'organization' => $request->organization,
                'contact_details' => $request->contact_details,
                'address' => $request->address,
                'country' => $request->country,
            ]
        );
        
        return redirect()->route('frontend.user.register_as_organizer')->with('success', 'success');    
    }


    public function edit_judge_form($id)
    {
        $competitionDetails = Competition::where('id',$id)->first();
        $getCompetitionForm = json_decode($competitionDetails->judge_register_form);
        // dd($getCompetitionForm);

        return view('frontend.user.edit_judge_form',[
            'competitionDetails' => $competitionDetails,
            'judge_register_form' => $getCompetitionForm
        ]);
    }
    

    public function edit_judge_form_update (Request $request)
    {
        $id = $request->id;
        $register_form_data_judge = $request->register_form_data;

        Competition::where('id',$id)->update([
           'judge_register_form' => $register_form_data_judge
        ]);

        return redirect()->route('frontend.user.register_as_organizer')->withFlashSuccess('Judge Form Created Successfully');

    }

    public function edit_competition_update(Request $request)
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
        return redirect()->route('frontend.user.register_as_organizer')->withFlashSuccess('Updated Successfully');
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

        return redirect()->route('frontend.user.register_as_organizer')->withFlashSuccess('Created Successfully');

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
        
        return redirect()->route('frontend.user.register_as_organizer')->withFlashSuccess('Created Successfully');
        
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
        $data = Competition::findOrFail($id);
        $data->delete(); 
        
        return redirect()->route('frontend.user.register_as_organizer')->withErrors('Deleted Successfully');
        
    }

    public function score_board($competitionID)
    {
        $competitionDetails = Competition::where('id',$competitionID)->first();
        $markSection = json_decode($competitionDetails->marks_sections);
        $roundSection = json_decode($competitionDetails->rounds_section);
        $competitorDetails = Competitor::where('competition_id',$competitionID)->where('competitor_status', 1)->get();        
        $competitorCount = Competitor::where('competition_id',$competitionID)->where('competitor_status', 1)->count();        

        return view('frontend.user.score_board',[
            'markSection' => $markSection,
            'roundSection' => $roundSection,
            'competitor_details' => $competitorDetails,
            'competition_details' => $competitionDetails,
            'competitorCount' => $competitorCount,
        ]);
    }

    public function judges_list($competition_id)
    {
        $competitionDetails = Competition::where('id',$competition_id)->first();
        $competition = Competition::where('id',$competition_id)->first();
        
        $approved_judges = JudgeDetails::where('competition_id', $competition_id)->where('status', 1)->count();

        $request_judges = JudgeDetails::where('competition_id', $competition_id)->count();

        return view('frontend.user.judges_list',[
            'competitionDetails' => $competitionDetails,
            'approved_judges' => $approved_judges,
            'request_judges' => $request_judges
        ]);
    }
    public function judgeRequetDetails($competition_id)
    {

        $compeition =JudgeDetails::where('competition_id',$competition_id)->get();
        return Datatables::of($compeition)
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('frontend.user.judge_show',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fas fa-info-circle"></i> View </a>';
                $btn .= ' <button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                return $btn;
            })
            ->addColumn('judge_name', function($row){
                $userDetails = User::where('id',$row->user_id)->first();
                return $userDetails->first_name.' '.$userDetails->last_name;
            })
            ->rawColumns(['action'])
            ->make();

    }
    public function judge_show($id)
    {
        $judgeDetails = JudgeDetails::where('id',$id)->first();
        $userDetails = User::where('id',$judgeDetails->user_id)->first();
        $competionDetails = Competition::where('id',$judgeDetails->competition_id)->first();

        $requestFormDetails = json_decode($judgeDetails->submit_details);

        // dd($requestFormDetails);


        return view('frontend.user.judges_show',[
            'competitionDetails' => $competionDetails,
            'userDetais' => $userDetails,
            'JudgeformDetails' =>$requestFormDetails,
            'judgeDetails' => $judgeDetails
        ]);

    }
    public function judge_status(Request $request)
    {
        if($request->status == 0)
        {
            $userDetails = User::find(1);
            $userDetails->revokePermissionTo('view judge function');


        }else if($request->status == 1)
        {
            $userDetails = User::find(1);
            $userDetails->givePermissionTo('view judge function');

        }else if($request->status == 2)
        {
            $userDetails = User::find(1);
            $userDetails->revokePermissionTo('view judge function');
        }
        JudgeDetails::where('id',$request->judge_id)->update([
           'status' => $request->status
        ]);

        return redirect()->route('frontend.user.judges_list',$request->competition_id)->withFlashSuccess('Updated Successfully');
    }
    public function judge_delete($id)
    {
        $data = JudgeDetails::findOrFail($id);
        $data->delete(); 
    }

    public function competitors_list($competition_id)
    {
        $CompetitionDetails = Competition::where('id',$competition_id)->first();

        return view('frontend.user.competitors_list',[
            'competitionDetails' => $CompetitionDetails

        ]);
    }

    public function competitorsRequetDetails($competition_id)
    {
        $competitors = Competitor::where('competition_id',$competition_id)->get();

        return Datatables::of($competitors)
            ->addColumn('competitor_name', function($row){
                $userDetails = User::where('id',$row->user_id)->first();
                return $userDetails->first_name.' '.$userDetails->last_name;
            })
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('frontend.user.competitor_show',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fas fa-info-circle"></i> View </a>';
                $btn .= ' <button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make();
    }
    public function competitor_show($id)
    {

        $competitor = Competitor::where('id',$id)->first();

        $competionDetails = Competition::where('id',$competitor->competition_id)->first();
        $userDetails = User::where('id',$competitor->user_id)->first();
        $categoryDetails = CompetitionCategory::where('id',$competionDetails->category_id)->first();
        $requestFormDetails = json_decode($competitor->competition_details);

        return view('frontend.user.competitors_show',[
                'competitorDetails' => $competitor,
                'competitionDetails' => $competionDetails,
                'userDetais' => $userDetails,
                'categoryDetails' => $categoryDetails,
                'competitionformDetails' =>$requestFormDetails
            ]);
    }
    public function competitor_status(Request $request)
    {
        $competitions = Competitor::where('id',$request->competitor_id)->update(
            [
                'competitor_status' => $request->accept_status
            ]
        );

        return redirect()->route('frontend.user.competitors_list',$request->competition_id)->withFlashSuccess('Updated Successfully');

    }
    public function competitor_delete($id)
    {
        $data = Competitor::findOrFail($id);
        $data->delete(); 
    }
    



}
