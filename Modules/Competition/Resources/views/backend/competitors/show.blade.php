@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('admin.competitior.change_status')}}" method="post">
                            {{csrf_field()}}
                        <div class="card" style="">
                            <div class="container"><br>
                                <span><b>Competition Name:</b>  {{$competitionDetails->competition_name}} </span><br>
                                <span><b>Competitor:</b>  {{$userDetais->first_name}} {{$userDetais->last_name}}</span> <br>
                                <span><b>Category:</b> {{$categoryDetails->category_name}}</span><br><br>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="accept_status" class="form-control">
                                            <option value="0" {{$competitorDetails->competitor_status == 0 ? 'selected':''}}>Pending</option>
                                            <option value="1" {{$competitorDetails->competitor_status == 1 ? 'selected':''}}>Accept</option>
                                        </select>
                                    </div>
                                <input type="hidden" name="competitor_id" value="{{$competitorDetails->id}}">
                                <input type="hidden" name="competition_id" value="{{$competitionDetails->id}}">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{route('frontend.competition_page',$competitionDetails->id)}}" class="btn btn-primary">View</a>
                        <a href="{{route('admin.competition.edit',$competitionDetails->id)}}" class="btn btn-primary">Edit Competition</a>
                        <a href="{{route('admin.competition')}}" class="btn btn-primary">Back Competition</a>
                        <a href="{{route('admin.competitior.index',$competitionDetails->id)}}" class="btn btn-warning">Cancel</a>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="">
                            <div class="container"><br>
                                @foreach($competitionformDetails as $formDetails)
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

@endsection
