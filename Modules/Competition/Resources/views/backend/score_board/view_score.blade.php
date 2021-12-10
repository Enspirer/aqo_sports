@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card" style="padding: 10px;">
                <table id="myTablePrihlasky" class="table table-hover table-bordered table-condensed ">
                    <thead>
                        <tr>
                            <th rowspan="2" class="titulka" style="width:30px">Final</th>
                            <th rowspan="2" class="titulka" style="width:50px">Rank</th>
                            <th rowspan="2" class="titulka" style="width:50px ; border-right:1px solid gray">Add Rank</th>
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
                                    <td rowspan="2" style="text-align:center;font-size:15px;">
                                        @if($competitor_detail->rank == null)
                                            Not Set
                                        @else                                    
                                            {{$competitor_detail->rank}}
                                        @endif
                                    </td>
                                    <td rowspan="2"><button class="btn btn-success" data-toggle="modal" data-target="#add_rank{{$competitor_detail->id}}">Rank</button></td>
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

@foreach($competitor_details as $competitor_detail)

<div class="modal fade" id="add_rank{{$competitor_detail->id}}" tabindex="-1" aria-labelledby="inquireLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{route('admin.competitior.add_rank')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-header text-white" style="background-color: #1D5001;">
                    <h6 class="modal-title" id="inquire-modal">Add Rank</h6>
                </div>
                <div class="modal-body">

                    <div class="">
                        <label for="competitor_name" class="form-label">Competitor Name</label>
                        <input type="text" class="form-control" name="competitor_name" value="{{\App\Models\Auth\User::where('id',$competitor_detail->user_id)->first()->first_name}} {{\App\Models\Auth\User::where('id',$competitor_detail->user_id)->first()->last_name}}" readonly>
                    </div>
                    <div class="mt-3">
                        <label for="competition_name" class="form-label">Competiton Name</label>
                        <input type="text" class="form-control" name="competition_name" value="{{$competitionDetails->competition_name}}" readonly>
                    </div>                    
                    <div class="mt-3">
                        <label for="rank" class="form-label">Rank <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="rank" value="{{$competitor_detail->rank}}" required>
                    </div>

                </div>
                <div class="modal-footer justify-content-center">
                    <input type="hidden" name="hidden_id" value="{{$competitor_detail->id}}" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="submit-btn btn text-white px-5" style="background-color: #68AE42;"
                        value="Submit" />
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach

@endsection
