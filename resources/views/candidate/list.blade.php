@extends('layout.main')

@section('content')
    <table class="table">
    <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên</th>
                <th>Số Điện Thoại</th>
                <th>Category</th>
                <th>Ngày Phỏng Vấn</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($values as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ App\Services\candidate\CandidateService::get($value->category_id) }}</td>
                    <td>{{ $value->interview_date }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/users/candidate/edit/{{ $value->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="" onclick="removeRow('{{ $value->id }}', '/users/candidate/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection