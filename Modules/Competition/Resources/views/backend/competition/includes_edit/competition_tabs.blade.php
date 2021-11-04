<div class="form-group">
    <label class="form-label">Started Date</label>
    <input type="date" name="start_date" id="start_date" class="form-control" value="{{$competition_details->started_date}}" oninvalid="tabInvalied('comeptitionTabs')" required>
</div>
<div class="form-group">
    <label class="form-label">End Date</label>
    <input type="date" name="end_date" id="end_date" class="form-control" value="{{$competition_details->end_date}}" oninvalid="tabInvalied('comeptitionTabs')" required>
</div>
<div class="form-group">
    <label class="form-label">Feature Image</label>
    <div class="" style="background-image: url('{{url('/files/'.$competition_details->feature_image)}}');height: 190px;background-position: center;background-size: contain;background-repeat: no-repeat;"></div>
    <input type="file" name="feature_image" value="{{$competition_details->feature_image}}" class="form-control">
    <input type="hidden" name="feature_image_name" class="form-control" value="{{$competition_details->feature_image}}">

</div>
<div class="form-group">
    <label class="form-label">Status</label>
    <select class="form-control" name="status" oninvalid="tabInvalied('comeptitionTabs')" required>
        <option value="0"  {{$competition_details->status == 0 ? 'selected':''}}>Unpublished</option>
        <option value="1" {{$competition_details->status == 1 ? 'selected':''}}>Published</option>
    </select>
</div>

<script>
    $(function(){
        var dtToday = new Date();
        
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;

        $('#start_date').attr('min', maxDate);
    });

    $(document).ready(function() {
        var startdate = $('#start_date').val();

        var newdate = new Date(startdate); 
        var month = newdate.getMonth() + 1;
        var day = newdate.getDate();
        var year = newdate.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
            
        var maxDate = year + '-' + month + '-' + day;

        $('#end_date').attr('min', maxDate);
           
    });

    $(document).ready(function() {
        $('#start_date').on('change', function() {
            var startdate = $('#start_date').val();

            var newdate = new Date(startdate); 
            var month = newdate.getMonth() + 1;
            var day = newdate.getDate();
            var year = newdate.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            
            var maxDate = year + '-' + month + '-' + day;

            $('#end_date').attr('min', maxDate);
                            
        });
    });
</script>