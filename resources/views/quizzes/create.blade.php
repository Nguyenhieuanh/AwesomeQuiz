@extends('layouts.navbar')

@section('content_home')
<div class="col-8 mt-3">
    <div class="card">
        <div class="card-header">
            <h3>Create Quiz</h3>
        </div>
        <div class="card-body p-5">
            <form action="{{ route('quiz.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Quiz Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="category">Category</label>
                        <select class="custom-select" name="category_id">
                            <option selected>Choose...</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="question_count">Number of Questions</label>
                        <input type="number" class="form-control @error('question_count') is-invalid @enderror"
                            id="question_count" name="question_count">
                        @error('question_count')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="duration">Duration</label>
                        <select class="custom-select @error('duration') is-invalid @enderror" name="duration">
                            <option selected>Choose...</option>
                            <option value="1">45 minutes</option>
                            <option value="2">90 minutes</option>
                            <option value="3">120 minutes</option>
                        </select>
                        @error('duration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
