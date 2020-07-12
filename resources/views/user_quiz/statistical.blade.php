@extends('layouts.navbar')

@section('content_home')
<div class="card">
    <div class="card-header">
        <h4>User: {{ $user->email }}</h4>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <th>Quiz</th>
                <th>Date</th>
                <th>Result</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($userQuizzes as $userQuiz)
                <tr>
                    <td>{{ $userQuiz->quiz->name }}</td>
                    <td>{{ $userQuiz->quiz->created_at }}</td>
                    <td></td>
                    <td><button class="btn-sm btn-info"><i class="fas fa-info-circle"></i> Detail</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
