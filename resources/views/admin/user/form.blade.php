<div class="form-group">
    <label>Username</label>
    {!! Form::text('name', null, [ 'class' => 'form-control', 'placeholder' => "Username"]) !!}
    {!! $errors->first('name','<span id="name-error" style="color: red">:message</span>' )!!}
</div>
<div class="form-group">
    <label>Password</label>
    {!! Form::text('password1', null, [ 'class' => 'form-control', 'placeholder' => "Password"]) !!}
    {!! $errors->first('password','<span id="name-error" style="color: red">:message</span>' )!!}
</div>
<div class="form-group">
    <label>Email</label>
    {!! Form::text('email', null, [ 'class' => 'form-control', 'placeholder' => "Email"]) !!}
    {!! $errors->first('email','<span id="name-error" style="color: red">:message</span>' )!!}
</div>
<div class="form-group">
    <label>Phone</label>
    {!! Form::text('phone', null, [ 'class' => 'form-control', 'placeholder' => "Phone"]) !!}
</div>
<div class="form-group">
    <label>Address</label>
    {!! Form::text('address', null, [ 'class' => 'form-control', 'placeholder' => "Address"]) !!}
</div>
<div class="form-group">
    <label>Group</label>
    {!! Form::select('group_id', $group, null, ["class" => "form-control"]) !!}
</div>
<button type="submit" class="btn btn-primary">Save</button>