@extends('app')

@section('cont')
    @yield('info_content')
    <div>
        <a class='button' href=@yield('back_address')>Go Back</a>
    </div>
@stop
