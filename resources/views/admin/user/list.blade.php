@extends('admin.master')
@section('pageHeader','User')
@section('action','List')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Username</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php  
            $stt = 0;
        ?>
        @foreach($getUserList as $user)
        <tr class="odd gradeX" align="center">
            <td>{!! $stt+=1; !!}</td>
            <td>{!! $user->username !!}</td>
            <td>{!! $user->level !!}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! route('getDeleteUser', $user->id) !!}" onclick="return confirmDelete('Bạn chắc chắn muốn xóa?');"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection()
