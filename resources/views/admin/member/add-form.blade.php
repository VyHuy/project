
@extends('admin.layouts.main')
@section('content')



<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên </label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Leader</label>
                <select name="is_leader" class="form-control">
                    <option value="1">Leader</option>
                    <option value="0">Thành viên</option>

                </select>
            </div>
            <div class="form-group">
                <label for="">Project</label>
                <select name="project_id" class="form-control">
                    @foreach($projects as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" name="file_upload" class="form-control">
                @error('file_upload')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Bộ phận</label>
                <input type="text" name="department" class="form-control" value="{{old('department')}}">
                @error('department')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Lương</label>
                <input type="number" name="salary" class="form-control" value="{{old('salary')}}">
                @error('salary')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="number" name="phone" class="form-control" value="{{old('phone')}}">
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            
        </div>
    </div>
    
    
    <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-primary" type="submit">Lưu</button>
        <a href="{{route('brand.index')}}" class="btn btn-danger">Huỷ</a>
    </div>
    
</form>
@endsection
