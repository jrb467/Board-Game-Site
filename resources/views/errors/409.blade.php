@extends('error')

@section('title')
    Resource Conflict
@stop

@section('error_message')
    409: The action couldn't be completed due to constraint conflicts
@stop
