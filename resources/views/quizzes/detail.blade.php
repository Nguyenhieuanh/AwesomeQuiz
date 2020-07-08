@extends('layouts.navbar')

@section('content_home')
<div class="p-2 mb-5">
    <div class="card">
        <div class="card-header">
            <h4><strong>{{ $quiz->name }}</strong></h4>
        </div>
        <div class="card-body">
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
        </div>
        <div class="card-footer">
            @if (Auth::user()->role == 1)
            <a class="btn-warning btn" href="{{ route('quiz.edit', ['id' => $quiz->id]) }}">Edit</a>
            @endif
        </div>
    </div>
</div>
@endsection
