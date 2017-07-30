<div class="form-group">
    <label>Category</label>
    <input class="form-control" name="title"
           @if(!empty($c))
           value="{{ $c->title }}"
           @endif
           placeholder="Category">
</div>
<button type="submit" class="btn btn-primary">Save</button>