@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="dashboard-body">
        @include('frontend.user.includes.dashboad_nav')

        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="container">
                    <div class="exploreBody">
                        <div class="card">
                            <div class="card-body">
                                <h5>{{$competitionDetails->competition_name}}</h5>
                                <p>{{$competitionDetails->description}}</p>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Competitor Name</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Uploaded At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($competitorDetails as $competitorDetail)
                                <tr>
                                    <th>{{$competitorDetail['competitor_name']}}</th>
                                    <td>{{$competitorDetail['score']}}</td>
                                    <td>{{$competitorDetail['created_at']}}</td>
                                    <td>
                                        <a href="{{route('frontend.user.show_competitor',$competitorDetail['competitor_id'])}}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i> View Performance
                                        </a>
                                    </td>
                                </tr>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection
