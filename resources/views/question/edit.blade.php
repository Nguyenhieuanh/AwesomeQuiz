@extends('layouts.navbar')

@section('content_home')
    <div class="col-8 mt-3 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>Edit This Question</h3>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{route('question.update',$question->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="question_content">Question</label>
                        <textarea class="form-control @error('question_content') is-invalid @enderror" id="question_content"
                                  name="question_content"  rows="5">{{$question->question_content}}</textarea>
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
                                    <td><p class="text-success">Easy</p></td>
                                    @break
                                    @case(2)
                                    <td><p class="text-warning">Medium</p></td>
                                    @break
                                    @case(3)
                                    <td><p class="text-danger">Hard</p></td>
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
                            <textarea class="form-control @error("answer_option_". ++$key) is-invalid @enderror"
                                      id="answer_option_1" name="answer_content[]"  rows="2">{{ $answer->answer_content }}</textarea>
                            @error('answer_option_'.++$key)
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        @endforeach
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
