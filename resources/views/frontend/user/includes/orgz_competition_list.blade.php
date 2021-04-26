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
                </div>
            </div>
        </div>
    @endforeach

</div>


