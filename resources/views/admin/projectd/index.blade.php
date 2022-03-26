@extends('admin.layouts.main')
@section('content')

<table class="table table-hover">
    <thead>
        <th>Tên</th>
        <th>Code</th>
        <th>start_date</th>
        <th>end_date</th>
        <th>budget</th>
        {{-- <th>Số lượng member</th> --}}
        <th>
            <a href="{{route('plane.add')}}" type="button" class="btn btn-primary">Tạo mới</a>
        </th>
    </thead>
    <tbody>
        @foreach($projects as $p)
        <tr>
            <td>{{$p->name}}</td>
            <td>
                {{$p->code}}
            </td>
            <td>{{$p->start_date}}</td>
            <td>{{$p->end_date}}</td>
            <td>{{$p->budget}}</td>
            {{-- <td>{{count($p->member)}}</td> --}}
            <td>
                <a href="{{route('plane.edit', ['id' => $p->id])}}" type="button" class="btn btn-success">Sửa</a>
                <a href="{{route('plane.remove', ['id' => $p->id])}}" type="button" class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không')">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
