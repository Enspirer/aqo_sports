<div class="form-group">
    <label class="form-label">Competition Name</label>
    <input type="text" name="competition_name" class="form-control" value="{{$competition_details->competition_name}}" oninvalid="tabInvalied('generalTabs')" required>
</div>
<div class="form-group">
    <label class="form-label">Description</label>
    <textarea class="form-control" rows="10" oninvalid="tabInvalied('generalTabs')" name="competition_description" required>{{$competition_details->description}}</textarea>
</div>
<div class="form-group">
    <label class="form-label">Feature</label>
    <select class="form-control" oninvalid="tabInvalied('generalTabs')" name="is_feature" required>
        <option value="1" {{$competition_details->is_feature == 1 ? 'selected':''}}>Enabled</option>
        <option value="0" {{$competition_details->is_feature == 0 ? 'selected':''}}>Disabled</option>
    </select>
</div>
<div class="form-group">
    <label class="form-label">Category</label>
    <select class="form-control" oninvalid="tabInvalied('generalTabs')" name="category" required>
        @foreach($get_category as $getCategory)
            <option value="1" {{$competition_details->category_id == $getCategory->id ? 'selected':''}}>{{$getCategory->category_name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label class="form-label">Payment Type</label>
    <select class="form-control" oninvalid="tabInvalied('generalTabs')" name="payment_type" required>
        <option value="1"  {{$competition_details->payment_type == 1 ? 'selected':''}}>Free</option>
    </select>
</div>