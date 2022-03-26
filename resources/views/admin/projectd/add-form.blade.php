
@extends('admin.layouts.main')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên project</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Code</label>
                <input type="text" name="code" class="form-control" value="{{old('code')}}">
                @error('code')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Ngày bắt đầu</label>
                <input type="date" name="start_date" class="form-control" value="{{old('start_date')}}">
                
            </div>
            <div class="form-group">
                <label for="">Ngày kết thúc</label>
                <input type="date" name="end_date" class="form-control" value="{{old('end_date')}}">
                {{-- @error('owner_by')
                    <span class="text-danger">{{$message}}</span>
                @enderror --}}
            </div>
            <div class="form-group">
                <label for="">Chi phí</label>
                <input type="number" name="budget" class="form-control" value="{{old('budget')}}">
                @error('budget')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Lưu</button>
        </div>
    </div>
</form>
@endsection







