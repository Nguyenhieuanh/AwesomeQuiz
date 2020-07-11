@extends('layouts.navbar')

@section('content_home')
<div class="col mt-3 mx-auto">
    <div class="card">
        <div class="card-header">
            <h3 class="page-title">Question</h3>
        </div>
        <div class="card-body p-4">
            @if (Auth::user()->role == 2)
            <div class="float-left">
                <a href="{{ route('question.create') }}" class="btn btn-success">
                    <span><i class="fas fa-plus"></i> Create Question</span>
                </a>
            </div>
            @endif
            <div class="float-right">
                {{$questions->links()}}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover {{ count($questions) > 0 ? 'datatable' : '' }}">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">ID</th>
                            <th scope="col">Question Content (Click for answers)</th>
                            <th scope="col">Difficulty</th>
                            <th scope="col">Category</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($questions) > 0)
                        @foreach ($questions as $question)
                        <tr data-entry-id="{{ $question->id }}">
                            <td scoope="row" class="text text-center">{{ $question->id }}</td>
                            <td>
                                <p data-toggle="collapse" href="#_{{$question->id}}" aria-expanded="false">
                                    {{ $question->question_content }} </p>
                                <div class="collapse" id="_{{$question->id}}">
                                    <div class="card card-body">
                                        @foreach($question->answers as $key => $answer)
                                        <p @if ($answer->correct == 1)
                                            class="table-success" title='Right'
                                            @else
                                            class="table-light" title='Wrong'
                                            @endif> Answer# {{$key+1}}: {{ $answer->answer_content }} </p>
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                            @switch($question->difficulty)
                            @case(1)
                            <td>
                                <h3 class="badge badge-success">Easy</h3>
                            </td>
                            @break
                            @case(2)
                            <td>
                                <h3 class="badge badge-warning">Medium</h3>
                            </td>
                            @break
                            @case(3)
                            <td>
                                <h3 class="badge badge-danger">Hard</h3>
                            </td>
                            @break
                            @endswitch
                            <td>
                                {{$question->category->category_name}}
                            </td>
                            <td>
                                {{-- <a href="{{ route('question.show',[$question->id]) }}" class="btn btn-sm btn-info">
                                <span><i class="fas fa-info-circle"></i> Detail</span></a> --}}
                                {{--                        <a href="{{ route('question.edit',[$question->id]) }}"
                                class="btn
                                btn-sm btn-primary">--}}
                                {{--                            <span><i class="far fa-edit"></i></span> Edit</a>--}}
                                <a href="{{ route('question.show',[$question->id]) }}"
                                    class="btn btn-xs btn-primary">Detail</a>
                                @if (Auth::user()->role == 2)
                                <a href="{{ route('question.edit',[$question->id]) }}"
                                    class="btn btn-xs btn-info">Edit</a>
                                <button class="btn btn-sm btn-danger"
                                    onclick="confirmDelete('{{ route('question.destroy',[$question->id]) }}','You will delete all answers of this question!')">
                                    <span><i class="fas fa-trash-alt"></i> Delete</span>
                                </button>
                                @endif
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
    </div>
</div>

<div class="panel panel-default">

</div>
@endsection
