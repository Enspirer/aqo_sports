<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TrainingPageAd;

class TrainingPageAdController extends Controller
{
    public function store_training(Request $request)
    {        
        // dd($request);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $add = new TrainingPageAd;
        
        $add->link=$request->link;
        $add->description=$request->description;
        $add->image=$image_url;
        $add->save();

        return back()->withFlashSuccess('Added Successfully');                      

    }

    public function update_training(Request $request)
    {        
        // dd($request);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = TrainingPageAd::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;            
        }  

        $update = new TrainingPageAd;
        
        $update->link=$request->link;
        $update->description=$request->description;
        $update->image=$image_url;

        TrainingPageAd::whereId($request->hidden_id)->update($update->toArray());

        return back()->withFlashSuccess('Updated Successfully');                      

    }

    public function delete_training($id)
    {        
        $data = TrainingPageAd::findOrFail($id);
        $data->delete();   

        return back()->withFlashSuccess('Deleted Successfully');  
    }
}
