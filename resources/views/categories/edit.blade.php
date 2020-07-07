@extends('layouts.navbar')

@section('content_home')



    <fieldset><legend><h3 class="page-title">Update this category</h3></legend>
        {!! Form::model($category, ['method' => 'POST', 'route' => ['categories.update', $category->id]]) !!}
            @csrf




                        <div class="form-group">
                            <label>Category name
                                <input type="text" placeholder="New category name" class="form-control" name="category_name" value="{{$category->category_name}}">
                            </label>
                            <p class="help-block"></p>
                            @if($errors->has('category_name'))
                                <p class="help-block">
                                    {{ $errors->first('category_name') }}
                                </p>
                            @endif
                            <br>

                        </div>




            <div class="md-form">
                <label for="form7">Category description</label><textarea id="form7" placeholder="Category description" class="md-textarea form-control" name="category_description" rows="3" >{{$category->category_description}}</textarea>

            </div>
    </fieldset>
    {!! Form::submit(trans('Update it!'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

