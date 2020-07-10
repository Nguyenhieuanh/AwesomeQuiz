@extends('layouts.navbar')

@section('content_home')
<div class="col-12">

    <fieldset><legend><h3 class="page-title">Create new category</h3></legend>
    <form method="POST" action="{{route('categories.store')}}">
        @csrf

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="form-group">
                        <input type="text" placeholder="New category name" class="form-control" name="category_name">
                        <p class="help-block"></p>
                        @if($errors->has('category_name'))
                        <p class="help-block">
                            {{ $errors->first('category_name') }}
                        </p>
                        @endif
                        <br>

                    </div>
                </div>

            </div>
        </div>
                    <div class="md-form">
                        <textarea id="form7" placeholder="Category description" class="md-textarea form-control" name="category_description" rows="3"></textarea>
                        <p class="help-block"></p>
                        @if($errors->has('category_description'))
                            <p class="help-block">
                                {{ $errors->first('category_description') }}
                            </p>
                        @endif
                    </div>
        <button type="submit" name="submit" class="btn btn-primary">CREATE</button>
    </form>
    </fieldset>
</div>


@endsection
