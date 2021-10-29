@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="dashboard-body">
        @include('frontend.user.includes.dashboad_nav')



        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="" style="padding-left: 20px;padding-right:20px;">
                    <div class="exploreBody">
                        <div class="card">
                            <div class="card-body">
                                <div id="accordion">
                                    @foreach($roundDetails as $key=>$roundData)
                                        <div class="card">
                                            <div class="card-header" id="headingOne{{$key}}">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne_{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                                                {{$roundData}}
                                                            </button>
                                                        </h5>
                                                    </div>
                                                        @if(isset(\Modules\Competition\Entities\JudgmentMarks::where('competitor_id',$competitorDetails->id)->where('judge_id',auth()->user()->id)->where('round_name',$roundData)->first()->score))
                                                           @if(\Modules\Competition\Entities\JudgmentMarks::where('competitor_id',$competitorDetails->id)->where('judge_id',auth()->user()->id)->where('round_name',$roundData)->first()->judge_score != null)
                               
                                                           <div class="col-6 text-right">
                                                                        <div class="row">
                                                                            <div class="col-10 mt-2">                                                                                
                                                                                <h5>Total Score: {{ \Modules\Competition\Entities\JudgmentMarks::where('competitor_id',$competitorDetails->id)->where('judge_id',auth()->user()->id)->where('round_name',$roundData)->first()->judge_score }}</h5>
                                                                            </div>
                                                                            <div class="col-2">
                                                                                <h2 class="bi bi-check text-success"></h2>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            @endif
                                                        @endif
                                                </div>
                                                
                                                
                                            </div>
                                            <div id="collapseOne_{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
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
                                                                @else
                                                                    <div class="" data-toggle="modal" data-target="#upload_performance{{$key}}" style="margin-bottom:10px;color:grey;text-align:center;padding: 10px;border-style: dashed;border-color: gray;border-width: 1px;">
                                                                        No Description
                                                                    </div>
                                                                @endif
                                                                <div class="card">
                                                                    <div class="card-header">Score</div>
                                                                    <div class="card-body">
                                                                        <div class="container">
                                                                            <form action="{{route('frontend.user.add_marks_judge')}}" method="post">
                                                                                {{csrf_field()}}
                                                                                <table class="table table-bordered">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        @foreach($marksSections as $markSection)
                                                                                            <th scope="col">{{$markSection}}</th>
                                                                                        @endforeach
                                                                                    </tr>
                                                                                    </thead>

                                                                                    <tbody>
                                                                                        <tr>

                                                                                                @foreach($marksSections as $markSection)
                                                                                                    <input type="hidden" class="form-control" name="mark_section[]" value="{{$markSection}}">
                                                                                                    <th scope="row">
                                                                                                        @if(isset(\Modules\Competition\Entities\JudgmentMarks::where('competitor_id',$competitorDetails->id)->where('judge_id',auth()->user()->id)->where('round_name',$roundData)->first()->judge_score_details))
                                                                                                            @foreach(json_decode(\Modules\Competition\Entities\JudgmentMarks::where('competitor_id',$competitorDetails->id)->where('judge_id',auth()->user()->id)->where('round_name',$roundData)->first()->judge_score_details) as $oDetails)
                                                                                                                @if($oDetails->mark_section == $markSection)
                                                                                                                    <input type="number" class="form-control" name="marks[]" value="{{$oDetails->score}}">
                                                                                                                @else

                                                                                                                @endif

                                                                                                            @endforeach
                                                                                                        @else
                                                                                                            <input type="number" class="form-control" name="marks[]" value="" required>

                                                                                                        @endif
                                                                                                    </th>
                                                                                                @endforeach
                                                                                                <input type="hidden" name="round_section" value="{{$roundData}}">
                                                                                                <input type="hidden" name="competitor_id" value="{{$competitorDetails->id}}">
                                                                                                <input type="hidden" name="competition_id" value="{{$competitionDetails->id}}">


                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <button class="btn btn-primary">Add Score</button>


                                                                                <table class="table table-bordered mt-3">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        @foreach($marksSections as $markSection)
                                                                                            <th scope="col">{{$markSection}}</th>
                                                                                        @endforeach
                                                                                    </tr>
                                                                                    </thead>

                                                                                    <tbody>
                                                                                        <tr>

                                                                                                @foreach($marksSections as $markSection)
                                                                                                    <input type="hidden" class="form-control" value="{{$markSection}}">
                                                                                                    <th scope="row">
                                                                                                        @if(isset(\Modules\Competition\Entities\JudgmentMarks::where('competitor_id',$competitorDetails->id)->where('judge_id','!=',auth()->user()->id)->where('round_name',$roundData)->first()->judge_score_details))
                                                                                                            @foreach(json_decode(\Modules\Competition\Entities\JudgmentMarks::where('competitor_id',$competitorDetails->id)->where('judge_id','!=',auth()->user()->id)->where('round_name',$roundData)->first()->judge_score_details) as $oDetails)
                                                                                                                @if($oDetails->mark_section == $markSection)
                                                                                                                    <input type="number" class="form-control" value="{{$oDetails->score}}" readonly>
                                                                                                                @else

                                                                                                                @endif

                                                                                                            @endforeach
                                                                                                        @else
                                                                                                            <input type="number" class="form-control" value="" readonly>

                                                                                                        @endif
                                                                                                    </th>
                                                                                                @endforeach

                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
