@extends('layout.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="{{ url('users/listusers/insert') }}" method="post">
        <div class="card-body">
            @foreach($values as $key => $value)
                <div class="form-group">
                    <label>Người Phỏng Vấn</label>
                    <select name="interview_id" class="form-control">
                        <option value="{{ $value->interview_id }}">{{ $value->interview_name }}</option>
                    </select>
                </div>
                <div class="form-group candidate">
                    <label>Tên Ứng Viên</label>
                    <select name="candidate_id" class="form-control">
                        <option value="{{ $value->candidate_id }}">{{ $value->candidate_name }}</option>
                    </select>
                </div>
                <div class="form-group category">
                    <label>Category</label>
                    <select name="interview_id" class="form-control">
                        <option value="{{ $value->category_id }}">{{ $value->category_name }}</option>
                    </select>
                </div>
                @break;
            @endforeach
            @for ($i = 0; $i < count($values); $i++)
                <div class="form-group question_id_{{ $i+1 }}">
                    <label>Câu {{ $i+1 }}</label>
                    <select name="question_id_{{ $i+1 }}" class="form-control">
                        <option value="{{ $values[$i]->id }}">{{ $values[$i]->question_question }}</option>
                    </select>
                </div>
                <div class="form-group answer_1">
                    <label>Câu trả lời</label>
                    <textarea name="answer_{{ $i+1 }}" id="answer_{{ $i+1 }}" class="form-control"></textarea>
                </div>
            @endfor
            <div class="form-group">
                <label>Nhận xét</label>
                <textarea name="comment" id="comment" class="form-control"></textarea>
            </div>
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