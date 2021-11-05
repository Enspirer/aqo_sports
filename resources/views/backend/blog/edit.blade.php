@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')

<link rel="stylesheet" href="{{url('css/vendors.css')}}">

<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>


    <form action="{{route('admin.blog.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title <span style="color:red">*</span></label>
                            <input type="text" id="slug" value="{{ $blog->title }}" class="form-control" name="title" required>
                        </div>

                        <div class="form-group">
                            <label>Category<span style="color:red">*<span></label>
                            <select class="form-control" name="category" required>
                                <option value="News" {{ $blog->category == 'News' ? "selected" : "" }}>News</option>   
                                <option value="Blog" {{ $blog->category == 'Blog' ? "selected" : "" }}>Blog</option>                                
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Description <span style="color:red">*</span></label>
                            <textarea class="form-control" id="editor" name="description" rows="4">{!! $blog->description !!}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Feature Image <span style="color:red">*<span></label>
                            <input type="file" class="form-control" name="image">
                            <br>
                            <img src="{{url('files/blog',$blog->feature_image) }}" width="30%" />
                        </div> 

                        <div class="form-group">
                            <label>Featured<span style="color:red">*<span></label>
                            <select class="form-control" name="featured" required>
                                <option value="1" {{ $blog->featured_blog == '1' ? "selected" : "" }}>Enable</option>   
                                <option value="0" {{ $blog->featured_blog == '0' ? "selected" : "" }}>Disable</option>                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status <span style="color:red">*<span></label>
                            <select class="form-control" name="status" required>
                                <option value="Enabled" {{ $blog->status == 'Enabled' ? "selected" : "" }}>Enable</option>   
                                <option value="Disabled" {{ $blog->status == 'Disabled' ? "selected" : "" }}>Disable</option>                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Order <span style="color:red">*<span></label>
                            <input type="number" class="form-control" value="{{ $blog->order }}" name="order" required>
                        </div>                       
                        
                    </div>
                </div>
                <div class="text-right">
                    <input type="hidden" name="hidden_id" value="{{ $blog->id }}"/>
                    <a href="{{route('admin.blog.index')}}" class="btn rounded-pill px-4 py-2 me-2 btn-info">Back</a>&nbsp;&nbsp;
                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success">Update</button><br>
                </div>
            </div><br>
            
            

        </div>

    </form>



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


<br><br>
@endsection
