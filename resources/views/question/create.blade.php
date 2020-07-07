@extends('layouts.navbar')

@section('content_home')
<div class="col-11 mx-auto">
    <h3 class="page-title">Create New Question</h3>

    <form method="POST" action="{{route('question.store')}}">
        @csrf
        <div class="form-group">
            <label for="question_content">Question</label>
            <textarea class="form-control" id="question_content" name="question_content" rows="3" required></textarea> </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="correct_answer">Correct Answer</label>
            <textarea class="form-control" id="answer_option1" name="correct_answer" rows="2" required></textarea>
        </div>
        <div class="form-group">
            <label for="answer_option1">Answer Option 1</label>
            <textarea class="form-control" id="answer_option1" name="answer_option1" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label for="answer_option2">Answer Option 2</label>
            <textarea class="form-control" id="answer_option2" name="answer_option2" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label for="answer_option3">Answer Option 3</label>
            <textarea class="form-control" id="answer_option3" name="answer_option3" rows="2"></textarea>
        </div>
        <div class="col-5">
            <button type="submit" class="btn btn-success">Save</button>
            {{-- pending clear button action --}}
            <button type="reset" class="btn btn-warning">Clear</button>
            <button type="button" class="btn btn-secondary">Cancel</button>
        </div>
    </form>

</div>


@endsection
