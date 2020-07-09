@extends('layouts.navbar')

@section('content_home')
<div class="col-8 mt-3 mx-auto">
    <div class="card">
        <div class="card-header">
            <h3>Create New Question</h3>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{route('question.store')}}">
                @csrf
                <div class="form-group">
                    <label for="question_content"> <strong> Question </strong></label>

                    <textarea class="form-control @error('question_content') is-invalid @enderror" id="question_content"
                        name="question_content" rows="2"></textarea>
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
                                <div class="input-group is-invalid">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="difficulty-select"> <strong> Difficulty </strong>
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
                                        <label class="input-group-text" for="category-select"> <strong> Category </strong>
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

                {{-- Start of Answer group  --}}
                <div class="form-group">
                    <div class="col">
                        <div class="row">
                            <span>
                                <label for="answer_option_1"> <strong> Answer Option 1 </strong></label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-success btn-sm active">
                                        <input type="radio" name="correct_option" id="option1" checked value="1">
                                        Right
                                    </label>
                                    <label class="btn btn-outline-danger btn-sm">
                                        <input type="radio" name="correct_option" id="option2" value="0"> Wrong
                                    </label>
                                </div>
                            </span>
                        </div>
                    </div>
                    <textarea class="form-control @error('answer_option') is-invalid @enderror" id="answer_option_1"
                        name="answer_option" rows="2" required></textarea>
                    @error('answer_option')
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
                            <span>
                                <label for="answer_option_1"> <strong> Answer Option 2 </strong></label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-success btn-sm">
                                        <input type="radio" name="correct_option" id="option1" value="1"> Right
                                    </label>
                                    <label class="btn btn-outline-danger btn-sm active">
                                        <input type="radio" name="correct_option" id="option2" checked value="0"> Wrong
                                    </label>
                                </div>
                            </span>
                        </div>
                    </div>
                    <textarea class="form-control @error('answer_option') is-invalid @enderror" id="answer_option_2"
                        name="answer_option" rows="2" required></textarea>
                    @error('answer_option')
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
                            <span>
                                <label for="answer_option_1"> <strong> Answer Option 3 </strong></label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-success btn-sm">
                                        <input type="radio" name="correct_option" id="option1" value="1"> Right
                                    </label>
                                    <label class="btn btn-outline-danger btn-sm active">
                                        <input type="radio" name="correct_option" id="option2" checked value="0"> Wrong
                                    </label>
                                </div>
                            </span>
                        </div>
                    </div>
                    <textarea class="form-control" id="answer_option_3" name="answer_option" rows="2"></textarea>
                </div>
                {{-- End of Answer group  --}}
                {{-- Start of Answer group  --}}
                <div class="form-group">
                    <div class="col">
                        <div class="row">
                            <span>
                                <label for="answer_option_1"> <strong> Answer Option 4 </strong></label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-success btn-sm">
                                        <input type="radio" name="correct_option" id="option1" value="1"> Right
                                    </label>
                                    <label class="btn btn-outline-danger btn-sm active">
                                        <input type="radio" name="correct_option" id="option2" checked value="0"> Wrong
                                    </label>
                                </div>
                            </span>
                        </div>
                    </div>
                    <textarea class="form-control" id="answer_option_4" name="answer_option" rows="2"></textarea>
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
    </div>
</div>


@endsection
