@extends('layouts.navbar')

@section('content_home')
<div class="col-12 p-4">
    <div class="card">
        <div class="card-header">
            <h4>{{ $quiz->name }}</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quiz_questions as $key => $q_question)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $q_question->question->question_content }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Detail</a> |
                            <a href="#" class="btn btn-sm btn-danger" onclick="return alert('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addQuestion">
                Add more question
            </button>
        </div>
    </div>
</div>


@endsection
<!-- Modal -->
<div class="modal fade" id="addQuestion" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
