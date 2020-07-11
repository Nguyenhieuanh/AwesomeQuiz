@extends('layouts.navbar')

@section('content_home')
<div class="card">
    <div class="card-header">
        <h3>{{ $userQuiz->quiz->name }}</h3>
        <p>Score: {{ $point/$questions_count * 100 }}</p>
        <p>Correct: {{ $point .'/'. $questions_count }}</p>
    </div>
    <div class="card-body">
        @php
        ($i = 1)
        @endphp
        @foreach ($questions as $question)
        <table class="table table-bordered">
            <thead class="bg-info text-white">
                <tr>
                    <th class="align-text-top text-center" style="width: 80px">Q{{ $i++ }}</th>
                    <th class="align-baseline">{{ $question->first()->question->question_content }}</th>
                    <th class="align-text-top text-center" style="width: 105px">Correct answer</th>
                    <th class="align-text-top text-center" style="width: 90px">Your answer</th>
                </tr>
            </thead>
            <tbody>
                @php
                ($first = true)
                @endphp
                @foreach ($question as $item)
                <tr>
                    @if ($first == true)
                    <td rowspan="{{ $item->answer->count() }}" class="align-middle">Answer</td>
                    @php
                    ($first = false)
                    @endphp
                    @endif
                    <td class="
                    @if ($item->answered == $item->correct && $item->answered == 1)
                    alert alert-success
                    @elseif(($item->answered == 1 && $item->answered != $item->correct) || ($item->correct == 1 && $item->answered != $item->correct))
                    alert alert-danger
                    @endif
                    ">
                        {{ $item->answer->answer_content }}
                    </td>
                    <td class="text-center
                    @if ($item->answered == $item->correct && $item->answered == 1)
                    alert alert-success
                    @elseif(($item->answered == 1 && $item->answered != $item->correct) || ($item->correct == 1 && $item->answered != $item->correct))
                    alert alert-danger
                    @endif
                    ">
                        {{ $item->correct == 1 ? "X" : "" }}
                    </td>
                    <td class="text-center
                    @if ($item->answered == $item->correct && $item->answered == 1)
                    alert alert-success
                    @elseif(($item->answered == 1 && $item->answered != $item->correct) || ($item->correct == 1 && $item->answered != $item->correct))
                    alert alert-danger
                    @endif
                    ">
                        {{ $item->answered == 1 ? "X" : "" }}
                    </td>
                </tr>

                @endforeach
            </tbody>
            <tfoot>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tfoot>
        </table>
        @endforeach
    </div>
    <div class="card-footer">
    </div>
</div>
@endsection
