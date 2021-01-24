<div class="form-group">
    <label class="form-label">Started Date</label>
    <input type="date" name="start_date" class="form-control" oninvalid="tabInvalied('comeptitionTabs')" required>
</div>
<div class="form-group">
    <label class="form-label">End Date</label>
    <input type="date" name="end_date" class="form-control" oninvalid="tabInvalied('comeptitionTabs')" required>
</div>
<div class="form-group">
    <label class="form-label">Feature Image</label>
    <input type="file" name="feature_image" class="form-control">
</div>
<div class="form-group">
    <label class="form-label">Status</label>
    <select class="form-control" name="status" oninvalid="tabInvalied('comeptitionTabs')" required>
        <option value="0">Unpublished</option>
        <option value="1">Published</option>
    </select>
</div>