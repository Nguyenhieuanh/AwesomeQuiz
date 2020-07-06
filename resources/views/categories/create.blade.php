@extends('layouts.navbar')

@section('content_home')
    <h3 class="page-title">Create new category</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['categories.store']]) !!}

    <div class="panel panel-default">


        <div class="panel-body">
            <div class="row">
                <div class="form-group">
                    {!! Form::text('category_name', old('category_name'), ['class' => 'form-control', 'placeholder' => 'Category name']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_name'))
                        <p class="help-block">
                            {{ $errors->first('category_name') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('Create it!'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

