@extends('app')

@section('cont')
    @yield('info_content')
    <div>
        <?php
            $back_address = "/cal";
            echo "<a class='button' href='" . $back_address . "'>Go Back</a>";
        ?>
    </div>
@stop
