@extends('layouts.navbar')

@section('content_home')
    <h3 class="page-title">Create new category</h3>
    <form method="POST"  action="{{route('categories.store')}}">
        @csrf
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="form-group">
                        <input type="text" placeholder="New category name" name="category_name">

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
        <button type="submit" name="submit" class="btn btn-primary">CREATE</button>



    </form>

@endsection

