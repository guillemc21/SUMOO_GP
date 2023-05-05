@extends('adminlte::page')

@section('title', 'Admin - INK SPOT S.L.L')

@section('css')
<link rel="stylesheet" href="css/main_admin_custom.css">
<link rel="shortcut icon" href="images/logo/sumogp.png">
<style>
    .content-wrapper {
        background-color: #3d3e40;
        color: #edededc5;
    }
    .content {
        padding: 0 !important;
    }
    .container-fluid {
        padding: 0 !important;
    }
</style>
@stop

@section('content_header')
<h1 style="font-family: system-ui;padding-left:30px;">Administrador - INK SPOT S.L.L</h1>
<p style="padding-left:30px;">Bienvenido al panel de administración.</p>
<hr style="background-color:#727272; margin-left:30px; width:300px;">
@stop

@section('content')

<br>
<div class="menu_admin" style="background-color:#282b2e; min-height: 78vh;" transition-style="in:circle:hesitate">
    
    <div class="card_ink">
        <div class="header">
            <div class="img-box">
                <img id="primeraIMG" src="/images/logo/sumogp.png" width="100px">
            </div>
            <h1 class="title">INK SPOT S.L.L</h1>
        </div>

        <div class="content">
            <p style="color:white;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, perferendis porro autem, recusandae, facere fugiat rem deserunt animi illum laudantium iusto vel quos possimus. Nihil beatae ut quidem soluta tempore.
            </p>

            <a class="btn-link">Leer mas...</a>
        </div>
    </div>

</div>

@stop



@section('footer')

@stop

@section('js')

@stop