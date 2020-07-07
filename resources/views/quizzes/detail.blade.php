@extends('layouts.navbar')

@section('content_home')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <h4>{{ $quiz->name }}</h4>
        </div>
        <div class="card-body">
            @foreach ($quiz_questions as $key => $q_question)
            <strong>Question {{ ++$key }}.</strong>
            <br>
            {{-- {{ dd($q_question->question->question_content) }} --}}
            {{ $q_question->question->question_content }}
            <br>
            @foreach ($q_question->question->answers as $key => $answer)
            {{ ++$key . ') '. $answer->answer_content }}
            <br>
            @endforeach
            <br>
            @endforeach
        </div>
    </div>
</div>
@endsection
