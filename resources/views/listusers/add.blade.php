@extends('layout.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">
            @foreach($values as $key => $value)
                <div class="form-group">
                    <label>Người Phỏng Vấn</label>
                    <select name="interview_id" class="form-control">
                        <option value="{{ $value->interview_id }}">{{ App\Services\interview\InterviewService::getName($value->interview_id) }}</option>
                    </select>
                </div>
                <div class="form-group candidate">
                    <label>Tên Ứng Viên</label>
                    <select name="candidate_id" class="form-control">
                        <option value="{{ $value->candidate_id }}">{{ App\Services\candidate\CandidateService::getName($value->candidate_id) }}</option>
                    </select>
                </div>
                <div class="form-group category">
                    <label>Category</label>
                    <select name="interview_id" class="form-control">
                        <option value="{{ $value->interview_id }}">{{ App\Services\candidate\CandidateService::getNameCate($value->candidate_id) }}</option>
                    </select>
                </div>
                <div class="form-group question_id_1">
                    <label>Câu 1</label>
                    <select name="question_id_1" class="form-control">
                        <option value="{{ $value->question_id_1 }}">Câu Hỏi</option>
                    </select>
                </div>
                <div class="form-group answer_1">
                    <label>Câu trả lời</label>
                    <textarea name="answer_1" id="answer_1" class="form-control"></textarea>
                </div>
                <div class="form-group question_id_2">
                    <label>Câu 2</label>
                    <select name="question_id_2" class="form-control">
                        <option value="{{ $value->question_id_2 }}">Câu Hỏi</option>
                    </select>
                </div>
                <div class="form-group answer_2">
                    <label>Câu trả lời</label>
                    <textarea name="answer_2" id="answer_2" class="form-control"></textarea>
                </div>
                <div class="form-group question_id_3">
                    <label>Câu 3</label>
                    <select name="question_id_3" class="form-control">
                        <option value="{{ $value->question_id_3 }}">Câu Hỏi</option>
                    </select>
                </div>
                <div class="form-group answer_3">
                    <label>Câu trả lời</label>
                    <textarea name="answer_3" id="answer_3" class="form-control"></textarea>
                </div>
                <div class="form-group question_id_4">
                    <label>Câu 4</label>
                    <select name="question_id_4" class="form-control">
                        <option value="{{ $value->question_id_4 }}">Câu Hỏi</option>
                    </select>
                </div>
                <div class="form-group answer_4">
                    <label>Câu trả lời</label>
                    <textarea name="answer_4" id="answer_4" class="form-control"></textarea>
                </div>
                <div class="form-group question_id_5">
                    <label>Câu 5</label>
                    <select name="question_id_5" class="form-control">
                        <option value="{{ $value->question_id_5 }}">Câu Hỏi</option>
                    </select>
                </div>
                <div class="form-group answer_5">
                    <label>Câu trả lời</label>
                    <textarea name="answer_5" id="answer_5" class="form-control"></textarea>
                </div>
                <div class="form-group question_id_6">
                    <label>Câu 6</label>
                    <select name="question_id_6" class="form-control">
                        <option value="{{ $value->question_id_6 }}">Câu Hỏi</option>
                    </select>
                </div>
                <div class="form-group answer_6">
                    <label>Câu trả lời</label>
                    <textarea name="answer_6" id="answer_6" class="form-control"></textarea>
                </div>
                <div class="form-group question_id_7">
                    <label>Câu 7</label>
                    <select name="question_id_7" class="form-control">
                        <option value="{{ $value->question_id_7 }}">Câu Hỏi</option>
                    </select>
                </div>
                <div class="form-group answer_7">
                    <label>Câu trả lời</label>
                    <textarea name="answer_7" id="answer_7" class="form-control"></textarea>
                </div>
                <div class="form-group question_id_8">
                    <label>Câu 8</label>
                    <select name="question_id_8" class="form-control">
                        <option value="{{ $value->question_id_8 }}">Câu Hỏi</option>
                    </select>
                </div>
                <div class="form-group answer_8">
                    <label>Câu trả lời</label>
                    <textarea name="answer_8" id="answer_8" class="form-control"></textarea>
                </div>
                <div class="form-group question_id_9">
                    <label>Câu 9</label>
                    <select name="question_id_9" class="form-control">
                        <option value="{{ $value->question_id_9 }}">Câu Hỏi</option>
                    </select>
                </div>
                <div class="form-group answer_9">
                    <label>Câu trả lời</label>
                    <textarea name="answer_9" id="answer_9" class="form-control"></textarea>
                </div>
                <div class="form-group question_id_10">
                    <label>Câu 10</label>
                    <select name="question_id_10" class="form-control">
                        <option value="{{ $value->question_id_10 }}">Câu Hỏi</option>
                    </select>
                </div>
                <div class="form-group answer_10">
                    <label>Câu trả lời</label>
                    <textarea name="answer_10" id="answer_10" class="form-control"></textarea>
                </div>
            @endforeach
        </div>
        
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection