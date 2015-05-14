@extends('app')

@section('title')
    Index
@stop


@section('cont')

<h1>Cornell Board Games</h1>

<table id="main-nav">
<tbody>
    <tr>
        <td><a class="box-link" href="/auth/login"><p class="td-cent">Login</p></a></td>
        <td><a class="box-link" href="/cal"><p class="td-cent">Calendar</p></a></td>
    </tr>
    <tr>
        <td><a class="box-link" href="/players"><p class="td-cent">Players</p></a></td>
        <td><a class="box-link" href="/games"><p class="td-cent">Games</p></a></td>
    </tr>
</tbody>
</table>

@stop
