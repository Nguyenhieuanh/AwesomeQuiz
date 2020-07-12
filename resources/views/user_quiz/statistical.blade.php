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
                    <td class="{{ $userQuiz->point >= 75 ? "text-success" : "text-danger" }}">
                        {{ ($userQuiz->point >= 75 ? "Pass" : "Fail") }}
                    </td>
                    <td><a class="btn btn-sm btn-info"
                            href="{{ route('quiz.result', ['quizId' => $userQuiz->id, 'userId' => $user->id]) }}">
                            <span><i class="fas fa-info-circle"></i> Detail</span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
