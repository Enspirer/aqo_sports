@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')


    <style>
        .stage-wrap.empty{
            height: 520px;
        }
    </style>
    <div class="dashboard-body">
        @include('frontend.user.includes.dashboad_nav')
        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="container">
                @include('includes.partials.messages')
                    <div class="exploreBody">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="card p-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <img src="{{url('/files/').'/'.$competitionDetails->feature_image}}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                </div>

                                                <div class="col-6">
                                                    <h4>{{ $competitionDetails-> competition_name}}</h4>
                                                    <p class="mb-0" style="color: #919191; font-size: 0.9rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical;">{{ $competitionDetails-> description }}</p>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="div col-6">
                                            <div class="row justify-content-end">
                                                <div class="col-10">
                                                    <div class="row align-items-center">
                                                        <div class="col-6 text-center">
                                                            <div class="border p-2">
                                                                <h6>Total Judges</h6>
                                                                <p class="mb-0 font-weight-bold" style="font-size: 1.1rem; color: #002a89">{{ $approved_judges }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="col-6 text-center">
                                                            <div class="border p-2">
                                                                <h6>Total Judge Requests</h6>
                                                                <p class="mb-0 font-weight-bold" style="font-size: 1.1rem; color: #002a89">{{ $request_judges }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                       </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Judges List</strong>
                                    </div><!--card-header-->

                                    <div class="card-body">
                                        <table class="table table-striped table-bordered" id="data_table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Judge Name</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Created at</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div><!--card-->
                            </div><!--col-->
                        </div><!--row-->


                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Modal delete -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form name="importform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h3 class="modal-title" id="ModalDeleteLabel">Delete</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Are you sure you want to remove this?</h5>
                        </div>                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">Delete</button>
                       
                    </div>
                </form>

            </div>
        </div>
    </div>

    
    <script type="text/javascript">
        $(function () {

            var table = $('#data_table').DataTable({
                processing: false,
                ajax: "{{route('frontend.user.judgeRequetDetails',$competitionDetails->id)}}",
                serverSide: true,
                order: [[0, "desc"]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'judge_name', name: 'judge_name'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            var user_id;

            $(document).on('click', '.delete', function(){
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function(){
            $.ajax({
            url:"delete/"+user_id,
            
            success:function(data)
            {
                setTimeout(function(){
                $('#confirmModal').modal('hide');
                $('#data_table').DataTable().ajax.reload();
                });
            }
            })
            });
        });
    </script>

@endsection
