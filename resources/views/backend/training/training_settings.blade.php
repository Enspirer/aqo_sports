@extends('backend.layouts.app')

@section('title', __('Training Settings'))

@section('content')
    
                <div class="row">
                    <div class="col-12">
                        @if($main_image == null)
                        <div class="card">
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                    <h5>Main Image/Video</h5>
                                    <form action="{{route('admin.training_banner.store')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image/Video (Maximum size should be 1MB)</label>
                                                <input type="file" class="form-control" name="image" required>
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" name="link" />
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="main_image" value="main_image"/>
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Submit">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="card">
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                <h5>Main Image/Video</h5>
                                    <form action="{{route('admin.training_banner.update')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image/Video (Maximum size should be 1MB)</label>
                                                <input type="file" class="form-control" name="image">
                                                <br>
                                                @if($main_image->extension == "mp4")

                                                    <video controls muted style="width: 40%">
                                                        <source src="{{ url('files/training_main',$main_image->image) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>

                                                @else

                                                    <img src="{{ url('files/training_main',$main_image->image) }}" style="width: 40%">

                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" value="{{ $main_image->link }}" name="link" />
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="main_image" value="main_image"/>
                                                <input type="hidden" class="form-control" value="{{ $main_image->id }}" name="hidden_id" />
                                                <button type="button" class="btn rounded-pill px-4 py-2 me-2 btn-danger" data-toggle="modal" data-target="#main_imagedelete">Delete</button>
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Update">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>



@if($main_image != null)
    <div class="modal fade" id="main_imagedelete">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to remove this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('admin.training_banner.delete',$main_image->id)}}" type="button" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
 @endif


 <div class="modal fade" id="overlay">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title pull-left">Instructions for Validations</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        
      </div>
      <div class="modal-body">

        <h5 class="mb-3">Main Image/Video in Training Page</h5>
        <p>Image ( dimensions = width: 730px * height: 464px )</p>
        <p>Image ( Size = Maximum size should be 1MB )</p>
        <p>Image/Video ( Type = jpeg,png,jpg,gif,mp4 )</p>
                              
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
    $(window).on('load', function() {
            $('#overlay').modal('show');
        });
    $("#close-btn").click(function () {
        $('#overlay').modal('hide');
    });
</script> 

<br><br>
@endsection
