@extends('layouts.navbar')

@section('content_home')
<div class="col-8 mt-3 mx-auto">
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route("categories.index")}}">Category</a></li>
                    <li class="breadcrumb-item"><a href="{{route("categories.edit",['id'=> $category->id])}}">Edit</a>
                    </li>
                </ol>
            </nav>
            <h3>Edit Category</h3>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{route('categories.update', $category->id)}}">
                @csrf
                <div class="form-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="category_name"> <strong> Category Name
                            </strong>
                        </label>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                            id="category_name" name="category_name" autofocus value="{{$category->category_name}}">
                        @error('category_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <textarea class="form-control @error('category_description') is-invalid @enderror"
                        id="category_description" name="category_description" rows="5"
                        placeholder="Category Description">{{$category->category_description}}</textarea>
                    @error('category_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-success">
                        <span> <i class="fas fa-save"></i> Save </span>
                    </button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        <span> <i class="fas fa-arrow-left"></i> Back</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
