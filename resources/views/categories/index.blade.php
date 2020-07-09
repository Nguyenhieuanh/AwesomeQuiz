@extends('layouts.navbar')

@section('content_home')
<h3 class="page-title">Category</h3>

<p>@if (Auth::user()->role == 1)
    <a href="{{ route('categories.create') }}" class="btn btn-success">Create new category</a>@endif
</p>

<div class="panel panel-default">
    <div class="panel-heading">
        Category List
    </div>

    <div class="panel-body">
        <table class="table table-bordered table-striped {{ count($categories) > 0 ? 'datatable' : '' }} dt-select">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @if (count($categories) > 0)
                @foreach ($categories as $category)
                <tr data-entry-id="{{ $category->id }}">
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('categories.show',[$category->id])}}">{{ $category->category_name }}</a></td>
                    <td>{{$category->category_description}}</td>
                    <td>
                        <a href="{{ route('categories.show',[$category->id]) }}" class="btn btn-sm btn-primary">
                            <span><i class="fas fa-info-circle"></i> Detail</span></a>
                        @if (Auth::user()->role == 1)
                        <a href="{{ route('categories.edit',[$category->id]) }}" class="btn btn-sm btn-info">
                            <span><i class="far fa-edit"></i> Edit</a></span>
                        <button class="btn btn-sm btn-danger"
                        onclick="confirmDelete('{{ route('categories.destroy',[$category->id]) }}')">
                        <span><i class="fas fa-trash-alt"></i> Delete</span>
                        </button>

                        @endif
                    </td>
                </tr>
                @endforeach
                {{$categories->links()}}
                @else
                <tr>
                    <td colspan="3">Nothing to show here</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop

@section('javascript')
<script>
    window.route_mass_crud_entries_destroy = '{{ route('categories.mass_destroy') }}';
</script>
@endsection
