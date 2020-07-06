@extends('layouts.navbar')

@section('content_home')
<div class="container">
    <form>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="name">Quiz Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="col-md-6 mb-3">
                <label for="duration">Duration</label>
                <select class="custom-select" name="duration">
                    <option selected>Choose...</option>
                    <option value="" >...</option>
                </select>
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="question_count">Number of Questions</label>
                <input type="number" class="form-control" id="question_count" name="question_count">
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">State</label>
                <select class="custom-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option>...</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
@endsection
