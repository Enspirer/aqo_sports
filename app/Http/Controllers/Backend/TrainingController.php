<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use App\Models\Training;

class TrainingController extends Controller
{    
    public function index()
    {
        return view('backend.training.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Training::get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){                       
                        $button = '<a href="'.route('admin.training.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-info-circle"></i> View </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })                    
                    ->editColumn('status', function($data){
                        if($data->status == 'Pending'){
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }
                        elseif($data->status == 'Approved'){
                            $status = '<span class="badge badge-success">Approved</span>';
                        }   
                        else{
                            $status = '<span class="badge badge-danger">Disapproved</span>';
                        }   
                        return $status;
                    })                    
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {
        $training = Training::where('id',$id)->first();        
        // dd($training);              
        
        return view('backend.training.edit',[
            'training' => $training         
        ]);  
    }

    public function update(Request $request)
    {    
        // dd($request);     
   
        $update = new Training;

        $update->status=$request->status;        
        
        Training::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.training.index')->withFlashSuccess('Updated Successfully');                             

    }

    public function destroy($id)
    {        
        $data = Training::findOrFail($id);
        $data->delete();   
    }

}
