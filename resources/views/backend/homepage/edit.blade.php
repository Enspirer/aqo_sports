@extends('backend.layouts.app')

@section('title', __('Edit Slider'))

@section('content')
    <form action="{{route('admin.homepage.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">  
                        
                        <div class="form-group">
                            <label>Image/Videos (jpg,jpeg,png,mp4) (Maximum size should be 1MB)</label>
                            <input type="file" class="form-control-file" name="image">
                            <br>
                            @if($home->extension == "mp4")
                                <video controls muted style="width: 60%">
                                    <source src="{{url('files/homepage',$home->image)}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <img src="{{url('files/homepage',$home->image)}}" style="width: 30%;" alt="" >
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control" value="{{ $home->link }}" name="link">
                        </div> 

                        <div class="form-group">
                            <label>Order</label>
                            <input type="number" class="form-control" name="order" value="{{ $home->order }}" required>
                        </div>

                        <div class="mt-5 text-right">
                            <input type="hidden" name="hidden_id" value="{{ $home->id }}"/>
                            <a href="{{route('admin.homepage.index')}}" class="btn rounded-pill px-4 py-2 me-2 btn-warning">Cancel</a>&nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success">Update</button><br>
                        </div>

                    </div>                    
                </div>
                
            </div><br>
            
            

        </div>

    </form>


<br><br>
@endsection
