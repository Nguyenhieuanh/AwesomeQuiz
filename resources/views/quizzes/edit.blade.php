@extends('layouts.navbar')

@section('content_home')
<div class="col-12 p-4">
    <div class="card">
        <div class="card-header">
            <h4>{{ $quiz->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('quizQuestion.multiDestroy') }}" method="POST">
                @csrf

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 60px">
                                <input type="checkbox" id="checkAll" title="Select all"><br>
                            </th>
                            <th>Question</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quiz_questions as $key => $q_question)
                        <tr>
                            <td>
                                <input type="checkbox" name="question_id[ ]" value="{{ $q_question->id }}">
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#questionDetail">
                                    {{ ++$key.". ". $q_question->question->question_content }}</a>

                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                    data-target="#questionDetail{{ $q_question->id }}">Detail</a> |
                                <a href="{{ route('quizQuestion.destroy', ['id' => $q_question->id]) }}"
                                    class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td colspan="3">
                            <button class="btn btn-sm btn-danger" type="submit"
                                onclick="return confirm('Are you sure to delete?')">Delete selected</button>
                        </td>
                    </tfoot>
                </table>
            </form>

        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addQuestion">
                Add more question
            </button>
        </div>
    </div>
</div>
@endsection

<!-- Modal add more question -->
<div class="modal fade" id="addQuestion" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('quizQuestion.store') }}" method="POST" id="addForm">
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                    @foreach ($questions as $question)
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td class="item">
                                <input type="checkbox" name="question_id[ ]" value="{{ $question->id }}"
                                    aria-label="Checkbox for following text input">
                            </td>
                            <td>
                                <p>
                                    {{ $question->question_content }}
                                </p>
                            </td>
                            <td style="width: 80px"
                                class="{{ $question->difficulty == 1 ? "text-success" : $question->difficulty == 2 ? "text-warning" : "text-danger"}}">
                                {{ $question->difficulty == 1 ? "Easy" : $question->difficulty == 2 ? "Medium" : "Hard"}}
                            </td>
                        </tr>
                    </table>

                    @endforeach
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" onclick="document.getElementById('addForm').submit();">Add</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal question detail -->
@foreach ($quiz_questions as $q_question)
<div class="modal fade" id="questionDetail{{ $q_question->id }}" data-backdrop="static" data-keyboard="false"
    tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>{{ $q_question->question->question_content }}</strong></p>
                @foreach ($q_question->question->answers as $key => $answer)
                {{ ++$key . ') '. $answer->answer_content }}
                <br>
                @endforeach
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endforeach
