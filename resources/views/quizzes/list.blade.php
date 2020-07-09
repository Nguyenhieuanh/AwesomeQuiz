@extends('layouts.navbar')

@section('content_home')
<div class="col-12 p-4">
    @if (Auth::user()->role == 1)
    <a href="{{ route('quiz.create') }}" class="btn btn-success mb-4">Create new Quiz</a>
    @endif
    <div class="card-group">
        @foreach ($quizzes as $quiz)
        <div class="col-4">
            <div class="card mb-3">
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
                        Duration:
                        @switch($quiz->duration)
                            @case(2)
                                90 minutes
                                @break
                            @case(3)
                                120 minutes
                                @break
                            @default
                                45 minutes
                        @endswitch
                    </p>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-success">Do Quiz</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $quizzes->links() }}
</div>
@endsection
