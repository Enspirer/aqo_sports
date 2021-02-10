@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="dashboard-body">
        @include('frontend.user.includes.dashboad_nav')

        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="container">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="" style="background-image: url('{{url('/files/'.$competitionDetails->feature_image)}}');height: 570px; background-position: center;background-size: cover">

                                </div>
                            </div>
                            <div class="col-md-6"><br><br>
                                <div class="container">
                                    <h3>{{$competitionDetails->competition_name}}</h3>
                                    <p style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;height: 140px;">{{$competitionDetails->description}}</p>
                                    <div class="">
                                        @if($competitorDetails->performance_link)
                                            <div class="card" style="padding: 10px;">
                                                <div class="card">
                                                    <div class="container"><br>
                                                        <b>Video Link:</b>
                                                        <br> <a href="{{$competitorDetails->performance_link}}">{{$competitorDetails->performance_link}}</a>
                                                        <br><br>
                                                        <b>Description:</b>
                                                        <p>{{$competitorDetails->performance_description}}</p>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-arrow-up"></i> Score {{$competitorDetails->score}}
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a class=""  data-toggle="modal" data-target=".bd-example-modal-lg">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a class="">
                                                            <i class="fa fa-voicemail"></i>
                                                            Report
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a class=""  data-toggle="modal" data-target="#view_performance">
                                                            View
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <button class="btn btn-primary" href="" data-toggle="modal" data-target=".bd-example-modal-lg">Add My Performance</button>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                            <div class="container"> <br><br>
                                <h3>Game Rules</h3><br>

                                @if($competitionDetails->game_rules)
                                    @foreach(json_decode($competitionDetails->game_rules) as $gameRules)
                                        <h4>{{$gameRules->rule_name}}</h4><br>
                                        <p>{{$gameRules->rule_description}}</p>
                                    @endforeach
                                @endif
                            </div>
                    </div>
                </div>



            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    @if($competitorDetails->performance_link)
                        <iframe  id="myframe" id="ytplayer" type="text/html" width="760" height="360"
                                src="https://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&origin=http://example.com"
                                frameborder="0"></iframe>




                    @else
                        <div class="" style="border-style: dashed;border-width: 1px;border-color: gray;height: 200px;text-align: center;padding-top: 80px;color: #999999;">
                            <h3>No Video Found</h3>
                        </div>

                    @endif

                    <form action="{{route('frontend.user.postPerformance')}}" method="post"><br>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Performance Link</label>
                            <input type="text" class="form-control" name="performance_link" value="{{$competitorDetails->performance_link}}" required>
                            <input type="hidden" name="competitor_id" value="{{$competitorDetails->id}}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea rows="5" class="form-control" name="performance_description" required>{{$competitorDetails->performance_description}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>

            </div>
        </div>
    </div>




    <div id="view_performance" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </div>
    </div>

    <script>


         getDetails = getId('{{$competitorDetails->performance_link}}');

        document.getElementById("myframe").src = 'https://www.youtube.com/embed/' + getDetails;


        function getId(url) {
            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
            const match = url.match(regExp);

            return (match && match[2].length === 11)
                ? match[2]
                : null;
        }


    </script>

@endsection
