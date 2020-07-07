@extends('layouts.navbar')

@section('content_home')
<div class="col-12 p-4">
    <div class="card">
        <div class="card-header">
            <h4>{{ $quiz->name }}</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quiz_questions as $key => $q_question)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $q_question->question->question_content }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Detail</a> |
                            <a href="#" class="btn btn-sm btn-danger" onclick="return alert('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-success">
                Add more question
            </button>
        </div>
    </div>
</div>
@endsection
