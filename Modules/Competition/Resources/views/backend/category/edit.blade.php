@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <style>
        .stage-wrap.empty{
            height: 520px;
        }
    </style>
    <div class="light-style flex-grow-1 container-p-y">
        <form action="{{route('admin.category.update')}}" method="post" id="create_formInit" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" id="generalTabs" data-toggle="list" href="#general">General</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="general">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}" required>
                                        <input type="hidden" class="form-control" name="id" value="{{$category->id}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea type="text" name="description" rows="10" class="form-control">{{$category->description}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Category Image</label>
                                        <div class="" style="background-image: url('{{url('files').'/'.$category->feature_image}}');height: 100px;background-size: contain;background-repeat: no-repeat;"></div>
                                        <input type="file" name="category_image" class="form-control" value="{{$category->feature_image}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Vote Function</label>
                                        <select class="form-control" name="vote_function">
                                            <option value="1" {{$category->vote_function == 1 ? 'selected':''}}>Enabled</option>
                                            <option value="0" {{$category->vote_function == 0 ? 'selected':''}}>Disabled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary">Update Category</button>&nbsp;
                    <a href="{{ route('admin.category.index') }}" class="btn btn-warning mr-3">Cancel</a>
                    <br><br>
                </div>
            </div>

        </form>

    </div>

    <script>
        function tabInvalied(id) {
            $('#'+id).css("color", "red");
        }
    </script>
@endsection
