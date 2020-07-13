@extends('layouts.navbar')

@section('content_home')
<div class="mt-3 col-11 mx-auto">
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route("quiz.list")}}">Quiz</a></li>
                    <li class="breadcrumb-item"><a href="{{route("quiz.create")}}">Create</a></li>
                </ol>
            </nav>
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
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="" selected>Choose...</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
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
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <select class="form-control @error('duration') is-invalid @enderror" name="duration">
                                <option value="" selected>Choose...</option>
                                <option value="15">15 minutes</option>
                                <option value="30">30 minutes</option>
                                <option value="45">45 minutes</option>
                                <option value="90">90 minutes</option>
                                <option value="120">120 minutes</option>
                            </select>
                            @error('duration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="4"
                        class="form-control @error('description') is-invalid @enderror""></textarea>
                    @error('description')
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
