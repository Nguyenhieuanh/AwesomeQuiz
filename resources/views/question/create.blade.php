@extends('layouts.navbar')

@section('content_home')
<div class="col-8 mt-3 mx-auto">
    <div class="card">
        <div class="card-header">
            <h3>Create New Question</h3>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{route('question.store')}}" id="myForm">
                @csrf
                <div class="form-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="question_content"> <strong> Question Content
                            </strong>
                        </label>
                        <textarea class="form-control @error('question_content') is-invalid @enderror"
                            id="question_content" name="question_content" rows="1" autofocus></textarea>
                        <div class="invalid-feedback">The question content field is required.
                        </div>
                        @error('question_content')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{-- Start of Select difficulty group --}}
                        <div class="form-group">
                            <div class="mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="difficulty-select"> <strong> Difficulty
                                            </strong>
                                        </label>
                                    </div>
                                    <select class="custom-select" id="difficulty-select" name="difficulty" required>
                                        <option value="1">Easy</option>
                                        <option value="2">Medium</option>
                                        <option value="3">Hard</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- End of Select difficulty group --}}

                    </div>
                    <div class="col">
                        {{-- Start of Select Category group --}}
                        <div class="form-group">
                            <div class="mb-3">
                                <div class="input-group is-invalid">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="category-select"> <strong> Category
                                            </strong>
                                        </label>
                                    </div>
                                    <select class="custom-select" id="category-select" name="category" required>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- End of Select Category group --}}
                    </div>
                </div>
                <div id="dynamic-field">
                    <div class="form-group">
                        <strong>Answer option #1</strong>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="basic-addon1">
                                    <input type="hidden" name="corrects[]" class="deactivate" value="0" disabled>
                                    <input class="inp-cbx checkboxes" id="cbx" data-id="1" type="checkbox"
                                        name="corrects[]" style="display: none" value="1" checked>
                                    <label class="cbx" for="cbx">
                                        <span title="Correct answer">
                                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <textarea class="form-control answers" name="answer_content[]" rows="1"></textarea>
                            <div class="input-group-append">
                                <span role="button" class="input-group-text remove" title="Delete">
                                    <i class="far fa-trash-alt"></i></span>
                            </div>
                            <div class="invalid-feedback">The answer option field is required.</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <strong>Answer option #2</strong>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="basic-addon1">
                                    <input type="hidden" name="corrects[]" class="deactivate" value="0">
                                    <input class="inp-cbx checkboxes" id="cbx1" data-id="1" type="checkbox"
                                        name="corrects[]" style="display: none" value="1">
                                    <label class="cbx" for="cbx1">
                                        <span class="bg-light" title="Correct answer">
                                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <textarea class="form-control answers" name="answer_content[]" rows="1"></textarea>
                            <div class="input-group-append">
                                <span role="button" class="input-group-text remove" title="Delete">
                                    <i class="far fa-trash-alt"></i></span>
                            </div>
                            <div class="invalid-feedback">The answer option field is required.</div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            {{-- pending clear, back button action --}}
            {{-- <button type="reset" class="btn btn-warning">Clear</button> --}}
            <div class="row">
                <button class="btn btn-primary ml-3" type="button" id="add-answer">Add answer</button>
                <div class="mr-1 ml-auto">
                    <button type="button" id="btn-submit" class="btn btn-success">
                        <span> <i class="fas fa-save"></i> Save </span>
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">
                        <span> <i class="fas fa-arrow-left"></i> Back</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
