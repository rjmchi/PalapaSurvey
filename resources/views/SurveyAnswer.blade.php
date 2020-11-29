@extends('layouts.app')

@section('content')
<div class="container">
    <owner-answer-component unit_id="{{$unit->id}}" answer_id = {{$answer->id}} />
</div>

@endsection