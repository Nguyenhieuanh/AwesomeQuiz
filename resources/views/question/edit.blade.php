@extends('layouts.navbar')

@section('content_home')
<div class="col-8 mt-3 mx-auto">
    <div class="card">
        <div class="card-header">
            <h3>Edit Question</h3>
        </div>
        <div class="card-body p-4">
            <div class="card-body p-4">
                <form method="POST" action="{{route('question.update',$question->id)}}">
                    @csrf
                    <div class="form-group">
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
                                            <option value="{{$category->id}}" {{($category->id == $question->category->id) ? 'selected' : ''}}>{{$category->category_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- End of Select Category group --}}
                        </div>
                    </div>
                    {{-- Start of Answer group  --}}
                    <div class="form-group">
                        <div class="col">
                            <div class="row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="correct_select_1"> <strong> Answer Option 1
                                            </strong>
                                        </label>
                                    </div>
                                    <select class="custom-select" id="correct_select_1" name="correct_option[]"
                                        required>
                                        <option class="text-danger" value="0">Wrong</option>
                                        <option class="text-success" value="1" selected>Right</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <textarea class="form-control @error('answer_content[]') is-invalid @enderror"
                            id="answer_content_1" name="answer_content[]" rows="2" required></textarea>
                        @error('answer_content[]')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- End of Answer group  --}}
                    {{-- Start of Answer group  --}}
                    <div class="form-group">
                        <div class="col">
                            <div class="row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="correct_select_2"> <strong> Answer Option 2
                                            </strong>
                                        </label>
                                    </div>
                                    <select class="custom-select" id="correct_select_2" name="correct_option[]"
                                        required>
                                        <option class="text-danger" value="0">Wrong</option>
                                        <option class="text-success" value="1">Right</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <textarea class="form-control @error('answer_content[]') is-invalid @enderror"
                            id="answer_content_2" name="answer_content[]" rows="2" required></textarea>
                        @error('answer_content[]')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- End of Answer group  --}}
                    {{-- Start of Answer group  --}}
                    <div class="form-group">
                        <div class="col">
                            <div class="row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="correct_select_3"> <strong> Answer Option 3
                                            </strong>
                                        </label>
                                    </div>
                                    <select class="custom-select" id="correct_select_3" name="correct_option[]"
                                        required>
                                        <option class="text-danger" value="0">Wrong</option>
                                        <option class="text-success" value="1">Right</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <textarea class="form-control @error('answer_content[]') is-invalid @enderror"
                            id="answer_content_3" name="answer_content[]" rows="2"></textarea>
                        @error('answer_content[]')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- End of Answer group  --}}
                    {{-- Start of Answer group  --}}
                    <div class="form-group">
                        <div class="col">
                            <div class="row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="correct_select_4"> <strong> Answer Option 4
                                            </strong>
                                        </label>
                                    </div>
                                    <select class="custom-select" id="correct_select_4" name="correct_option[]"
                                        required>
                                        <option class="text-danger" value="0">Wrong</option>
                                        <option class="text-success" value="1">Right</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <textarea class="form-control @error('answer_content[]') is-invalid @enderror"
                            id="answer_content_4" name="answer_content[]" rows="2"></textarea>
                        @error('answer_content[]')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- End of Answer group  --}}


                    <div class="col-5">
                        <button type="submit" class="btn btn-success">
                            <span> <i class="fas fa-save"></i> Save </span>
                        </button>
                        {{-- pending clear, back button action --}}
                        {{-- <button type="reset" class="btn btn-warning">Clear</button> --}}
                        <button type="button" class="btn btn-dark" onclick="window.history.back()">
                            <span> <i class="fas fa-arrow-left"></i> Back</span>
                        </button>
                    </div>
                </form>
            </div>

            <form method="POST" action="{{route('question.update',$question->id)}}">
                @csrf
                <div class="form-group">
                    <label for="question_content">Question</label>
                    <textarea class="form-control @error('question_content') is-invalid @enderror" id="question_content"
                        name="question_content" rows="5">{{$question->question_content}}</textarea>
                    @error('question_content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="difficulty">Difficulty</label>
                    <select class="form-control" id="difficulty" name="difficulty">
                        <option value="{{$question->difficulty}}">
                            @switch($question->difficulty)
                            @case(1)
                            <td>
                                <p class="text-success">Easy</p>
                            </td>
                            @break
                            @case(2)
                            <td>
                                <p class="text-warning">Medium</p>
                            </td>
                            @break
                            @case(3)
                            <td>
                                <p class="text-danger">Hard</p>
                            </td>
                            @break
                            @endswitch</option>
                        <option value="1">Easy</option>
                        <option value="2">Medium</option>
                        <option value="3">Hard</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category">
                        <option value="{{$question->category_id}}">{{$question->category->category_name}}</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <div class="col-2">
                        <label for="answer_option_1">Answer Option 1</label>
                    </div>
                    @foreach($answers as $key => $answer)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <select name="correct_option[]">
                                    <option value="1" {{ $answer->correct == 1 ? 'selected' : '' }}>Right</option>
                                    <option value="0" {{ $answer->correct == 0 ? 'selected' : ''}}>Wrong</option>
                                </select>

                            </div>
                        </div>
                        <textarea class="form-control @error(" answer_option_". ++$key) is-invalid @enderror"
                            id="answer_option_1" name="answer_content[]"
                            rows="2">{{ $answer->answer_content }}</textarea>
                        @error('answer_option_'.++$key)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    @endforeach
                </div>


                <div class="col-5">
                    <button type="submit" class="btn btn-success">
                        <span> <i class="fas fa-save"></i> Save </span>
                    </button>
                    <button type="button" class="btn btn-dark" onclick="window.history.back()">
                        <span> <i class="fas fa-arrow-left"></i> Back</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
