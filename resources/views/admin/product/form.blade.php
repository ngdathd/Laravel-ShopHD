<div class="form-group">
    <label>Name</label>
    {!! Form::text('name', null, [ 'class' => 'form-control', 'placeholder' => "Name"]) !!}
</div>
<div class="form-group">
    <label>Category</label>
    {!! Form::select('categories_id', $categories, null, ["class" => "form-control"]) !!}
</div>
<div class="form-group">
    <label>Price</label>
    {!! Form::text('price', null, [ 'class' => 'form-control', 'placeholder' => "Price"]) !!}
</div>
<div class="form-group">
    <label>Thumbnail</label>
    {!! Form::file('thumbnail', ["class" => "form-control"]) !!}
</div>
<button type="submit" class="btn btn-primary">Save</button>