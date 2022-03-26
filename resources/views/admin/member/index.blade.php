@extends('admin.layouts.main')
@section('title', 'PT15303 - Quản trị máy bay')
@section('content')



<table class="table table-hover">
    <thead>
        
        <th>Tên</th>
        <th>Leader</th>
        <th>Project</th>
        <th>avatar</th>
        <th>department </th>
        <th>salary</th>
        <th>phone</th>

        <th>
            <a href="{{route('brand.add')}}" type="button" class="btn btn-primary">Tạo mới</a>
        </th>
    </thead>
    <tbody>

        @foreach($members as $p)
        
        <tr>
            
            <td>{{$p->name}}</td>
            <td>{{$p->is_leader?"thành viên" :"leader"}}</td>
            
            
            <td>{{$p->projects->name}}</td>

            <td>
                <img src="{{asset('storage/' . $p->avatar)}}" width="70">
            </td>
            
            <td>{{$p->department}}</td>
            <td>{{$p->salary}}</td>
            <td>{{$p->phone}}</td>



            
            <td>
                <a href="{{route('brand.edit', ['id' => $p->id])}}" type="button" class="btn btn-success">Sửa</a>
                <a href="{{route('brand.remove', ['id' => $p->id])}}" type="button" class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không')">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection