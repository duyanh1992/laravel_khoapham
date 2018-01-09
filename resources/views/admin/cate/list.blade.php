@extends('admin.master')
@section('pageHeader','Category')
@section('action','List')
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Category Parent</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
      <?php
        $stt = 0;
      ?>
      @foreach($cateList as $item)
        <tr class="odd gradeX" align="center">
            <td>{!! $stt+=1; !!}</td>
            <td>{!! $item->name !!}</td>
            <td>
              <?php
                if ($item->parent_id == 0) {
                  echo "None";
                }
                else{
                  $parentName = DB::table('cates')->select('name')->where('id', $item->parent_id)->first();
                  echo $parentName->name;
                }
              ?>
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirmDelete('Bạn chắc chắn muốn xóa?');" href="{!! route('getDeleteCate', $item->id) !!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('getEditCate', $item->id) !!}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection()
