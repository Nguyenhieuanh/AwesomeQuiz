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
                {{-- {{$quizResults->links()}} --}}
            </div>
            <div class="table-responsive">
                <table id="table"
                    class="table table-bordered table-hover {{ count($quizResults) > 0 ? 'datatable' : '' }}">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">ID</th>
                            <th scope="col">User name</th>
                            <th scope="col">Test day</th>
                            <th scope="col">Point</th>
                            <th scope="col">Number of corrects</th>
                            <th scope="col">Result</th>
                        </tr>
                    </thead>
                    @if (count($quizResults) > 0)
                    <tbody>
                        @foreach ($quizResults as $key => $quizResult)
                        <tr>
                            <td scope="row"> {{$key+1}}</td>
                            <td scope="row"> {{$quizResult->user->name}}</td>
                            <td scope="row">
                                {{date("d-m-Y H:i",strtotime($quizResult->start_time))}}
                            </td>
                            <td scope="row">
                                {{$quizResult->point}}
                            </td>
                            <td scope="row">
                                {{$quizResult->ratio}}
                            </td>
                            <td scope="row">
                                @if ($quizResult->point < 50) <span class="badge badge-danger">Fail</span>
                                    @else
                                    <span class="badge badge-success">Pass</span>
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
@endsection
