@extends('adminlte::page')

@section('title', 'Admin - INK SPOT S.L.L')

@section('css')
<link rel="stylesheet" href="css/main_admin_custom.css">
<link rel="shortcut icon" href="images/logo/sumogp.png">
@stop

@section('content_header')
<h1 style="font-family: system-ui">Administrador - INK SPOT S.L.L</h1>
@stop

@section('content')
<p>Bienvenido al panel de administración.</p>
<hr>

<br>
<div class="menu_admin">
    
    <div class="card_ink">
        <div class="header">
            <div class="img-box">
                <img id="primeraIMG" src="/images/logo/sumogp.png" width="100px">
            </div>
            <h1 class="title">INK SPOT S.L.L</h1>
        </div>

        <div class="content">
            <p>
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