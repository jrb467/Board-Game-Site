@extends('app')

@section('styles')
    <script src='/js/mainmenu.js'></script>
@stop

@section('title')
    Index
@stop


@section('cont')

<h1>Cornell Board Games</h1>

<div class="link-box">
    <a class="index-menu" href="/auth/login">
        <div class="link-swell">Login</div>
    </a>
</div>
<div class="link-box">
    <a class="index-menu" href="/cal">
        <div class="link-swell">Calendar</div>
    </a>
</div>
<div class="link-box">
    <a class="index-menu" href="/players">
        <div class="link-swell">Players</div>
    </a>
</div>
<div class="link-box">
    <a class="index-menu" href="/games">
        <div class="link-swell">Games</div>
    </a>
</div>

@stop
