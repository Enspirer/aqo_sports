@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Votes Count</strong>
                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="data_table" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Competitor Name</th>
                            <th scope="col">Votes Count</th>
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
                ajax: "{{route('admin.votes.get_details',$competition->id)}}",
                serverSide: true,
                order: [[0, "desc"]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'competitor_name', name: 'competitor_name'},
                    {data: 'votes', name: 'votes'},
                ]
            });

            
        });
    </script>

@endsection
