@extends('layout.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Tên Ứng Viên</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên ứng viên">
            </div>
            <div class="form-group">
                <label>Tuổi Ứng Viên</label>
                <input type="text" name="age" class="form-control" placeholder="Nhập tuổi ứng viên">
            </div>
            <div class="form-group">
                <label>Số Điện Thoại</label>
                <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại">
            </div>
            <div class="form-group">
                <label>Địa Chỉ</label>
                <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    <option value="0">Category</option>
                    @foreach($values as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Kinh Nghiệm</label>
                <input type="text" name="experince" class="form-control" placeholder="Nhập kinh nghiệm">
            </div>
            <div class="form-group">
                <label>Ngày Phỏng Vấn</label>
                <input type="text" name="interview_date" class="form-control" placeholder="2020-02-20">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Ứng Viên</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection