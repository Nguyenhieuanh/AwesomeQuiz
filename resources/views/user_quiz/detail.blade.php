@extends('layouts.navbar')

@section('content_home')
<div class="p-2 mb-5">
    <div class="card">
        <div class="card-header">
            <h4><strong>{{ $quiz->name }}</strong></h4>
        </div>
        <div class="card-body">
            <form action="{{ route('quiz.submit') }}" method="POST" id="doQuiz">
                @csrf
                @foreach ($quizQuestions as $key => $q_question)
                <?php $i=$loop->index; ?>
                <h4><strong>Question {{ ++$key }}.</strong></h4>
                <br>
                <strong>{{ $q_question->question->question_content }}</strong>
                <br>
                @foreach ($q_question->question->answers as $answer)
                <input type="hidden" name="quiz_id[]" value="{{ $quiz->id }}">
                <input type="hidden" name="question_id[]" value="{{ $q_question->question->id }}">
                <input type="hidden" name="answer_id[]" value="{{ $answer->id }}">
                <input type="hidden" name="correct[]" value="{{ $answer->correct }}">
                <label>
                    <input type="checkbox" class="checkboxes" name="answered[]" value="1" id="">
                    {{ $answer->answer_content }}
                    <input type="hidden" class="deactive" name="answered[]" value="0" id="">
                </label>
                <br>
                @endforeach
                <br>
                @endforeach
            </form>
        </div>
        <div class="card-footer">
            @if (Auth::user()->role == 1)
            <a class="btn-warning btn" href="{{ route('quiz.edit', ['id' => $quiz->id]) }}">Edit</a>
            @else
            <button class="btn btn-primary" onclick="event.preventDefault();
            document.getElementById('doQuiz').submit();">Submit</button>
            @endif
        </div>
    </div>
</div>
@endsection
