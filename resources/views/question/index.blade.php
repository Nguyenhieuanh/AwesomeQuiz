@extends('layouts.navbar')

@section('content_home')
<div class="col mt-3 mx-auto">
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route("question.index")}}">Question</a></li>
                </ol>
            </nav>
            <div class="float-left">
                <h3 class="page-title">Question</h3>
            </div>
            <div class="col-8 mb-3 float-right">
                <form action="{{ route('question.search') }}" id="searchForm" method="get">
                    @csrf
                    <div class="row">
                        <select class="custom-select mr-1" id="category-select" name="category_id">
                            <option value="" selected>All Category</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        <select class="custom-select mr-1" id="difficulty-select" name="difficulty">
                            <option value="" selected>All Difficulty</option>
                            <option value="1">Easy</option>
                            <option value="2">Medium</option>
                            <option value="3">Hard</option>
                        </select>
                        <div class="form-group has-search w-75">
                            <span class="fa fa-search form-control-feedback text-success" ></span>
                            <input type="text" id="ajax-search" class="form-control" name="keyword" placeholder="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body p-4">
            @if (Auth::user()->role == 2)
            <div class="float-left">
                <a href="{{ route('question.create') }}" class="btn btn-success">
                    <span><i class="fas fa-plus"></i> Create Question</span>
                </a>
            </div>
            @endif
            <div id="paginate" class="float-right">
                {{$questions->links()}}
            </div>
            <div class="table-responsive">
                <table id="table"
                    class="table table-bordered table-hover {{ count($questions) > 0 ? 'datatable' : '' }}">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">ID</th>
                            <th scope="col">Question Content</th>
                            <th scope="col">Difficulty</th>
                            <th scope="col">Category</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="list-question">
                        @if (count($questions) > 0)
                        @foreach ($questions as $key => $question)
                        <tr class="tbl-row" data-entry-id="{{ $question->id }}">
                            <td scoope="row" class="text text-center">{{ ++$key }}</td>
                            <td class="item">
                                <p data-toggle="collapse" href="#_{{$question->id}}" aria-expanded="false"
                                    title="Click for answers">
                                    {{ $question->question_content }} </p>
                                <div class="collapse" id="_{{$question->id}}">
                                    <div class="card card-body">
                                        @foreach($question->answers as $key => $answer)
                                        <p><strong @switch($answer->correct)
                                                @case(1)
                                                title='Right'>
                                                <span class="badge badge-success">
                                                    @break
                                                    @default
                                                    title='Wrong' >
                                                    <span class="badge badge-danger">
                                                        @endswitch
                                                        Answer #{{$key+1}}</span>
                                            </strong> {{ $answer->answer_content }} </p>
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                            @switch($question->difficulty)
                            @case(1)
                            <td>
                                <h5><span class="badge badge-pill badge-success">Easy</span></h5>
                            </td>
                            @break
                            @case(2)
                            <td>
                                <h5> <span class="badge badge-pill badge-warning">Medium</span></h5>
                            </td>
                            @break
                            @case(3)
                            <td>
                                <h5> <span class="badge badge-pill badge-danger">Hard</span></h5>
                            </td>
                            @break
                            @endswitch
                            <td>
                                {{$question->category->category_name}}
                            </td>
                            <td>
                                {{-- Button Group --}}
                                <a href="{{ route('question.show',[$question->id]) }}" class="btn btn-sm btn-info">
                                    <span><i class="fas fa-info-circle"></i> Detail</span></a>
                                @if (Auth::user()->role == 2)
                                <a href="{{ route('question.edit',[$question->id]) }}" class="btn
                                btn-sm btn-primary"> <span><i class="far fa-edit"></i></span> Edit</a>
                                <button class="btn btn-sm btn-danger"
                                    onclick="confirmDelete('{{ route('question.destroy',[$question->id]) }}','You will delete all answers of this question!')">
                                    <span><i class="fas fa-trash-alt"></i> Delete</span>
                                </button>
                                {{-- Button Group --}}
                            </td>
                            @endif
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
@endsection
