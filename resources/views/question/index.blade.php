@extends('layouts.navbar')

@section('content_home')
<h3 class="page-title">Question Manager</h3>

<p>
    <a href="{{ route('question.create') }}" class="btn btn-success">New Question</a>
</p>

<div class="panel panel-default">

    <div class="panel-body">
        <table
            class="table table-bordered table-striped table-hover {{ count($questions) > 0 ? 'datatable' : '' }} dt-select">
            <thead>
                <tr class="table-primary">
                    <th>ID</th>
                    <th>Question Content (Click for answers)</th>
                    <th>Question Difficulty</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @if (count($questions) > 0)
                @foreach ($questions as $question)
                <tr data-entry-id="{{ $question->id }}">
                    <td>{{ $question->id }}</td>
                    <td><a href="{{route('question.show',$question->id)}}">{!! $question->question_content !!}</a></td>
                    @switch($question->difficulty)
                    @case(1)
                    <td>
                        <p class="text-success">Easy</p>
                    </td>
                    @break
                    @case(2)
                    <td>
                        <p class="text-warning">Medium</p>
                    </td>
                    @break
                    @case(3)
                    <td>
                        <p class="text-danger">Hard</p>
                    </td>
                    @break
                    @endswitch

                    <td>
                        <a href="{{ route('question.show',[$question->id]) }}" class="btn btn-xs btn-primary">Detail</a>
                        <button class="btn btn-sm btn-danger"
                            onclick="confirmDelete('{{ route('question.destroy',[$question->id]) }}')">
                            <span><i class="fas fa-trash-alt"></i> Delete</span>
                        </button>
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
