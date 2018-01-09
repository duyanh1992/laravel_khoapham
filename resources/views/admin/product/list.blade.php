@extends('admin.master')
@section('pageHeader','Product')
@section('action','List')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Date</th>
            <th>Category</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $stt = 0;
      ?>
      @foreach($getListProduct as $product)
        <tr class="odd gradeX" align="center">
            <td><?php echo $stt+=1; ?></td>
            <td>{!! $product->name !!}</td>
            <td>{!! number_format($product->price) !!} VNĐ</td>
            <td>
              <?php
                echo \Carbon\Carbon::createFromTimeStamp(strtotime($product->created_at))->diffForHumans();
              ?>
            </td>
            <td>
              <?php
              $getCateName = DB::table('cates')->select('name')->where('id', ($product->cate_id))->first();
              echo $getCateName->name;
              ?>
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! route('getDeleteProduct', $product->id)!!}" onclick="return confirmDelete('Bạn chắc chắn muốn xóa?');"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('getEditProduct', $product->id) !!}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection()
