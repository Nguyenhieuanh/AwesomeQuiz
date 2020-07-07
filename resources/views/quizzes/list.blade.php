@extends('layouts.navbar')

@section('content_home')
<div class="col-12 p-4">
    <a href="{{ route('quiz.create') }}" class="btn btn-success mb-4">Create new Quiz</a>
    <div class="card-deck">
        @foreach ($quizzes as $quiz)
        <div class="card">
            <div class="card-header">
                <h3>
                    <a href="{{ route('quiz.show', ['id' => $quiz->id]) }}">{{ $quiz->name }}</a>
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Number of questions: {{ $quiz->question_count }}
                </p>
                <p>
                    Duration: {{ $quiz->duration }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
