@extends('layouts.navbar')

@section('content_home')
<div class="col-8 mt-3 mx-auto">
    <div class="card">
        <div class="card-header">
            <h3>Create New Category</h3>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{route('categories.store')}}">
                @csrf
                <div class="form-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="category_name"> <strong> Category Name
                            </strong>
                        </label>
                        <input type="text" class="form-control" id="category_name" name="category_name" autofocus>
                    </div>
                    @error('category_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                    <textarea class="form-control @error('category_description') is-invalid @enderror"
                        id="category_description" name="category_description" rows="5" placeholder="Category Description"></textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    <span> <i class="fas fa-save"></i> Save </span>
                </button>
                <button type="button" class="btn btn-dark" onclick="window.history.back()">
                    <span> <i class="fas fa-arrow-left"></i> Back</span>
                </button>

            </form>
        </div>
    </div>
</div>

@endsection
