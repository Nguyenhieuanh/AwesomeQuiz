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

                {{ __('You are logged in!') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white center">
                        <h4 class="card-title"><a href="student-dashboard.html">Quiz player</a></h4>
                    </div>
                    <a href="student-dashboard.html" class="preview">
                        <img src="images/student.png" alt="QuizPlayer App" class="img-fluid">
                    </a>
                    <div class="card-block center">
                        <a href="student-dashboard.html" class="btn btn-primary-outline btn-rounded"><i class="material-icons">person</i> This is for QuizPlayer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white center">
                        <h4 class="card-title"><a href="instructor-dashboard.html">Quiz maker</a></h4>
                    </div>
                    <a href="instructor-dashboard.html"  class="preview">
                        <img src="images/instructor.png" alt="QuizMaker App" class="img-fluid">
                    </a>
                    <div class="card-block center">
                        <a href="instructor-dashboard.html" class="btn btn-primary-outline btn-rounded"><i class="material-icons">school</i> This is for QuizMaker</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- // END Content -->
@endsection
