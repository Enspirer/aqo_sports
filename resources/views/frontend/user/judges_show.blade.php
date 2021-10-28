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
                    <div class="exploreBody">
                        <div class="row px-4">
                            <div class="col-md-6">
                                <form action="{{route('frontend.user.judge_status')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="card" style="">
                                        <div class="container"><br>
                                            <div><b>Competition Name:</b>  {{$competitionDetails->competition_name}} </div><br>
                                            <div><b>Judge Name:</b>  {{$userDetais->first_name}} {{$userDetais->last_name}}</div> <br>
                                            <div><b>Email:</b>  {{$userDetais->email}}</div> <br>
                                            <div class="form-group">
                                                <b><label>Status</label></b>
                                                <select type="text" class="form-control" name="status">
                                                    <option value="0" {{$judgeDetails->status == 0 ? 'selected':''}}>Pending</option>
                                                    <option value="1" {{$judgeDetails->status == 1 ? 'selected':''}}>Active</option>
                                                    <option value="2" {{$judgeDetails->status == 2 ? 'selected':''}}>Deactivate</option>
                                                </select>
                                                <input type="hidden" value="{{$judgeDetails->id}}" name="judge_id">
                                                <input type="hidden" value="{{$competitionDetails->id}}" name="competition_id">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{route('frontend.user.judges_list',$competitionDetails->id)}}" class="btn btn-warning">Cancel</a>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="card" style="">
                                    <div class="container"><br>
                                        @foreach($JudgeformDetails as $formDetails)
                                            @if($formDetails->type == "text")
                                                <span><b>{{$formDetails->label}}:</b> {{$formDetails->value}}   </span><br><br>
                                            @elseif($formDetails->type == "png" )
                                                <br>
                                                <div class="card">
                                                    <div class="card-header">
                                                        {{$formDetails->label}}
                                                    </div>
                                                    <div class="" style="background-image: url('{{url('/files/'.$formDetails->value)}}');height: 210px;background-position: center;background-repeat: no-repeat;background-size: contain;"></div>
                                                </div>

                                            @endif
                                        @endforeach
                                        <div class="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    

    

@endsection
