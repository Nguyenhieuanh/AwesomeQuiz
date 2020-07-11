@extends('layouts.navbar')

@section('content_home')
<p>You right: {{ $point.'/'.$questions_count }}</p>
<p>Your point: {{ $point/$questions_count * 100 }} point</p>
@endsection
