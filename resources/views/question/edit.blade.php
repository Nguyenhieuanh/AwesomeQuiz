@extends('layouts.navbar')

@section('content_home')
    <div class="col-8 mt-3 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>Create New Question</h3>
            </div>
            <div class="card-body p-4">
                <form method="GET" action="{{route('question.update',$question->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="question_content">Question</label>
                        <textarea class="form-control @error('question_content') is-invalid @enderror" id="question_content"
                                  name="question_content" value="{{old($question->question_content)}}" rows="2"></textarea>
                        @error('question_content')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="difficulty">Difficulty</label>
                        <select class="form-control" id="difficulty" name="difficulty">
                            <option value="1">Easy</option>
                            <option value="2">Medium</option>
                            <option value="3">Hard</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="col-2">
                            <label for="answer_option_1">Answer Option 1</label>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" title="Correct" name="correct_option_1" value="1">
                                </div>
                            </div>
                            <textarea class="form-control @error('answer_option_1') is-invalid @enderror"
                                      id="answer_option_1" name="answer_option_1" value="{{old($request->answer_option_1)}}" rows="2"></textarea>
                            @error('answer_option_1')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-2">
                            <label for="answer_option_2">Answer Option 2</label>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" title="Correct" name="correct_option_2" value="1">
                                </div>
                            </div>
                            <textarea class="form-control @error('answer_option_2') is-invalid @enderror"
                                      id="answer_option_2" name="answer_option_2" {{old($request->answer_option_2)}} rows="2"></textarea>
                            @error('answer_option_2')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-2">
                            <label for="answer_option_3">Answer Option 3</label>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" title="Correct" name="correct_option_3" value="1">
                                </div>
                            </div>
                            <textarea class="form-control @error('answer_option_3') is-invalid @enderror"
                                      id="answer_option_3" name="answer_option_3" {{old($request->answer_option_3)}} rows="2"></textarea>
                            @error('answer_option_3')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-2">
                            <label for="answer_option_4">Answer Option 4</label>
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" title="Correct" name="correct_option_4" value="1">
                                </div>
                            </div>
                            <textarea class="form-control @error('answer_option_4') is-invalid @enderror"
                                      id="answer_option_4" name="answer_option_4" {{old($request->answer_option_4)}} rows="2"></textarea>
                            @error('answer_option_4')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-5">
                        <button type="submit" class="btn btn-success">Save</button>
                        {{-- pending clear, back button action --}}
                        {{--
                        <button type="reset" class="btn btn-warning">Clear</button>
                        <button type="button" class="btn btn-secondary">Back</button>
                         --}}
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
