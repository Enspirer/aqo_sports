<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use DataTables;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('backend.blog.index');
    }

    public function create()
    {
        return view('backend.blog.create');
    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Blog::get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.blog.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3 mr-3"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })

                    ->addColumn('featured_blog', function($data){
                        if($data->featured_blog == 1){
                            $featured_blog = '<span class="badge badge-success">Enabled</span>';
                        }
                        else{
                            $featured_blog = '<span class="badge badge-danger">Disable</span>';
                        }   
                        return $featured_blog;
                    })

                    ->addColumn('status', function($data){
                        if($data->status == 'Enabled'){
                            $status = '<span class="badge badge-success">Enabled</span>';
                        }
                        else{
                            $status = '<span class="badge badge-danger">Disable</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','status','featured_blog'])
                    ->make(true);
        }
        return back();
    }

    public function store(Request $request)
    {        
        // dd($request);

        if($request->description == null){
            return back()->withErrors('Please Fill Description Section');
        }else{

            if($request->featured == 1)
            {            
                $featured_blog = DB::table('blogs')->where('featured_blog', '=', 1)->update(array('featured_blog' => 0));           
            } 

            if($request->file('image'))
            {            
                $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
                $fullURLsPreviewFile = $request->image->move(public_path('files/blog'), $preview_fileName);
                $image_url = $preview_fileName;
            }else{
                $image_url = null;
            }                

            $add = new Blog;

            $add->title=$request->title;
            $add->category=$request->category; 
            $add->description=$request->description;        
            $add->feature_image=$image_url;
            $add->order=$request->order;
            $add->external_link=$request->external_link;
            $add->featured_blog=$request->featured;
            $add->status=$request->status;
            $add->save();

            return redirect()->route('admin.blog.index')->withFlashSuccess('Added Successfully');  
            
        }
    }

    public function edit($id)
    {
        $blog = Blog::where('id',$id)->first();         

        return view('backend.blog.edit',[
            'blog' => $blog
        ]);  
    }


    public function update(Request $request)
    {    
        // dd($request);

        if($request->description == null){
            return back()->withErrors('Please Fill Description Section');
        }else{

            if($request->featured == 1)
            {            
                $featured_blog = DB::table('blogs')->where('featured_blog', '=', 1)->update(array('featured_blog' => 0));           
            }  

            if($request->file('image'))
            {
                $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
                $fullURLsPreviewFile = $request->image->move(public_path('files/blog'), $preview_fileName);
                $image_url = $preview_fileName;
            }else{            
                $detail = Blog::where('id',$request->hidden_id)->first();
                $image_url = $detail->feature_image;            
            }  

            $update = new Blog;

            $update->title=$request->title; 
            $update->category=$request->category; 
            $update->description=$request->description;        
            $update->feature_image=$image_url;
            $update->external_link=$request->external_link;
            $update->order=$request->order;
            $update->featured_blog=$request->featured;
            $update->status=$request->status;
                
            Blog::whereId($request->hidden_id)->update($update->toArray());

            return redirect()->route('admin.blog.index')->withFlashSuccess('Updated Successfully');  
                  
        }                            

    }

    public function destroy($id)
    {        
        $data = Blog::findOrFail($id);
        $data->delete();   
    }
}
