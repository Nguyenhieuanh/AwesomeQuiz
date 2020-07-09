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
                        <a href="{{ route('categories.show',[$category->id]) }}"
                            class="btn btn-xs btn-primary">Detail</a>
                        @if (Auth::user()->role == 1)
                        <a href="{{ route('categories.edit',[$category->id]) }}" class="btn btn-xs btn-info">Edit</a>
                        <a href="{{ route('categories.destroy',[$category->id]) }}" class="btn btn-xs btn-danger"
                            onclick="return confirm('Are you sure?')">Delete</a>
                        <button class="btn btn-danger"
                        onclick="confirmDelete({{route('categories.destroy',[$category->id])}})">
                            <i class="far fa-trash-alt"></i> Delete
                        </button>
                        {{-- {!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('Are you sure?');",
                                    'route' => ['categories.destroy', $category->id])) !!}
                                {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                @endif
                                {!! Form::close() !!} --}}
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