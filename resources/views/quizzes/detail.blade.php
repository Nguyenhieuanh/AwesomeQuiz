@extends('layouts.navbar')

@section('content_home')
<div class="p-2 mb-5">
    <div class="card">
        <div class="card-header">
            <h4>{{ $quiz->name }}</h4>
        </div>
        <div class="card-body">
            @foreach ($quiz_questions as $key => $q_question)
            <strong>Question {{ ++$key }}.</strong>
            <br>
            {{ $q_question->question->question_content }}
            <br>
            @foreach ($q_question->question->answers as $key => $answer)
            {{ ++$key . ') '. $answer->answer_content }}
            <br>
            @endforeach
            <br>
            @endforeach
        </div>
        <div class="card-footer">
            <a class="btn-warning btn" href="{{ route('quiz.edit', ['id' => $quiz->id]) }}">Edit</a>
        </div>
    </div>
</div>
@endsection
