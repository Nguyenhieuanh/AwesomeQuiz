@extends('layouts.navbar')

@section('content_home')
    <div class="card">
        <div class="card-header">
            <h4>{{ $quiz->name }}</h4>
        </div>
        <div class="card-body">
            {{ dd($quiz_questions) }}
            @foreach ($quiz_questions as $key => $q_question)
                <strong>Question {{ ++$key }}.</strong>
                <br>
                {{-- {{ dd($q_question->question()) }} --}}
                {{ $q_question->question() }}
                <br>
            @endforeach
        </div>
    </div>
@endsection
