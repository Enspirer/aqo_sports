<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HomepageMultipleAd;
use App\Models\NewspageMultipleAd;
use App\Models\CompetitionpageMultipleAd;

class MultipleAdController extends Controller
{
    
    public function multiple_left_store(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=540,height=320'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $add = new HomepageMultipleAd;
        
        $add->link=$request->link;
        $add->description=$request->description;
        $add->position=$request->left;
        $add->image=$image_url;
        $add->save();

        return back()->withFlashSuccess('Added Successfully');                      

    }

    public function multiple_left_update(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=540,height=320'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = HomepageMultipleAd::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;            
        }  

        $update = new HomepageMultipleAd;
        
        $update->link=$request->link;
        $update->description=$request->description;
        $update->position=$request->left;
        $update->image=$image_url;

        HomepageMultipleAd::whereId($request->hidden_id)->update($update->toArray());

        return back()->withFlashSuccess('Updated Successfully');                      

    }

    public function multiple_left_delete($id)
    {        
        $data = HomepageMultipleAd::findOrFail($id);
        $data->delete();   

        return back()->withFlashSuccess('Deleted Successfully');  
    }

    public function multiple_right_store(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=164,height=320'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $add = new HomepageMultipleAd;
        
        $add->link=$request->link;
        $add->description=$request->description;
        $add->position=$request->right;
        $add->image=$image_url;
        $add->save();

        return back()->withFlashSuccess('Added Successfully');                      

    }

    public function multiple_right_update(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=164,height=320'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = HomepageMultipleAd::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;            
        }  

        $update = new HomepageMultipleAd;
        
        $update->link=$request->link;
        $update->description=$request->description;
        $update->position=$request->right;
        $update->image=$image_url;

        HomepageMultipleAd::whereId($request->hidden_id)->update($update->toArray());

        return back()->withFlashSuccess('Updated Successfully');                      

    }

    public function multiple_right_delete($id)
    {        
        $data = HomepageMultipleAd::findOrFail($id);
        $data->delete();   

        return back()->withFlashSuccess('Deleted Successfully');  
    }

    public function multiple_middle_top_store(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=375,height=155'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $add = new HomepageMultipleAd;
        
        $add->link=$request->link;
        $add->description=$request->description;
        $add->position=$request->middle_top;
        $add->image=$image_url;
        $add->save();

        return back()->withFlashSuccess('Added Successfully');                      

    }

    public function multiple_middle_top_update(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=375,height=155'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = HomepageMultipleAd::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;            
        }  

        $update = new HomepageMultipleAd;
        
        $update->link=$request->link;
        $update->description=$request->description;
        $update->position=$request->middle_top;
        $update->image=$image_url;

        HomepageMultipleAd::whereId($request->hidden_id)->update($update->toArray());

        return back()->withFlashSuccess('Updated Successfully');                      

    }

    public function multiple_middle_top_delete($id)
    {        
        $data = HomepageMultipleAd::findOrFail($id);
        $data->delete();   

        return back()->withFlashSuccess('Deleted Successfully');  
    }

    public function multiple_middle_bottom_store(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=375,height=155'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $add = new HomepageMultipleAd;
        
        $add->link=$request->link;
        $add->description=$request->description;
        $add->position=$request->middle_bottom;
        $add->image=$image_url;
        $add->save();

        return back()->withFlashSuccess('Added Successfully');                      

    }

    public function multiple_middle_bottom_update(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=375,height=155'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = HomepageMultipleAd::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;            
        }  

        $update = new HomepageMultipleAd;
        
        $update->link=$request->link;
        $update->description=$request->description;
        $update->position=$request->middle_bottom;
        $update->image=$image_url;

        HomepageMultipleAd::whereId($request->hidden_id)->update($update->toArray());

        return back()->withFlashSuccess('Updated Successfully');                      

    }

    public function multiple_middle_bottom_delete($id)
    {        
        $data = HomepageMultipleAd::findOrFail($id);
        $data->delete();   

        return back()->withFlashSuccess('Deleted Successfully');  
    }








    // *****************************************************************************************
















    public function news_multiple_left_store(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=540,height=320'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $add = new NewspageMultipleAd;
        
        $add->link=$request->link;
        $add->description=$request->description;
        $add->position=$request->nleft;
        $add->image=$image_url;
        $add->save();

        return back()->withFlashSuccess('Added Successfully');                      

    }

    public function news_multiple_left_update(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=540,height=320'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = NewspageMultipleAd::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;            
        }  

        $update = new NewspageMultipleAd;
        
        $update->link=$request->link;
        $update->description=$request->description;
        $update->position=$request->nleft;
        $update->image=$image_url;

        NewspageMultipleAd::whereId($request->hidden_id)->update($update->toArray());

        return back()->withFlashSuccess('Updated Successfully');                      

    }

    public function news_multiple_left_delete($id)
    {        
        $data = NewspageMultipleAd::findOrFail($id);
        $data->delete();   

        return back()->withFlashSuccess('Deleted Successfully');  
    }

    public function news_multiple_right_store(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=164,height=320'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $add = new NewspageMultipleAd;
        
        $add->link=$request->link;
        $add->description=$request->description;
        $add->position=$request->nright;
        $add->image=$image_url;
        $add->save();

        return back()->withFlashSuccess('Added Successfully');                      

    }

    public function news_multiple_right_update(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=164,height=320'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = NewspageMultipleAd::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;            
        }  

        $update = new NewspageMultipleAd;
        
        $update->link=$request->link;
        $update->description=$request->description;
        $update->position=$request->nright;
        $update->image=$image_url;

        NewspageMultipleAd::whereId($request->hidden_id)->update($update->toArray());

        return back()->withFlashSuccess('Updated Successfully');                      

    }

    public function news_multiple_right_delete($id)
    {        
        $data = NewspageMultipleAd::findOrFail($id);
        $data->delete();   

        return back()->withFlashSuccess('Deleted Successfully');  
    }

    public function news_multiple_middle_top_store(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=375,height=155'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $add = new NewspageMultipleAd;
        
        $add->link=$request->link;
        $add->description=$request->description;
        $add->position=$request->nmiddle_top;
        $add->image=$image_url;
        $add->save();

        return back()->withFlashSuccess('Added Successfully');                      

    }

    public function news_multiple_middle_top_update(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=375,height=155'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = NewspageMultipleAd::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;            
        }  

        $update = new NewspageMultipleAd;
        
        $update->link=$request->link;
        $update->description=$request->description;
        $update->position=$request->nmiddle_top;
        $update->image=$image_url;

        NewspageMultipleAd::whereId($request->hidden_id)->update($update->toArray());

        return back()->withFlashSuccess('Updated Successfully');                      

    }

    public function news_multiple_middle_top_delete($id)
    {        
        $data = NewspageMultipleAd::findOrFail($id);
        $data->delete();   

        return back()->withFlashSuccess('Deleted Successfully');  
    }

    public function news_multiple_middle_bottom_store(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=375,height=155'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $add = new NewspageMultipleAd;
        
        $add->link=$request->link;
        $add->description=$request->description;
        $add->position=$request->nmiddle_bottom;
        $add->image=$image_url;
        $add->save();

        return back()->withFlashSuccess('Added Successfully');                      

    }

    public function news_multiple_middle_bottom_update(Request $request)
    {        
        // dd($request);

        $this->validate($request, [
            'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=375,height=155'
        ]);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = NewspageMultipleAd::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;            
        }  

        $update = new NewspageMultipleAd;
        
        $update->link=$request->link;
        $update->description=$request->description;
        $update->position=$request->nmiddle_bottom;
        $update->image=$image_url;

        NewspageMultipleAd::whereId($request->hidden_id)->update($update->toArray());

        return back()->withFlashSuccess('Updated Successfully');                      

    }

    public function news_multiple_middle_bottom_delete($id)
    {        
        $data = NewspageMultipleAd::findOrFail($id);
        $data->delete();   

        return back()->withFlashSuccess('Deleted Successfully');  
    }

    

}
