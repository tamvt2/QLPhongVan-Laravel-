@extends('layout.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Tên Người Phỏng Vấn</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên người phỏng vấn">
            </div>
            <div class="form-group">
                <label>Email Người Phỏng Vấn</label>
                <input type="text" name="email" class="form-control" placeholder="Nhập email người phỏng vấn">
            </div>
            <div class="form-group">
                <label>Mật khẩu đăng nhập</label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu đăng nhập">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Người Phỏng Vấn</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection