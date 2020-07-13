@extends('layouts.navbar')

@section('content_home')
<div class="col-8 mt-3 mx-auto">
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route("question.index")}}">Question</a></li>
                    <li class="breadcrumb-item"><a href="{{route("question.edit",['id'=> $question->id])}}">Edit</a>
                </ol>
            </nav>
            <h3>Edit Question</h3>
        </div>
        <div class="card-body p-4">
            <div class="card-body p-4">
                <form method="POST" action="{{route('question.update',$question->id)}}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="question_content"> <strong> Question Content
                                    </strong>
                                </label>
                            </div>
                            <textarea class="form-control @error('question_content') is-invalid @enderror"
                                id="question_content" name="question_content">{{$question->question_content}}</textarea>
                            @error('question_content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
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
                                        <select class="form-control" id="difficulty" name="difficulty">
                                            <option value="1" {{($question->difficulty == 1) ? 'selected' : ''}}>Easy
                                            </option>
                                            <option value="2" {{($question->difficulty == 2) ? 'selected' : ''}}>Medium
                                            </option>
                                            <option value="3" {{($question->difficulty == 3) ? 'selected' : ''}}>Hard
                                            </option>
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
                                            <option value="{{$category->id}}"
                                                {{($category->id == $question->category->id) ? 'selected' : ''}}>
                                                {{$category->category_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- End of Select Category group --}}
                        </div>
                    </div>

                    <div id="dynamic-field">
                        @foreach ($answers as $key => $answer)
                        {{-- Start of Answer group  --}}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="basic-addon1">
                                        <input type="hidden" name="corrects[]" class="deactivate" value="0"
                                            @if($answer->correct == 1) disabled @endif>
                                        <input class="inp-cbx checkboxes" id="cbx{{ $key+1 }}" data-id="1"
                                            type="checkbox" name="corrects[]" style="display: none" value="1"
                                            @if($answer->correct == 1)
                                        checked @endif>
                                        <label class="cbx" for="cbx{{ $key+1 }}">
                                            <span class="@if($answer->correct == 0)
                                                bg-light @endif" title="Correct answer">
                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                </svg>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="input-group-prepend">
                                    <label class="input-group-text"> <strong> Answer
                                            Option #{{ ++$key }}
                                        </strong>
                                    </label>
                                </div>
                                <textarea class="form-control answers" name="answer_content[]" rows="1">
                                    {{ $answer->answer_content }}
                                </textarea>
                                <div class="input-group-append">
                                    <span role="button" class="input-group-text remove" title="Delete">
                                        <i class="far fa-trash-alt"></i></span>
                                </div>
                                <div class="invalid-feedback">The answer option field is required.</div>
                            </div>
                        </div>
                        {{-- End of Answer group  --}}
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
        <div class="card-footer pl-4 pr-4">
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
