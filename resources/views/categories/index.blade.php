@extends('layouts.navbar')

@section('content_home')
<div class="col mt-3 mx-auto">
    <div class="card">
        <div class="card-header">
            <h3 class="page-title">Category</h3>
        </div>
        <div class="card-body p-4">
            @if (Auth::user()->role == 2)
            <div class="float-left">
                <a href="{{ route('categories.create') }}" class="btn btn-success">
                    <span><i class="fas fa-plus"></i> Create category</span>
                </a>
            </div>
            @endif
            <table class="table table-bordered table-hover {{ count($categories) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr class="table-primary">
                        <th>ID</th>
                        <th style="width: 15%">Category Title</th>
                        <th>Description</th>
                        @if (Auth::user()->role == 2)<th style="width: 15%">Actions</th>@endif
                    </tr>
                </thead>
                <tbody>
                    @if (count($categories) > 0)
                    @foreach ($categories as $category)
                    <tr data-entry-id="{{ $category->id }}" data-toggle="modal" data-target="#category-details"
                        title="Click for more Details">
                        <td> {{$category->id}}</td>
                        <td>
                            <p>{{ $category->category_name }}</p>
                        </td>
                        <td>{{$category->category_description}}</td>
                        @if (Auth::user()->role == 2)
                        <td>
                            <a href="{{ route('categories.edit',[$category->id]) }}" class="btn btn-sm btn-primary">
                                <span><i class="far fa-edit"></i> Edit</a></span>
                            <button class="btn btn-sm btn-danger"
                                onclick="confirmDelete('{{ route('categories.destroy',[$category->id]) }}')">
                                <span><i class="fas fa-trash-alt"></i> Delete</span>
                            </button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3">Nothing to show here</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="float-right">{{$categories->links()}}</div>
        </div>

    </div>
</div>
@endsection


{{-- Category Detail Modal --}}
<div class="modal fade" id="category-details" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $category->category_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Description</strong>
                <p>{{$category->category_description}}</p>
            </div>
            <div class="modal-footer">
                @if (Auth::user()->role == 2)
                <a href="{{ route('categories.edit',[$category->id]) }}" class="btn btn-primary">
                    <span><i class="far fa-edit"></i> Edit</a></span>
                @endif
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <span><i class="fas fa-times"></i> Close </span>
                </button>
            </div>
        </div>
    </div>
</div>
{{-- End Category Detail Modal --}}
