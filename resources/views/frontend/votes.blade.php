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
                    <form action="{{route('frontend.search_votes')}}" method="post">
                    {{csrf_field()}}
                        <div class="row d-flex justify-content-center">                    
                            <div class="col-4">
                                <select id="competition" class="form-control" name="competition" onchange="this.form.submit()">
                                    <option value="#" class="text-center" selected disabled>------ Select Here ------</option>   
                                    @foreach($competitons as $key => $competiton)
                                        <option value="{{$competiton->id}}">{{$competiton->competition_name}}</option>   
                                    @endforeach                         
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        @if($competition_details != null)

            <div class="row align-items-center mt-5">
                <div class="col-4">
                    <img src="{{url('files',$competition_details->feature_image) }}" class="img-fluid" style="object-fit: cover;" width="100%"/>
                </div>

                <div class="col-8 ps-5">
                    <h3 class="fw-bolder" style="color: #E84C4C">{{$competition_details->competition_name}}</h3>

                        <div class="row">
                            <div class="col-6">
                                @if($competition_details->started_date == null)
                                @else
                                    <p>Started Date : {{ $competition_details->started_date }}</p>
                                @endif
                            </div>
                            <div class="col-6 text-right">
                                @if($competition_details->end_date == null)
                                @else
                                    <p>End Date : {{ $competition_details->end_date }}</p>
                                @endif  
                            </div>
                        </div>                                 

                    <div class="mb-4">
                        <!-- <h5 class="mb-3">Description</h5> -->
                        <div class="ms-4" style="color: rgb(0, 0, 0, 0.6); font-size: 1rem;"><p>{{$competition_details->description}}</p></div>
                    </div>
                    
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <table class="table table-hover">
                    <thead>
                        <tr class="align-items-center">
                            <th scope="col">Competitor Name</th>
                            <th scope="col">Vote Count</th>
                            <th scope="col">Performance</th>
                            <th scope="col">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                        @foreach($getCompetitorDetails as $competiotrDetail)
                            @if(is_performed($competiotrDetail['competitor_id'], $competition_details->id))
                                <form action="{{ route('frontend.competition_page_voting') }}" method="post">
                                {{ csrf_field() }}
                                    <tr>
                                        <td>{{$competiotrDetail['competitor_name']}}</td>
                                        <td>{{$competiotrDetail['votes']}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#performanceModal" onclick="view({{$competiotrDetail['competitor_id']}})">View</button></td>
                                        <td>
                                            @auth
                                                @if(is_voted($competiotrDetail['competitor_id'], $competition_details->id))
                                                    <button type="submit" class="btn btn-primary" disabled>Voted</button>
                                                @else
                                                    <button type="submit" class="btn btn-primary">Vote Now</button>
                                                @endif
                                            @else
                                                <a href="{{ route('frontend.auth.login') }}" type="button" class="btn btn-primary">Vote Now</a>
                                            @endauth
                                        </td>

                                        <input type="hidden" name="competitor_id" value="{{$competiotrDetail['competitor_id']}}">
                                        <input type="hidden" name="competition_id" value="{{ $competition_details->id }}">
                                    </tr>
                                </form>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            
        @endif
        
        
    </div>

    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-toggle="modal" data-target="#voteModal"></button>

        <div class="modal fade" id="voteModal" tabindex="-1" aria-labelledby="voteModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 3rem 1rem;">
                        <h4 class="mb-3 text-center">Voted successfully.</h4>
                        <h5>You voted for {{ App\Models\Auth\User::where('id', session('competitor'))->first()->first_name }} {{ App\Models\Auth\User::where('id', session('competitor'))->first()->last_name }} under this {{ $competition_details->competition_name }} competition.</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="modal fade" id="performanceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Performance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body performance">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')

<!-- <script>
    $('.search-btn').on('click', function() {
        $('.filter-form').submit();
    });
</script> -->

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>

    <script>
        function view(id) {
 
            var settings = {
                "url": "{{url('/')}}/api/competitor-performance/" + id,
                "method": "GET",
                "timeout": 0,
                "dataType": "json",
                };

            $.ajax(settings).done(function (response) {
                

                let count = 0;
                
                response.forEach(res => {

                    let round = res['round_name'];
                    let video = res['performance_link'].replace('watch?v=', 'embed/');
                    let description = res['performance_description'];

                    let template = `<div id="accordion">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_${count}" aria-expanded="true" aria-controls="collapseOne">
                                                                ${round}
                                                            </button>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="collapse_${count}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            
                                                            <iframe id="myframe" type="text/html" width="100%" src="${video}" frameborder="0" style="height: 280px;"></iframe>
                                                            
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h3>Description</h3> <br>
                                                            <p>${description}</p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;

                    count++;

                    $('.performance').append(template);
                });

                
                // getDetails = response['performance_link'].replace('watch?v=', 'embed/');
                
                // document.getElementById("myframe").src = getDetails;
                
            });
        };

    </script>

@endpush
