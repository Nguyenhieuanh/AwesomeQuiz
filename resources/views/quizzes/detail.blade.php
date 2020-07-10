@extends('layouts.navbar')

@section('content_home')
<div class="p-2 mb-5">
    <div class="card">
        <div class="card-header">
            <h4><strong>{{ $quiz->name }}</strong> - @if (Auth::user()->role == 1 ||Auth::user()->role == 2)
                    <a class="btn-warning btn" href="{{ route('quiz.edit', ['id' => $quiz->id]) }}">Edit</a>
                @endif</h4>
        </div>
        <div class="card-body">
            @if (Auth::user()->role == 0)
            <p>Question count: {{ $quiz->question_count }}</p>
            <p>Duration time: {{ $quiz->duration }} minutes</p>
            <p>Description: {{ $quiz->description }}</p>
            @else
            @foreach ($quiz_questions as $key => $q_question)
            <h4><strong>Question {{ ++$key }}.</strong></h4>
            <br>
            <strong>{{ $q_question->question->question_content }}</strong>
            <br>
            @foreach ($q_question->question->answers as $key => $answer)
            {{ ++$key . ') '. $answer->answer_content }}
            <br>
            @endforeach
            <br>
            @endforeach
            @endif
        </div>
        <div class="card-footer">
            @if (Auth::user()->role == 1 ||Auth::user()->role == 2)
            <a class="btn-warning btn" href="{{ route('quiz.edit', ['id' => $quiz->id]) }}">Edit</a>
            @endif
        </div>
    </div>
</div>
@endsection
