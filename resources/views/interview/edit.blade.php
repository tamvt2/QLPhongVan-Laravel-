@extends('layout.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Tên Người Phỏng Vấn</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên người phỏng vấn" value="{{ $value->name }}">
            </div>
            <div class="form-group">
                <label>Email Người Phỏng Vấn</label>
                <input type="email" name="email" class="form-control" placeholder="Nhập email người phỏng vấn" value="{{ $value->email }}" required>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Chỉnh Sửa Người Phỏng Vấn</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection