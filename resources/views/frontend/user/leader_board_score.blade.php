@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="dashboard-body">
        @include('frontend.user.includes.dashboad_nav')
        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="container">
                    <h5>
                        @if($competitionDetails->competition_name != null)
                            {{$competitionDetails->competition_name}}
                        @endif
                    </h5>

                    <div class="row mt-3">
                        <div class="col">
                            <div class="card" style="padding: 20px;">

                            <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="pills-score-tab" data-toggle="pill" href="#pills-score" role="tab" aria-controls="pills-score" aria-selected="true">Score</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-votes-tab" data-toggle="pill" href="#pills-votes" role="tab" aria-controls="pills-votes" aria-selected="false">Votes</a>
                                </li>
                            </ul>
                                <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-score" role="tabpanel" aria-labelledby="pills-score-tab">
                                    
                                    <table id="myTablePrihlasky" class="table table-hover table-bordered table-condensed ">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="titulka" style="width:30px">Final</th>
                                                <th rowspan="2" class="titulka" style="width:50px">Place</th>
                                                <th rowspan="2" class="titulka" style="width:70px">Country</th>
                                                <th rowspan="2" class="titulka">Name/Club</th>
                                                <th rowspan="2" class="titulka" style="width:50px; border-right:1px solid gray">Year</th>
                                                @foreach($roundSection as $roundSectioenn)
                                                    <th colspan="{{count($markSection)}}" style="text-align:center; border-right:1px solid gray">
                                                        {{$roundSectioenn}}
                                                    </th>
                                                @endforeach

                                                <th rowspan="2" class="titulka" style="width:50px ; border-right:1px solid gray">Score</th>
                                            </tr>

                                            <tr>
                                                @foreach($roundSection as $roundSectioenn)
                                                    @foreach($markSection as $markSectionItem)
                                                        <th class="titulka" style="width:50px">{{$markSectionItem}}</th>
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        </thead>


                                        <tbody id="tBodyFinale">
                                            <tr>
                                                <tr>
                                                    @foreach($competitor_details as $competitor_detail)
                                                        @if( $competitor_detail->user_id == auth()->user()->id )

                                                            <td rowspan="2" style="background-color: bisque">1</td>
                                                            <td rowspan="2" style="text-align:center;font-size:15px; background-color: bisque">1.</td>
                                                            <td rowspan="2" style="background-color: bisque"><img onerror="$(this).hide()" style="width:20px" src="flags/USA.png">{{\App\Models\Auth\User::where('id',$competitor_detail->user_id)->first()->country}}</td>
                                                            <td rowspan="2" style="background-color: bisque">{{\App\Models\Auth\User::where('id',$competitor_detail->user_id)->first()->first_name}} {{\App\Models\Auth\User::where('id',$competitor_detail->user_id)->first()->last_name}}</td>
                                                            <td rowspan="2" style="text-align:center; border-right:1px solid gray; background-color: bisque">{{ date_format($competitor_detail->created_at,'Y') }}</td>

                                                            @foreach($roundSection as $deround_details)
                                                                <td colspan="{{count($markSection)}}" style="text-align:center;font-size:12px; border-right:1px solid gray; background-color: bisque">
                                                                    <b>{{round_total($competitor_detail->id,$deround_details,$deround_details)}}</b>
                                                                    <div style="float:right; font-size:10px;">{{\Modules\Competition\Entities\JudgmentMarks::where('competitor_id',$competitor_detail->id)->where('competition_id',$competitor_detail->competition_id)->where('round_name',$deround_details)->count()}}</div>
                                                                </td>
                                                            @endforeach


                                                            <td rowspan="2" style="text-align:center;font-size:14px; border-right:1px solid gray; background-color: bisque">
                                                                <b>{{get_competitor_all_score($competitor_detail->id)}}</b>
                                                            </td>
                                                                    <tr>
                                                                        @foreach($roundSection as $oulem)

                                                                            @foreach($markSection as $markSectionItem)
                                                                                <td style="text-align:center;font-size:12px; background-color: #ffbf72">{{judge_marks_total($competitor_detail->id,$markSectionItem,$oulem)}}</td>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </tr>

                                                        @else
                                                        
                                                            <td rowspan="2">1</td>
                                                            <td rowspan="2" style="text-align:center;font-size:15px; ">1.</td>
                                                            <td rowspan="2"><img onerror="$(this).hide()" style="width:20px" src="flags/USA.png">{{\App\Models\Auth\User::where('id',$competitor_detail->user_id)->first()->country}}</td>
                                                            <td rowspan="2">{{\App\Models\Auth\User::where('id',$competitor_detail->user_id)->first()->first_name}} {{\App\Models\Auth\User::where('id',$competitor_detail->user_id)->first()->last_name}}</td>
                                                            <td rowspan="2" style="text-align:center; border-right:1px solid gray;">{{ date_format($competitor_detail->created_at,'Y') }}</td>

                                                            @foreach($roundSection as $deround_details)
                                                                <td colspan="{{count($markSection)}}" style="text-align:center;font-size:12px; border-right:1px solid gray; ">
                                                                    <b>{{round_total($competitor_detail->id,$deround_details,$deround_details)}}</b>
                                                                    <div style="float:right; font-size:10px">{{\Modules\Competition\Entities\JudgmentMarks::where('competitor_id',$competitor_detail->id)->where('competition_id',$competitor_detail->competition_id)->where('round_name',$deround_details)->count()}}</div>
                                                                </td>
                                                            @endforeach


                                                            <td rowspan="2" style="text-align:center;font-size:14px; border-right:1px solid gray;">
                                                                <b>{{get_competitor_all_score($competitor_detail->id)}}</b>
                                                            </td>
                                                                    <tr>
                                                                        @foreach($roundSection as $oulem)

                                                                            @foreach($markSection as $markSectionItem)
                                                                                <td style="text-align:center;font-size:12px;">{{judge_marks_total($competitor_detail->id,$markSectionItem,$oulem)}}</td>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </tr>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="pills-votes" role="tabpanel" aria-labelledby="pills-votes-tab">
                                    
                                    <table class="table table-striped table-bordered" id="competitions-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">Competition Name</th>
                                                <th scope="col">Votes</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                                
                            </div><!--card-->
                        </div><!--col-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            var table = $('#competitions-table').DataTable({
                processing: true,
                ajax: "{{route('frontend.user.competition_score.getscore',$competitionDetails->id)}}",
                serverSide: true,
                order: [[0, "desc"]],
                columns: [
                    {data: 'competitor_name', name: 'competitor_name'},
                    {data: 'votes', name: 'votes'},
                ]
            });
        });

    </script>
@endsection