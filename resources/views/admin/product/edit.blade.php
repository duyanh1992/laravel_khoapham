@extends('admin.master')
@section('pageHeader','Product')
@section('action','edit')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="" method="POST">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="slt">
                <option value="0">Please Choose Category</option>
                <?php getCateMenu($cateData, 0, '', $productData->cate_id) ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName', isset($productData) ? $productData->name : null) !!}"/>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{!! old('txtPrice', isset($productData) ? $productData->price : null) !!}"/>
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea id="editor1" class="form-control" rows="3" name="txtIntro" >{!! old('txtIntro', isset($productData) ? $productData->intro : null) !!}</textarea>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea id="editor2" class="form-control" rows="3" name="txtContent">{!! old('txtContent', isset($productData) ? $productData->content : null) !!}</textarea>
        </div>
        <div class="form-group">
            <label>Current Images</label><br>
            <img src="{!! asset('public/images/'.$productData->image) !!}" />
        </div>

        <div class="form-group">
            <label>Detail Images</label><br>
            @foreach($detailImages as $detailImage)
                <img src="{!! asset('public/images/detailImg/'.$detailImage['images']) !!}" /><br><br>
            @endforeach
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Keywords" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription', isset($productData) ? $productData->description : null) !!}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection()