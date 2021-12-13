@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))


@push('after-styles')
    <link rel="stylesheet" href="{{ url('aqo_se/Styles/css/contact_us.css') }}">
@endpush

@section('content')

    <div class="container" style="margin-bottom:200px">
            
        <div class="container">
            <div class="row align-items-center mt-2 p-5 px-5">
                <div class="col-12">
                    <h3 class="text-center">Select a Competiton</h3>
                    <br>
                    <form action="{{route('frontend.search_ranking')}}" method="post" class="filter-form">
                    {{csrf_field()}}
                        <div class="row d-flex justify-content-center">                    
                            <div class="col-4">
                                <select id="competition" class="form-control" name="competition" required>
                                    <option value="" class="text-center" selected disabled>------ Select Here ------</option>   
                                    @foreach($competitons as $key => $competiton)
                                        <option value="{{$competiton->id}}">{{$competiton->competition_name}}</option>   
                                    @endforeach                         
                                </select>
                            </div>
                            <div class="col-1">
                                <input type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success" value="Search" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        @if($competitionDetails != null)

            <div class="row align-items-center mt-5">
                <div class="col-4">
                    <img src="{{url('files',$competitionDetails->feature_image) }}" class="img-fluid" style="object-fit: cover;" width="100%"/>
                </div>

                <div class="col-8 ps-5">
                    <h3 class="fw-bolder" style="color: #E84C4C">{{$competitionDetails->competition_name}}</h3>

                        <div class="row">
                            <div class="col-6">
                                @if($competitionDetails->started_date == null)
                                @else
                                    <p>Started Date : {{ $competitionDetails->started_date }}</p>
                                @endif
                            </div>
                            <div class="col-6 text-right">
                                @if($competitionDetails->end_date == null)
                                @else
                                    <p>End Date : {{ $competitionDetails->end_date }}</p>
                                @endif  
                            </div>
                        </div>                                 

                    <div class="mb-4">
                        <!-- <h5 class="mb-3">Description</h5> -->
                        <div class="ms-4" style="color: rgb(0, 0, 0, 0.6); font-size: 1rem;"><p>{{$competitionDetails->description}}</p></div>
                    </div>
                    
                </div>
            </div>

            <div class="row mt-5">
                <div class="col">
                    <div class="card" style="padding: 10px;">
                        <table id="myTablePrihlasky" class="table table-hover table-bordered table-condensed ">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="titulka" style="width:30px">Final</th>
                                    <th rowspan="2" class="titulka" style="width:50px">Rank</th>
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
        @endif
        
        
    </div>


@endsection

@push('after-scripts')

<script>
    $('.search-btn').on('click', function() {
        $('.filter-form').submit();
    });
</script>

@endpush
