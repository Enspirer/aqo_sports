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
                            <div class="card" style="padding: 10px;">
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
                            </div><!--card-->
                        </div><!--col-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection