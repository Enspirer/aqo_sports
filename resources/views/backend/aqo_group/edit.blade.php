@extends('backend.layouts.app')

@section('title', __('Edit Aqo Groups'))

@section('content')
    <form action="{{route('admin.aqo_group.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">  
                        
                        <div class="form-group">
                            <label>Image (jpg,jpeg,png)</label>
                            <input type="file" class="form-control-file" name="image">
                            <br>                           
                            <img src="{{url('files/aqo_group',$aqo_group->image)}}" style="width: 20%;" alt="" >                          
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ $aqo_group->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control" value="{{ $aqo_group->link }}" name="link">
                        </div> 

                        <div class="form-group">
                            <label>Order</label>
                            <input type="number" class="form-control" name="order" value="{{ $aqo_group->order }}" required>
                        </div>

                        <div class="mt-5 text-right">
                            <input type="hidden" name="hidden_id" value="{{ $aqo_group->id }}"/>
                            <a href="{{route('admin.aqo_group.index')}}" class="btn rounded-pill px-4 py-2 me-2 btn-warning">Cancel</a>&nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success">Update</button><br>
                        </div>

                    </div>                    
                </div>
                
            </div><br>
            
            

        </div>

    </form>


<br><br>
@endsection
