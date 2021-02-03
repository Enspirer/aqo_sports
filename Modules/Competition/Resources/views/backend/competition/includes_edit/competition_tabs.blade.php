<div class="form-group">
    <label class="form-label">Started Date</label>
    <input type="date" name="start_date" class="form-control" value="{{$competition_details->started_date}}" oninvalid="tabInvalied('comeptitionTabs')" required>
</div>
<div class="form-group">
    <label class="form-label">End Date</label>
    <input type="date" name="end_date" class="form-control" value="{{$competition_details->end_date}}" oninvalid="tabInvalied('comeptitionTabs')" required>
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