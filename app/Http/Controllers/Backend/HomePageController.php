<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use App\Models\HomePage;

class HomePageController extends Controller
{
    public function index()
    {
        return view('backend.homepage.index');
    }

    public function store(Request $request)
    {
        if($request->file('image'))
        {
            if($request->image->getClientOriginalExtension() == 'jpg')
            {
                $this->validate($request, [
                    'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=730,height=464'
                ]);
            }elseif ($request->image->getClientOriginalExtension() == 'jpeg'){
                $this->validate($request, [
                    'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=730,height=464'
                ]);
            }elseif ($request->image->getClientOriginalExtension() == 'png')
            {
                $this->validate($request, [
                    'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=730,height=464'
                ]);
            }elseif ($request->image->getClientOriginalExtension() == 'mp4'){
                $this->validate($request, [
                    'image'  => 'mimes:mp4|max:25000'
                ]);
            }else{
                $this->validate($request, [
                    'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=730,height=464'
                ]);
            }


        }
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/homepage'), $preview_fileName);
            $image_url = $preview_fileName;
            $exentionR = $request->image->getClientOriginalExtension();
        }else{
            $image_url = null;
            $exentionR = null;
        } 

        $add = new HomePage;
        
        $add->order=$request->order;
        $add->link=$request->link;
        $add->image=$image_url;
        $add->extension = $exentionR;
        $add->save();

        return back()->withFlashSuccess('Added Successfully');                      

    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = HomePage::all();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.homepage.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    ->addColumn('image', function($data){
                        if($data->extension == 'mp4'){
                            $img = '<i class="fa fa-video"></i> Video Content';
                        }else{
                            $img = '<img src="'.url('files/homepage',$data->image).'" style="width: 50%">';
                        }
                        return $img;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {
        $home = HomePage::where('id',$id)->first();
        
        // dd($home);              

        return view('backend.homepage.edit',[
            'home' => $home         
        ]);  
    }

    public function update(Request $request)
    {        
        // dd($request);


        if($request->file('image'))
        {
            if($request->image->getClientOriginalExtension() == 'jpg')
            {
                $this->validate($request, [
                    'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=730,height=464'
                ]);
            }elseif ($request->image->getClientOriginalExtension() == 'jpeg'){
                $this->validate($request, [
                    'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=730,height=464'
                ]);
            }elseif ($request->image->getClientOriginalExtension() == 'png')
            {
                $this->validate($request, [
                    'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=730,height=464'
                ]);
            }elseif ($request->image->getClientOriginalExtension() == 'mp4'){
                $this->validate($request, [
                    'image'  => 'mimes:mp4|max:25000'
                ]);
            }else{
                $this->validate($request, [
                    'image'  => 'mimes:jpeg,png,jpg|max:25000|dimensions:width=730,height=464'
                ]);
            }


        }

        
        if($request->file('image'))
        {
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/homepage'), $preview_fileName);
            $image_url = $preview_fileName;
            $exentionR = $request->image->getClientOriginalExtension();

        }else{            
            $detail = HomePage::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;
            $exentionR = null;

        }
        $update = new HomePage;

        if($request->file('image'))
        {
            $update->extension = $exentionR;
        }

        $update->order=$request->order;
        $update->link=$request->link;
        $update->image=$image_url;

        HomePage::whereId($request->hidden_id)->update($update->toArray());
   
        return redirect()->route('admin.homepage.index')->withFlashSuccess('Updated Successfully');                   

    }

    public function destroy($id)
    {        
        $data = HomePage::findOrFail($id);
        $data->delete();   
    }
}
