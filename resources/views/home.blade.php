@extends('layouts.navbar')

@section('content_home')
    <!-- Content -->
    <div class="container">
        <div class="p-t-2 p-b-2 center">
            <p class="lead">AwesomeQuiz is a beautifully crafted Quiz application.
        </div>
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in as ') }}@if (Auth::user()->role == 0) {{__('QuizPlayer!')}} @else {{__('QuizMaker!')}} @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white center">
                        <h4 class="card-title"><a href="">Quiz player</a></h4>
                    </div>
                    <a href="" class="preview">
                        <img src="images/student.png" alt="QuizPlayer App" class="img-fluid">
                    </a>
                    <div class="card-block center">
                        <a href="" class="btn btn-primary-outline btn-rounded"><i class="material-icons">person</i> This is for QuizPlayer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white center">
                        <h4 class="card-title"><a href="">Quiz maker</a></h4>
                    </div>
                    <a href=""  class="preview">
                        <img src="images/instructor.png" alt="QuizMaker App" class="img-fluid">
                    </a>
                    <div class="card-block center">
                        <a href="" class="btn btn-primary-outline btn-rounded"><i class="material-icons">school</i> This is for QuizMaker</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">{{ __('Recent added Quizs') }}</div>

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
                            Duration: {{ $quiz->duration }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card">
            <div class="card-header">{{ __('Recent added Category') }}</div>

            @if (count($categories) > 0)
                {{$categories->links()}}
                @foreach ($categories as $category)
                    <tr data-entry-id="{{ $category->id }}">
                        <td></td>
                        <td>{{ $category->category_name }}</td>
                        @if (Auth::user()->role == 1)
                        <td>
                            <a href="{{ route('categories.show',[$category->id]) }}" class="btn btn-xs btn-primary">Detail</a>
                            <a href="{{ route('categories.edit',[$category->id]) }}" class="btn btn-xs btn-info">Edit</a>
                            {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return confirm('Are you sure?');",
                                'route' => ['categories.destroy', $category->id])) !!}
                            {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                            {!! Form::close() !!}
                        </td>
                            @endif
                    </tr>
                @endforeach

            @else
                <tr>
                    <td colspan="3">Nothing to show here</td>
                </tr>
            @endif
        </div>
    </div>

    <!-- // END Content -->
@endsection
