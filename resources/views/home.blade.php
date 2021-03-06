@extends('layouts.navbar')

@section('content_home')
    <!-- Content -->
    <div class="container">
        <div class="p-t-2 p-b-2 center">
            <p class="lead">AwesomeQuiz is a beautifully crafted Quiz application.</p>
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
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (Auth::user()->role == 0) {{__('You are logged in as QuizPlayer!')}} @elseif (Auth::user()->role == 1) {{__('You are logged in as QuizMaker!')}} @elseif (Auth::user()->role == 2)<h1> {{__("You're God - Be responsible!")}}</h1> @else {{__("You're not logged in yet, please consider Login or Register")}} @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white center">
                        <h4 class="card-title"><a>Quiz player</a></h4>
                    </div>
                    <a class="preview" style="margin: auto;">
                        <img src="{{asset('storage/images/player.jpg')}}" style="width: 300px" alt="QuizPlayer App"
                             class="img-fluid">
                    </a>
                    <div class="card-block center">
                        <a href="" class="btn btn-primary-outline btn-rounded"><i class="material-icons">person</i> Run through our list of Quiz and challenge yourself!</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white center">
                        <h4 class="card-title"><a>Quiz manager</a></h4>
                    </div>
                    <a class="preview" style="margin: auto;">
                        <img src="{{asset('storage/images/maker.jpg')}}" style="width: 300px" alt="QuizMaker App"
                             class="img-fluid">
                    </a>
                    <div class="card-block center">
                        <a href="" class="btn btn-primary-outline btn-rounded"><i class="material-icons">school</i> Be a
                            QuizManager!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header"><h3>{{ __('Recent QuizPlayer') }}</h3></div>
            @foreach ($userController as $user)
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('user.list', ['id' => $user->id]) }}">{{ $user->name }}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card">
            <div class="card-header"><h3>{{ __('Recent added Quizs') }}</h3></div>

            @foreach ($quizzes as $quiz)
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <a href="{{ route('quiz.show', ['id' => $quiz->id]) }}">{{ $quiz->name }}</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <p>
                            Number of questions: {{ $quiz->question_count }}
                        </p>
                        <p>
                            Duration:
                            @switch($quiz->duration)
                                @case(15) 15 minutes @break
                                @case(30) 30 minutes @break
                                @case(45) 45 minutes @break
                                @case(90) 90 minutes @break
                                @case(120) 120 minutes @break
                            @endswitch
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card">
            <div class="card-header"><h3>{{ __('Recent added Questions') }}</h3></div>

            @foreach ($questions as $question)
                <div class="card">
                    <div class="card-header">

                        <a href="{{ route('question.show', ['id' => $question->id]) }}">{{ $question->question_content }}</a>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="card">
            <div class="card-header"><h3>{{ __('Recent added Category') }}</h3></div>

            <table class="table table-bordered table-striped {{ count($categories) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                <tr>
                    <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>
                    <th>Category Title</th>
                    <th>Actions&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @if (count($categories) > 0)
                    {{$categories->links()}}
                    @foreach ($categories as $category)
                        <tr data-entry-id="{{ $category->id }}">
                            <td></td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                <a href="{{ route('categories.show',[$category->id]) }}" class="btn btn-xs btn-primary">Detail</a>
                                @if (Auth::user()->role == 1)
                                    <a href="{{ route('categories.edit',[$category->id]) }}"
                                       class="btn btn-xs btn-info">Edit</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Are you sure?');",
                                        'route' => ['categories.destroy', $category->id])) !!}
                                    {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                @endif
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td colspan="3">Nothing to show here</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- // END Content -->
@endsection
