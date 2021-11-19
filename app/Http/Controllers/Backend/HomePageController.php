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
        // dd($request);
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/homepage'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 
        // dd($image_url);

        $add = new HomePage;
        
        $add->order=$request->order;
        $add->link=$request->link;
        $add->image=$image_url;
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
                        $img = '<img src="'.url('files/homepage',$data->image).'" style="width: 50%">';
                     
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
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/homepage'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = HomePage::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;            
        }    
        
        $update = new HomePage;

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
