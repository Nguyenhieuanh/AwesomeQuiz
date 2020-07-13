@extends('layouts.navbar')

@section('content_home')
<div class="col mt-3 mx-auto">
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route("quiz.list")}}">Quizzes</a></li>
                    <li class="breadcrumb-item"><a href="#">General Statitics</a></li>
                </ol>
            </nav>
            <div class="float-left">
                <h3 class="page-title">Quizzes</h3>
            </div>
        </div>
        <div class="card-body p-4">
            @if (Auth::user()->role == 2 || Auth::user()->role ==1)
            <div class="float-left">
                <a href="{{ route('quiz.create') }}" class="btn btn-success mb-4">
                    <span><i class="fas fa-plus"></i> Create new Quiz</span></a>
            </div>
            @endif
            <div id="paginate" class="float-right">
                {{-- {{$quizzes->links()}} --}}
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
                    @if (count($quizzes) > 0)
                    <tbody id="list-quizz">
                        @foreach ($quizzes as $key => $quiz)
                        <tr>
                            <td scope="row"> {{$key+1}}</td>
                            <td scope="row"> {{$quiz->name}}</td>
                            <td scope="row">
                                {{$quiz->category->category_name}}
                            </td>
                            <td scope="row">
                                {{$quiz->duration}}
                            </td>
                            <td scope="row">{{ $quiz->question_count }}</td>
                            <td scope="row">
                                <a href="{{ route('quiz.show',[$quiz->id]) }}" class="btn btn-sm btn-info">
                                    <span><i class="fas fa-info-circle"></i> Detail</span></a>
                                @if (Auth::user()->role == 2)
                                <a href="{{ route('quiz.edit',[$quiz->id]) }}" class="btn
                        btn-sm btn-primary"> <span><i class="far fa-edit"></i></span> Edit</a>
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
