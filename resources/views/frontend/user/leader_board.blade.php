@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="dashboard-body">
        @include('frontend.user.includes.dashboad_nav')
        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="container">

                    <div class="row">
                        <div class="col">
                            <div class="card">
                            
                                <div class="card-body">
                                    <table class="table table-striped table-bordered" id="competitions-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">Competition Name</th>
                                                <th scope="col">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@push('after-scripts')
<script type="text/javascript">
    $(function () {
        var table = $('#competitions-table').DataTable({
            processing: true,
            ajax: "{{route('frontend.user.my_leader_board.get_competitions')}}",
            serverSide: true,
            order: [[0, "desc"]],
            columns: [
                {data: 'competition_name', name: 'competition_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

</script>

@endpush
