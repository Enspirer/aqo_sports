@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Organizer Request</strong>
                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="data_table" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Organization</th>
                            <th scope="col">Contact Number</th>
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


    <script type="text/javascript">
        $(function () {

            var table = $('#data_table').DataTable({
                processing: false,
                ajax: "{{route('admin.competition.organizer_request.get_table_details')}}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'organization', name: 'organization'},
                    {data: 'contact_details', name: 'contact_details'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>

@endsection
