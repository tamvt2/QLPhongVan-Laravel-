@extends('layout.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Câu Hỏi</label>
                <input type="text" name="question" class="form-control" placeholder="Nhập tên người phỏng vấn" value="{{ $value->question }}">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    <option value="0" {{ $value->category_id == 0 ? 'selected' : '' }}>Category</option>
                    @foreach($values as $key => $valu)
                        <option value="{{ $valu->id }}" {{ $value->category_id == $valu->id ? 'selected' : '' }}>
                            {{ $valu->category }}</option>
                    @endforeach
                </select>
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