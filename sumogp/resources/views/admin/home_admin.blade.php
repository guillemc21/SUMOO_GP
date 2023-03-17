@extends('adminlte::page')

@section('title', 'Admin - SUMOGP')

@section('css')
    <link rel="stylesheet" href="css/main_admin_custom.css">
@stop

@section('content_header')
    <h1 style="font-family: system-ui">Admin - SUMOGP</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <hr>
    <ul>
        <li><a href="#primeraIMG">Primera imagen</a></li>
        <li><a href="#segundaIMG">Segunda imagen</a></li>
        <li><a href="#terceraIMG">Tercera imagen</a></li>
    </ul>
    <hr>
    <div class="menu_admin">
        <img id="primeraIMG" src="images/main/background1.jpg" width="400px">
        <img id="segundaIMG" src="images/main/background2.jpg" width="400px">
        <img id="terceraIMG" src="images/main/background3.jpg" width="400px">
    </div>
        
@stop



@section('footer')
    <p>Soy el footer.</p>
@stop

@section('js')
    <script> console.log('hi!'); </script>
@stop
