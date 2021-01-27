<?php

namespace Modules\Competition\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;
use Modules\Competition\Entities\CompetitionCategory;

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
                $btn = '<a href="'.route('admin.competition.edit',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit </a>';
                return $btn;
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
        //
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
        //
    }
}
