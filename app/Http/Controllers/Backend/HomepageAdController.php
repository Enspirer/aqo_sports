<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HomepageAd;
use App\Models\TrainingPageAd;
use App\Models\CompetitionPageAd;
use App\Models\HomepageMultipleAd;
use App\Models\NewspageMultipleAd;
use App\Models\CompetitionpageMultipleAd;

class HomepageAdController extends Controller
{
    public function index()
    {
        $homepagead = HomepageAd::first();
        $competitionpagead = CompetitionPageAd::first();
        $trainingpagead = TrainingPageAd::first();

        $left = HomepageMultipleAd::where('position','left')->first();
        $right = HomepageMultipleAd::where('position','right')->first();
        $middle_top = HomepageMultipleAd::where('position','middle_top')->first();
        $middle_bottom = HomepageMultipleAd::where('position','middle_bottom')->first();

        $nleft = NewspageMultipleAd::where('position','nleft')->first();
        $nright = NewspageMultipleAd::where('position','nright')->first();
        $nmiddle_top = NewspageMultipleAd::where('position','nmiddle_top')->first();
        $nmiddle_bottom = NewspageMultipleAd::where('position','nmiddle_bottom')->first();

        return view('backend.advertisement.index',[
            'homepagead' => $homepagead,
            'competitionpagead' => $competitionpagead,
            'trainingpagead' => $trainingpagead,
            'left' => $left,
            'right' => $right,
            'middle_top' => $middle_top,
            'middle_bottom' => $middle_bottom,
            'nleft' => $nleft,
            'nright' => $nright,
            'nmiddle_top' => $nmiddle_top,
            'nmiddle_bottom' => $nmiddle_bottom             
        ]);
    }

    public function store_home(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=350,height=464'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $add = new HomepageAd;
        
        $add->link=$request->link;
        $add->description=$request->description;
        $add->image=$image_url;
        $add->save();

        return back()->withFlashSuccess('Added Successfully');                      

    }

    public function update_home(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=350,height=464'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = HomepageAd::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;            
        }  

        $update = new HomepageAd;
        
        $update->link=$request->link;
        $update->description=$request->description;
        $update->image=$image_url;

        HomepageAd::whereId($request->hidden_id)->update($update->toArray());


        return back()->withFlashSuccess('Updated Successfully');                      

    }

    public function delete_home($id)
    {        
        $data = HomepageAd::findOrFail($id);
        $data->delete();   

        return back()->withFlashSuccess('Deleted Successfully');  
    }


}
