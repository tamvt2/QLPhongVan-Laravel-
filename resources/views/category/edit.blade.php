@extends('layout.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" class="form-control" placeholder="Nhập tên người phỏng vấn" value="{{ $value->category }}">
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