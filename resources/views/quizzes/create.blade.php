@extends('layouts.navbar')

@section('content_home')
<div class="col-8 mt-3">
    <div class="card">
        <div class="card-header">
            <h3>Create Quiz</h3>
        </div>
        <div class="card-body p-5">
            <form>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Quiz Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="category">Category</label>
                        <select class="custom-select" name="category">
                            <option selected>Choose...</option>
                            <option value="">...</option>
                        </select>
                    </div>

                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="question_count">Number of Questions</label>
                        <input type="number" class="form-control" id="question_count" name="question_count">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="duration">Duration</label>
                        <select class="custom-select" name="duration">
                            <option selected>Choose...</option>
                            <option value="">...</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
