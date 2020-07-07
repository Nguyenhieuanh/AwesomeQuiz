@extends('layouts.navbar')

@section('content_home')
<div class="col-12 p-4">
    <div class="card">
        <div class="card-header">
            <h4>{{ $quiz->name }}</h4>
            {{ dd($quiz) }}
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Question</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
