@extends('layouts.navbar')

@section('content_home')
    <h3 class="page-title">QuizPlayer Manager</h3>

    <div class="panel panel-default">

        <div class="panel-body">

            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                <tr>
                    <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                    <th>Users ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td></td>
                            <td>{{ $user->id }}</td>
                            <td><a href="{{route('userQuiz.allResults',$user->id)}}"> {!! $user->name !!}</a></td>
                            <td>{!! $user->email !!}</td>
                            <td>
                            @switch($user->role)
                                @case(0)<p class="text-success">QuizPlayer</p>@break
                                @case(1)<p class="text-warning">QuizManager</p>@break
                                @case(2)<p class="text-danger">God</p>@break
                                @endswitch
                            </td>
                            <td>@if($user->role == 0)
                                    <a href="{{route('user.promote',$user->id)}}" class="btn btn-warning">Promote to Manager</a>
                                @else
                                    <a href="{{route('user.demote',$user->id)}}" class="btn btn-danger">Demote to Player</a>
                                @endif
{{--                                <a href="{{ route('question.show',[$user->id]) }}"--}}
{{--                                   class="btn btn-xs btn-primary">Detail</a>--}}
{{--                                <a href="{{ route('question.edit',[$user->id]) }}"--}}
{{--                                   class="btn btn-xs btn-info">Edit</a>--}}
{{--                                {!! Form::open(array(--}}
{{--                                'style' => 'display: inline-block;',--}}
{{--                                'method' => 'DELETE',--}}
{{--                                'onsubmit' => "return confirm('".trans("Are you sure?")."');",--}}
{{--                                'route' => ['user.destroy', $user->id])) !!}--}}
{{--                                {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!}--}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    {{$users->links()}}
                @else
                    <tr>
                        <td colspan="7">'no_entries_in_table'</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
