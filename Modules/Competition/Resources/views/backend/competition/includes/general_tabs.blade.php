<div class="form-group">
    <label class="form-label">Competition Name</label>
    <input type="text" name="competition_name" class="form-control" value="" oninvalid="tabInvalied('generalTabs')" required>
</div>
<div class="form-group">
    <label class="form-label">Description</label>
    <textarea class="form-control" rows="10" oninvalid="tabInvalied('generalTabs')" name="competition_description" required></textarea>
</div>
<div class="form-group">
    <label class="form-label">Feature</label>
    <select class="form-control" oninvalid="tabInvalied('generalTabs')" name="is_feature" required>
        <option value="1">Enabled</option>
        <option value="0">Disabled</option>
    </select>
</div>
<div class="form-group">
    @if(count($get_category) == 0)
        <div class="" style="background:palevioletred;padding: 10px;color: white;margin-bottom: 5px;">
            Category Data not found
        </div>
    @else

    @endif

    <label class="form-label">Category</label>
    <select class="form-control" oninvalid="tabInvalied('generalTabs')" name="category" required>
        @foreach($get_category as $getCategory)
            <option value="{{$getCategory->id}}">{{$getCategory->category_name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label class="form-label">Payment Type</label>
    <select class="form-control" oninvalid="tabInvalied('generalTabs')" name="payment_type" required>
        <option value="1">Free</option>
    </select>
</div>