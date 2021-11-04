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
                    <div class="exploreBody px-4">
                       <div class="row mb-3">
                           <div class="col-8">
                               <h4>{{ $competition_details->competition_name }}</h4>
                               <h6>Total Competitors: {{ $competitorCount }}</h6>
                           </div>
                       </div>
                        <div class="row">
                            <div class="col">
                                <div class="card" style="padding: 10px; background-color:#F5F5F5">
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
                                                    @endforeach
                                                </tr>
                                            </tr>
                                        </tbody>
                                    </table>
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


    

@endsection
