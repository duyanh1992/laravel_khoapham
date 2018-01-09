@extends('admin.master')
@section('pageHeader','Category')
@section('action','Edit')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{!! route('postEditCate', $currentCateData->id) !!}" method="POST">
      @include('admin.blocks.error')
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="slt">
                <option value="0">Please Choose Category</option>
                <?php getCateMenu($cateData, 0, '', $currentCateData->parent_id) ?>
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{!! isset($currentCateData) ? $currentCateData->name : null !!}"/>
        </div>
        <div class="form-group">
            <label>Category Order</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{!! isset($currentCateData) ? $currentCateData->order : null !!}"/>
        </div>
        <div class="form-group">
            <label>Category Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! isset($currentCateData) ? $currentCateData->keywords : null !!}"/>
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" name="txtDescription">{!! isset($currentCateData) ? $currentCateData->description : null !!}</textarea>
        </div>

        <button type="submit" class="btn btn-default">Category Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection()
