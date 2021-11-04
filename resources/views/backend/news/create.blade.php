@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')


<link rel="stylesheet" href="{{url('css/vendors.css')}}">



<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>

    <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data" >
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Title <span style="color:red">*</span></label>
                            <input type="text" id="slug" class="form-control" name="title" required>
                        </div>

                        <div class="form-group">
                            <label>Description <span style="color:red">*</span></label>
                            <textarea class="form-control" id="editor" name="description" rows="4"></textarea>
                        </div>

                        <!-- <div class="form-group">
                            <label>Feature Image <span style="color:red">*<span></label>
                            <input type="file" class="form-control" name="image" required>
                        </div>  -->
                        
                        <div class="form-group">
                            <label>Feature Image
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="image" class="selected-files" >
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label>Featurered News <span style="color:red">*<span></label>
                            <select class="form-control" name="featured_news" required>
                                <option value="1">Enable</option>   
                                <option value="0">Disable</option>                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status <span style="color:red">*<span></label>
                            <select class="form-control" name="status" required>
                                <option value="Enabled">Enable</option>   
                                <option value="Disabled">Disable</option>                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Order <span style="color:red">*<span></label>
                            <input type="number" class="form-control" name="order" required>
                        </div>
                        
                    </div>
                </div>
                <input type="submit" class="btn btn-success pull-right" value="Create New" /><br>
            </div><br>       
            
        </div>

    </form>


<br><br>

<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

    
</script>



@endsection
