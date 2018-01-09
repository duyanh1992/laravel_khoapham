@extends('admin.master')
@section('pageHeader','Product')
@section('action','Add')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{!! url('/admin/product/postAdd') !!}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      @if(count($errors)>0)
        @foreach($errors->all() as $error)
          <ul class="alert alert-danger">
            <li>{!! $error !!}</li>
          </ul>
        @endforeach
      @endif
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="slt">
                <option value="">Please Choose Category</option>
                <?php getCateMenu($cateData, 0, ' ', old('slt')); ?>
            </select>
        </div>

        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName')!!}"/>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{!! old('txtPrice'); !!}"/>
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea id="editor1" class="form-control" rows="3" name="txtIntro" value="{!! old('txtPrice'); !!}"></textarea>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea id="editor2" class="form-control" rows="3" name="txtContent" value="{!! old('txtContent'); !!}"></textarea>
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages" value="{!! old('fImages'); !!}">
        </div>

        <div class="form-group">
            <label>Detail Images</label>
            <input type="file" name="fDetailImages[]" multiple>
        </div>

        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords'); !!}"/>
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDescription" >{!! old('txtDescription'); !!}</textarea>
        </div>

        <button type="submit" class="btn btn-default">Product Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection()
