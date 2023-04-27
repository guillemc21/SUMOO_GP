@extends('adminlte::page')

@section('title', 'Admin - SUMOGP')

@section('css')
    <link rel="stylesheet" href="css/main_admin_custom.css">
    <link rel="shortcut icon" href="images/logo/sumogp.png">
@stop

@section('content_header')
    <h1 style="font-family: system-ui">Admin - SUMOGP</h1>
@stop

@section('content')
    <p>Bienvenido al panel de administración.</p>
    <hr>
    <nav class="menu">
        <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open">
        <label class="menu-open-button" for="menu-open">
            <span class="lines line-1"></span>
            <span class="lines line-2"></span>
            <span class="lines line-3"></span>
        </label>

        
        <a href="#primeraIMG" class="menu-item green"> <i class="fa fa-coffee"></i> </a>
        <a href="#segundaIMG" class="menu-item red"> <i class="fa fa-heart"></i> </a>
        <a href="#terceraIMG" class="menu-item purple"> <i class="fa fa-microphone"></i> </a>
        
    </nav>
    <br>
    <div class="menu_admin">
        <img id="primeraIMG" src="images/main/background1.jpg" width="400px">
        <img id="segundaIMG" src="images/main/background2.jpg" width="400px">
        <img id="terceraIMG" src="images/main/background3.jpg" width="400px">
    </div>
        
@stop



@section('footer')
    
@stop

@section('js')
    
@stop
