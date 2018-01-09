@extends('admin.master')
@section('pageHeader','Category')
@section('action','Add')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
  @include('admin.blocks.error')
<form action="{!! route('postAddCate') !!}" method="POST">
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="form-group">
    <label>Category Parent</label>
    <select class="form-control" name="slt">
        <option value="0">Please Choose Category</option>
        <?php getCateMenu($cateData); ?>
    </select>
</div>
<div class="form-group">
    <label>Category Name</label>
    <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{!! old('txtCateName') !!}"/>
</div>
<div class="form-group">
    <label>Category Order</label>
    <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{!! old('txtOrder') !!}"/>
</div>
<div class="form-group">
    <label>Category Keywords</label>
    <input class="form-control" name="txtKeyWords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeyWords') !!}"/>
</div>
<div class="form-group">
    <label>Category Description</label>
    <textarea class="form-control" name="txtDescription" rows="3">{!! old('txtDescription') !!}</textarea>
</div>
<button type="submit" class="btn btn-default">Category Add</button>
<button type="reset" class="btn btn-default">Reset</button>
<form>
</div>
@endsection()
