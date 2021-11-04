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

    public function getDetails(Request $request)
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

                    ->addColumn('featured_news', function($data){
                        if($data->featured_news == '1'){
                            $featured_news = '<span class="badge badge-success">Enabled</span>';
                        }
                        else{
                            $featured_news = '<span class="badge badge-danger">Disable</span>';
                        }   
                        return $featured_news;
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
                    
                    ->rawColumns(['action','status','featured_news'])
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

            if($request->image == null){
                return back()->withErrors('Please Select Feature Image');
            }else{

                if($request->featured_news == 1)
                {            
                    $featured_news = DB::table('blogs')->where('featured_news', '=', 1)->update(array('featured_news' => 0));           
                } 
               

                $add = new Blog;

                $add->title=$request->title; 
                $add->description=$request->description;        
                $add->feature_image=$request->image;
                $add->user_id = auth()->user()->id;
                $add->order=$request->order;
                $add->featured_news=$request->featured_news;
                $add->status=$request->status;
                $add->save();

                return redirect()->route('admin.blog.index')->withFlashSuccess('Added Successfully');  

            }

            
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

        if($request->description == null){
            return back()->withErrors('Please Fill Description Section');
        }else{
            if($request->image == null){
                return back()->withErrors('Please Select Feature Image');
            }else{

                if($request->featured_news == 1)
                {            
                    $featured_news = DB::table('news')->where('featured_news', '=', 1)->update(array('featured_news' => 0));           
                } 

                $update = new Blog;

                $update->title=$request->title; 
                $update->description=$request->description;        
                $update->feature_image=$request->image;
                $update->user_id = auth()->user()->id;
                $update->order=$request->order;
                $update->featured_news=$request->featured_news;
                $update->status=$request->status;
                
                Blog::whereId($request->hidden_id)->update($update->toArray());

                return redirect()->route('admin.blog.index')->withFlashSuccess('Updated Successfully');  
            }      
        }                            

    }

    public function destroy($id)
    {        
        $data = Blog::findOrFail($id);
        $data->delete();   
    }
}
