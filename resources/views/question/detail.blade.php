@extends('layouts.navbar')

@section('content_home')
    <div class="col-12 p-3">
        <div class="card">
            <div class="card-header">
                <h4>{{$question->question_content}}</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($question->answers as $key => $answer)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $answer->answer_content }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
