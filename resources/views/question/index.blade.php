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
                    <th>Question Content</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                @if (count($questions) > 0)
                @foreach ($questions as $question)
                <tr data-entry-id="{{ $question->id }}">
                    <td></td>
                    <td>{{ $question->id }}</td>
                    <td>{!! $question->question_content !!}</td>
                    <td>
                        {{-- <a href="{{ route('questions.show',[$question->id]) }}"
                            class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                        <a href="{{ route('questions.edit',[$question->id]) }}"
                            class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                        'route' => ['questions.destroy', $question->id])) !!}
                        {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!} --}}
                    </td>
                </tr>
                @endforeach
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