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

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                            <div class="container"> <br><br>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Game Rules</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Performance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Scoreboard</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="container"><br>
                                            <h3>Game Rules</h3><br>
                                            @if($competitionDetails->game_rules)
                                                @foreach(json_decode($competitionDetails->game_rules) as $gameRules)
                                                    <h4>{{$gameRules->rule_name}}</h4><br>
                                                    <p>{{$gameRules->rule_description}}</p>
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                    <br><br>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="container">
                                            <div id="accordion">
                                                @foreach($roundDetails as $key=>$roundData)
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                                                  {{$roundData}}
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="collapseOne{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                            <div class="card-body" style="">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        @if(getScoreMarkSection($competitionDetails->id,$competitorDetails->id,$roundData)['performance_link'])
                                                                            <iframe id="myframe{{$key}}" type="text/html" width="100%" height="100%" src="" frameborder="0"></iframe>
                                                                        @else
                                                                            <div class=""  data-toggle="modal" data-target="#upload_performance{{$key}}" style="border-width: 1px;color:gray;border-style: dashed;border-color: grey;padding: 10px;text-align: center">
                                                                                <h4>Add Performance</h4>
                                                                            </div>

                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h3>Description</h3> <br>
                                                                        @if(getScoreMarkSection($competitionDetails->id,$competitorDetails->id,$roundData)['performance_description'])
                                                                            <p> {{getScoreMarkSection($competitionDetails->id,$competitorDetails->id,$roundData)['performance_description']}}</p>
                                                                            <button class="btn btn-primary" data-toggle="modal" data-target="#upload_performance{{$key}}">Edit</button><br><br>
                                                                        @else
                                                                            <div class="" data-toggle="modal" data-target="#upload_performance{{$key}}" style="margin-bottom:10px;color:grey;text-align:center;padding: 10px;border-style: dashed;border-color: gray;border-width: 1px;">
                                                                                Add Description
                                                                            </div>
                                                                        @endif
                                                                        <div class="card">
                                                                            <div class="card-header">Score</div>
                                                                            <div class="card-body">
                                                                                <div class="container">
                                                                                    <table class="table table-bordered">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col">Name</th>
                                                                                                @foreach($marksSections as $markSection)
                                                                                                    <th scope="col">{{$markSection}}</th>
                                                                                                @endforeach
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            @if(count($judge_details) == 0)

                                                                                            @else
                                                                                                @foreach($judge_details as $judgeDetails)
                                                                                                    <tr>
                                                                                                        <th scope="row">{{$judgeDetails->first_name}}</th>
                                                                                                        @foreach(\Modules\Competition\Entities\JudgmentMarks::where('round_name',$roundData)->where('judge_id',$judgeDetails->id)->get() as $judge_mark)
                                                                                                            @foreach( json_decode($judge_mark->judge_score_details) as $one_score )                                                                                                                
                                                                                                                <td>{{$one_score->score}}</td>
                                                                                                            @endforeach
                                                                                                        @endforeach
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                            @endif

                                                                                        </tbody>
                                                                                    </table>
                                                                                    <b>Round:</b> {{$roundData}}<br>
                                                                                    <b>Score:</b> {{getScoreMarkSection($competitionDetails->id,$competitorDetails->id,$roundData)['full_score']}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><br>
                                                        </div>
                                                    </div>

                                                   @if(getScoreMarkSection($competitionDetails->id,$competitorDetails->id,$roundData)['performance_link'])
                                                        <script>
                                                            getDetails = getId('{{getScoreMarkSection($competitionDetails->id,$competitorDetails->id,$roundData)['performance_link']}}');
                                                            document.getElementById("myframe{{$key}}").src = 'https://www.youtube.com/embed/' + getDetails;
                                                            function getId(url) {
                                                                const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
                                                                const match = url.match(regExp);

                                                                return (match && match[2].length === 11)
                                                                    ? match[2]
                                                                    : null;
                                                            }
                                                        </script>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                    </div>
                                </div>
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
                        {{--<iframe  id="myframe" id="ytplayer" type="text/html" width="760" height="360"--}}
                                {{--src="https://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&origin=http://example.com"--}}
                                {{--frameborder="0"></iframe>--}}




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


  @foreach($roundDetails as $keyR=>$roundDataR)

        <div class="modal fade"  id="upload_performance{{$keyR}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('frontend.user.save_performance')}}" method="post">
                        {{csrf_field()}}
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$roundDataR}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Youtube Video Link</label>
                                <input type="text" class="form-control" name="performance_link" value="{{getScoreMarkSection($competitionDetails->id,$competitorDetails->id,$roundDataR)['performance_link']}}">
                            </div>
                            <input type="hidden" name="competition_id" value="{{$competitionDetails->id}}">
                            <input type="hidden" name="competitior_id" value="{{$competitorDetails->id}}">
                            <input type="hidden" name="round" value="{{$roundDataR}}">
                            <input type="hidden" name="performance_id" value="{{getScoreMarkSection($competitionDetails->id,$competitorDetails->id,$roundDataR)['performance_id']}}">

                            <div class="form-group">
                                <label>Description</label>
                                <textarea rows="10" name="description" class="form-control">{{getScoreMarkSection($competitionDetails->id,$competitorDetails->id,$roundDataR)['performance_description']}}</textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endforeach



@endsection
