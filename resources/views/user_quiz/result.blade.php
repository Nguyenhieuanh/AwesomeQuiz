@extends('layouts.navbar')

@section('content_home')
{{-- <p>You right: {{ $point.'/'.$questions_count }}</p>
<p>Your point: {{ $point/$questions_count * 100 }} point</p> --}}

<div class="p-4 col-11 mx-auto">
    <div class="card">
        <div class="card-header">
            <h3>{{ $userQuiz->quiz->name }}</h3>
            <p>{{ $userQuiz->quiz->created_at }}</p>
        </div>
        <div class="card-body p-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Answer</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    ($i=0)
                    @endphp
                    @php
                    ($checkCorrect=false)
                    @endphp
                    @foreach ($questions as $question)
                    @php
                    ($first = true)
                    @endphp
                    @foreach ($question as $item)
                    <tr>
                        @if ($first == true)
                        <td rowspan="{{ $question->count() }}">{{ ++$i }}</td>
                        <td rowspan="{{ $question->count() }}">
                            @if ($item->correct != $item->answered)
                            123
                            @endif
                        </td>
                        @php
                        ($first = false)
                        @endphp
                        @endif
                        <td
                            class="@if ($item->answered==$item->correct && $item->correct == 1) alert alert-success @endif">
                            {{ $item->answer->answer_content }}
                            @if ($item->correct == 1)
                            <b><i>(correct answer)</i></b>
                            @endif
                            @if ($item->answered == 1)
                            <span><i>(your answer)</i></span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
