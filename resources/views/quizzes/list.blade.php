@extends('layouts.navbar')

@section('content_home')
    <div class="col-12 p-4">
        @if (Auth::user()->role == 2 || Auth::user()->role ==1)
            <a href="{{ route('quiz.create') }}" class="btn btn-success mb-4">Create new Quiz</a>
        @endif
        <div class="card-group">
            @foreach ($quizzes as $quiz)
                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>
                                <a href="{{ route('quiz.show', ['id' => $quiz->id]) }}">{{ $quiz->name }}</a>
                                - @if (Auth::user()->role == 1 ||Auth::user()->role == 2)
                                    <a class="btn-warning btn"
                                       href="{{ route('quiz.edit', ['id' => $quiz->id]) }}">Edit</a>
                                @endif
                            </h3>
                        </div>
                        <div class="card-body">
                            <p>
                                Number of questions: {{ $quiz->question_count }}
                            </p>
                            <p>
                                Duration: {{ $quiz->duration }} minutes
                            </p>
                            <p>
                            @php
                                $easy=0;
                                $medium=0;
                                $hard=0;
                            @endphp
                            @foreach ($quiz->quizQuestions as $key =>$q_question)
                                @if($q_question->question->difficulty ==1)@php $easy++; @endphp
                                @elseif($q_question->question->difficulty ==2) @php $medium++; @endphp
                                @elseif($q_question->question->difficulty ==3) @php $hard++; @endphp
                                @endif
                            @endforeach
                            <p>Easy questions: {{$easy}}</p>
                            <p>Medium questions: {{$medium}}</p>
                            <p>Hard questions:{{$hard}}</p>
                            {{-- <a class="btn btn-info" href="{{route('quiz.statistics',['id'=>$quiz->id])}}">Show
                                statistics</a> --}}
                        </div>
                        <div class="card-footer">
                            @if (Auth::user()->role == 0)
                                <a href="{{ route('quiz.doQuiz', ['id' => $quiz->id]) }}" class="btn btn-success">Do
                                    Quiz</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $quizzes->links() }}
    </div>
@endsection
