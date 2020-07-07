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
                    <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                    <th>Category Title</th>
                    <th>Actions&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <tr data-entry-id="{{ $category->id }}">
                            <td></td>
                            <td><a href="{{route('categories.show',[$category->id])}}" >{{ $category->category_name }}</a></td>
                            <td>
                                <a href="{{ route('categories.show',[$category->id]) }}" class="btn btn-xs btn-primary">Detail</a>
                                @if (Auth::user()->role == 1)
                                <a href="{{ route('categories.edit',[$category->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                {!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('Are you sure?');",
                                    'route' => ['categories.destroy', $category->id])) !!}
                                {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                @endif
                                {!! Form::close() !!}
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
