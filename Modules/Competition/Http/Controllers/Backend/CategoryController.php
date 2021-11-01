<?php

namespace Modules\Competition\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;
use Modules\Competition\Entities\CompetitionCategory;
use File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('competition::backend.category.index');
    }

    public function getTableDetails()
    {
        $category = CompetitionCategory::all();
        return Datatables::of($category)
            ->addColumn('action', function($row){
                $btn1 = '<a href="'.route('admin.category.edit',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit </a>';
                $btn2 = ' <button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                return $btn1.$btn2;
            })
            ->rawColumns(['action'])
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('competition::backend.category.creator');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $category = new CompetitionCategory;
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->vote_function = $request->vote_function;
        if($request->file('category_image'))
        {
            //Feature Images
            $imageName = time().'.'.$request->category_image->getClientOriginalExtension();
            $fullURLs = $request->category_image->move(public_path('files'), $imageName);
            $category->feature_image = $imageName;
        }else{
            $category->feature_image = 'no_img.jpg';
        }

        $category->save();

        return redirect()->route('admin.category.index')->withFlashSuccess('Created Successfully');


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
        $category = CompetitionCategory::where('id',$id)->first();

        return view('competition::backend.category.edit',[
            'category' => $category
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

        if($request->file('category_image'))
        {
            //Feature Images
            $imageName = time().'.'.$request->category_image->getClientOriginalExtension();
            $fullURLs = $request->category_image->move(public_path('files'), $imageName);
            $category_image = $imageName;
        }else{
            $category = CompetitionCategory::where('id',$request->id)->first();
            $category_image = $category->feature_image;
        }

        $category = CompetitionCategory::where('id',$request->id)->update([
            'category_name' => $request->category_name,
            'description' => $request->description,
            'feature_image' => $category_image,
            'vote_function' => $request->vote_function
        ]);

        return redirect()->route('admin.category.index')->withFlashSuccess('Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data = CompetitionCategory::findOrFail($id);
        $data->delete();  
    }
}
