@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <style>
        .stage-wrap.empty{
            height: 520px;
        }
    </style>
    <div class="light-style flex-grow-1 container-p-y">
        <form action="{{route('admin.competition.store')}}" method="post" id="create_formInit" enctype="multipart/form-data">
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
                                    <div

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary">Create Category</button>&nbsp;
                    <a href="" class="btn btn-default">Cancel</a>
                    <br>  <br>
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
