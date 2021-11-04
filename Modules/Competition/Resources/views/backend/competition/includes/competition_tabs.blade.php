<div class="form-group">
    <label class="form-label">Started Date</label>
    <input type="date" name="start_date" id="start_date" class="form-control"  value="" required>
</div>
<div class="form-group">
    <label class="form-label">End Date</label>
    <input type="date" name="end_date" id="end_date" class="form-control" value="" required>
</div>
<div class="form-group">
    <label class="form-label">Feature Image</label>
    <input type="file" name="feature_image" value="" class="form-control" required>
</div>
<div class="form-group">
    <label class="form-label">Status</label>
    <select class="form-control" name="status" oninvalid="tabInvalied('comeptitionTabs')" required>
        <option value="0">Unpublished</option>
        <option value="1">Published</option>
    </select>
</div>

<script>
    $(function(){
        var dtToday = new Date();
        // console.log(dtToday);
        
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
        $('#start_date').on('change', function() {
            var startdate = $(this).val();

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

