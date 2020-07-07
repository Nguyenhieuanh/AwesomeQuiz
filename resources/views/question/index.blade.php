@extends('layouts.navbar')

@section('content_home')
<h3 class="page-title">Question Manager</h3>

<p>
    <a href="{{ route('question.create') }}" class="btn btn-success">New Question</a>
</p>

<div class="panel panel-default">

    <div class="panel-body">

        <table class="table table-bordered table-striped {{ count($questions) > 0 ? 'datatable' : '' }} dt-select">
            <thead>
                <tr>
                    <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                    <th>Question ID</th>
                    <th>Question Content (Click for answers)</th>
                    <th>Question Difficulty</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @if (count($questions) > 0)
                @foreach ($questions as $question)
                <tr data-entry-id="{{ $question->id }}">
                    <td></td>
                    <td>{{ $question->id }}</td>
                    <td><a href="{{route('question.show',$question->id)}}">{!! $question->question_content !!}</a></td>
                    <td>@if ($question->difficulty == 1)<p style="color: #37c23e">Easy</p>
                    @elseif ($question->difficulty == 2)<p style="color: #ff9700">Medium</p>
                    @else <p style="color: #890505">Hard</p>
                    @endif</td>
                    <td>
                        <a href="{{ route('question.show',[$question->id]) }}"
                            class="btn btn-xs btn-primary">Detail</a>
                        {{-- <a href="{{ route('question.edit',[$question->id]) }}"
                            class="btn btn-xs btn-info">Edit</a>
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                        'route' => ['question.destroy', $question->id])) !!}
                        {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!} --}}
                    </td>
                </tr>
                @endforeach
                {{$questions->links()}}
                @else
                <tr>
                    <td colspan="7">'no_entries_in_table'</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
