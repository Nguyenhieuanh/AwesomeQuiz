@extends('layouts.navbar')

@section('content_home')
<div class="col mt-3 mx-auto">
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route("quiz.list")}}">Quizzes</a></li>
                </ol>
            </nav>
            <div class="float-left">
                <h3 class="page-title">Quizzes</h3>
            </div>
            {{-- <div class="col-8 mb-3 float-right">
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
                    <span class="fa fa-search form-control-feedback text-success"></span>
                    <input type="text" id="ajax-search" class="form-control" name="keyword" placeholder="Search">
                </div>
            </div>
            </form>
        </div> --}}
    </div>
    <div class="card-body p-4">
        @if (Auth::user()->role == 2 || Auth::user()->role ==1)
        <div class="float-left">
            <a href="{{ route('quiz.create') }}" class="btn btn-success mb-4">
                <span><i class="fas fa-plus"></i> Create new Quiz</span></a>
        </div>
        @endif
        <div id="paginate" class="float-right">
            {{$quizzes->links()}}
        </div>
        <div class="table-responsive">
            <table id="table" class="table table-bordered table-hover {{ count($quizzes) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">ID</th>
                        <th scope="col">Qizz name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Number of Questions</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="list-quizz">
                    @if (count($quizzes) > 0)
                    @foreach ($quizzes as $key => $quiz)
                    <td scope="row"> {{$key+1}}</td>
                    <td scope="row"> {{$quiz->name}}</td>
                    <td scope="row">
                        {{dd($quiz->category)}}
                    </td>
                    <td scope="row">Duration</td>
                    <td scope="row">{{ $quiz->quizz_count }}</td>
                    <td scope="row"></td>
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
{{-- Old --}}
{{-- <div class="col-12 p-4">
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
                    <a class="btn-warning btn" href="{{ route('quiz.edit', ['id' => $quiz->id]) }}">Edit</a>
                    @endif
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Number of quizzes: {{ $quiz->quizz_count }}
                </p>
                <p>
                    Duration: {{ $quiz->duration }} minutes
                </p>
                <p>
                    @foreach ($quiz->quizquizzes as $q_quizz)
                    {{ ($q_quizz->question->difficulty == 1) }}
                    @endforeach
                </p>
                <a class="btn btn-info" href="{{route('quiz.statistics',['id'=>$quiz->id])}}">Show
                    statistics</a>
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
</div> --}}
@endsection
