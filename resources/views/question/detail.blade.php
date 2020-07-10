@extends('layouts.navbar')

@section('content_home')
<div class="col-12 p-3">
    <div class="card">
        <div class="card-header">
            <h4>Question details</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Question #{{$question->id}} content:</h5>
            <p class="card-text">{{$question->question_content}}</p>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">#</th>
                        <th scope="col">Answer</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($question->answers as $key => $answer)
                    <tr @if ($answer->correct == 1)
                        class="table-success"
                        @endif>
                        <td scope="row">{{ ++$key }}</td>

                        <td>{{ $answer->answer_content }}</td>
                        <td> @if (Auth::user()->role == 2)
                            <button class="btn btn-sm btn-danger"
                                onclick="confirmDelete('{{ route('answer.destroy',[$answer->id]) }}')">
                                <span><i class="fas fa-trash-alt"></i> Delete</span>
                            </button>@endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
