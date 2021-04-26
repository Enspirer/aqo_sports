<div class="row">
    <div class="col-md-4">
        <a href="{{route('frontend.user.orz_create_competition')}}">
            <div class="card" style="padding: 10px;height: 200px;border-style: dashed;border-color: grey;border-width: 2px;text-align: center;"><br>
                <i class="fa fa-plus" style="font-size: 80px;text-align: center;color: #dcd2d2;"></i>
                <h3 style="color: grey">Create new Event</h3>
            </div>
        </a>

    </div>

    @foreach($competitions as $competition)
        <div class="col-md-4">
            <div class="card" style="padding: 10px;height: 200px;">

                <div class="" style="background-image: url('{{url('files/'.$competition->feature_image)}}');height: 200px;background-position: center;background-repeat: no-repeat;background-size: cover">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" style="background: darkblue" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">View Competition Page</a>
                            <a class="dropdown-item" href="#">Edit Competition</a>
                            <a class="dropdown-item" href="#">Edit Judge Form</a>
                            <a class="dropdown-item" href="#">Delete Competition</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Score Board</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Judges List</a>
                            <a class="dropdown-item" href="#">Competitors List</a>
                        </div>
                    </div>
                </div>
                <div class="" style="background-color: darkblue;color: white">
                    <h4 style="text-align: center">{{$competition->competition_name}}</h4>
                </div>
            </div>
        </div>
    @endforeach

</div>


