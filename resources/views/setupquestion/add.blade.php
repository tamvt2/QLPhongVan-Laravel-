@extends('layout.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="{{ url('users/setup/create') }}" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Người Phỏng Vấn</label>
                <select name="interview_id" class="form-control">
                    <option value="0">Tên Người Phỏng Vấn</option>
                    @foreach($interviews as $key => $interview)
                        <option value="{{ $interview->id }}">{{ $interview->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group candidate">
                <label>Tên Ứng Viên</label>
                <select name="candidate_id" class="form-control" id="candidate">
                    <option value="0">Tên Ứng Viên</option>
                    @foreach($candidates as $key => $candidate)
                        <option name="{{ App\Services\candidate\CandidateService::get($candidate->category_id) }}" class="{{ $candidate->category_id }}" value="{{ $candidate->id }}">{{ $candidate->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group category">
                <label>Category</label>
                <input type="text" class="form-control" placeholder="Nhập địa chỉ" id="category" value="" readonly>
            </div>
            <div class="form-group">
                <label>Câu 1</label>
                <select name="question_id_1" class="form-control question">
                    <option value="0">Câu Hỏi</option>
                </select>
            </div>
            <div class="form-group">
                <label>Câu 2</label>
                <select name="question_id_2" class="form-control question">
                    <option value="0">Câu Hỏi</option>
                </select>
            </div>
            <div class="form-group">
                <label>Câu 3</label>
                <select name="question_id_3" class="form-control question">
                    <option value="0">Câu Hỏi</option>
                </select>
            </div>
            <div class="form-group">
                <label>Câu 4</label>
                <select name="question_id_4" class="form-control question">
                    <option value="0">Câu Hỏi</option>
                </select>
            </div>
            <div class="form-group">
                <label>Câu 5</label>
                <select name="question_id_5" class="form-control question">
                    <option value="0">Câu Hỏi</option>
                </select>
            </div>
            <div class="form-group text-center add-question">
                <i class="fas fa-plus-circle"></i>
                <label>Thêm Câu Hỏi</label>
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