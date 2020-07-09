@extends('layouts.navbar')

@section('content_home')
    <h3 class="page-title">{{ $category->category_name }}</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Category detail
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID no.</th>
                            <th>Category name</th>
                            <th>Description</th>
                            <th>Actions</th></tr>
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_description }}</td>

                                <td>@if (Auth::user()->role == 1)
                                    <a href="{{ route('categories.edit',[$category->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    <a href="{{ route('categories.destroy',[$category->id]) }}" class="btn btn-xs btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</a>
                                    @endif
                                </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('categories.index') }}" class="btn btn-primary">Back to category list</a>
        </div>
    </div>
@endsection
