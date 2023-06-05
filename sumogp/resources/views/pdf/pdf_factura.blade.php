<!DOCTYPE html>
<html>

<head>
  <title>Factura de {{ $nameuser }}</title>

  <style>
    /* Estilos para el encabezado */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: orange;
      color: white;
      padding: 1rem;
    }

    body {
      font-family: 'Rubik', sans-serif;
    }

    /* Estilos para la información del emisor */
    .emisor {
      margin-top: 2rem;
      margin-bottom: 1rem;
      display: flex;
      flex-direction: column;
      font-weight: bold;
    }

    /* Estilos para la información del receptor */
    .receptor {
      margin-bottom: 1rem;
      display: flex;
      flex-direction: column;
      font-weight: bold;
    }

    /* Estilos para la tabla de productos */
    table {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 2rem;
    }

    th,
    td {
      border: 1px solid black;
      padding: 0.5rem;
      text-align: center;
    }

    th {
      background-color: orange;
      color: white;
    }

    /* Estilos para el total */
    .total {
      display: flex;
      justify-content: flex-end;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <!-- @if($content != null)
      <h1>prueba</h1>
    @endif -->
  <header>
    <h1>Factura Nº {{ $id }}</h1>
    <p style="font-weight: bold;">Fecha: {{ $date }}</p>
  </header>

  <hr>

  <table style="font-size: 0.9rem;">
    <thead>
      <tr>
        <th></th>
        <th>INK SPOT S.L.L</th>
        <th>CLIENTE</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <b>Nombre:</b>
        </td>
        <td>
          INK SPOT S.L.L
        </td>
        <td>
        {{ $nameuser }} {{ $last_name }}
        </td>
      </tr>

      <tr>
        <td>
          <b>Correo electronico:</b>
        </td>
        <td>
          inkspotsll86@gmial.com
        </td>
        <td>
          {{ $email }}
        </td>
      </tr>

      <tr>
        <td>
          <b>Teléfono:</b>
        </td>
        <td>
          613621145
        </td>
        <td>
          {{ $tel }}
        </td>
      </tr>

      <tr>
        <td>
          <b>NIF/DNI:</b>
        </td>
        <td>
          -
        </td>
        <td>
          {{ $nif }}
        </td>
      </tr>
      
      <tr>
        <td>
          <b>Direccion:</b>
        </td>
        <td>
          C/ Conssell de Cent nº282
        </td>
        <td>
          <b>Se muestra detalladamente mas abajo</b>
        </td>
      </tr>  
    </tbody>
  </table>

  <hr>

  <table style="font-size: 0.9rem;">
    <thead>
      <tr>
        <th>Producto</th>
        <th>Categoría</th>
        <th>Marca</th>
        <th>Cantidad</th>
        <th>Precio unitario</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach($content as $item)
      <tr>
        <td>{{ $item->name_product }}</td>
        <td>{{ $item->category->name }}</td>
        <td>{{ $item->brand->name }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->sell_price }} €</td>
        <td>{{ number_format($item->sell_price * $item->quantity,2)}} €</td>
      </tr>
      @endforeach

    </tbody>
  </table>
  <hr>
  <table style="font-size: 0.9rem;">
    <thead>
      <tr>
        <th>Dirección</th>
        <th>Nº de piso/casa</th>
        <th>Ciudad</th>
        <th>Estado/Provincia</th>
        <th>Codigo Postal</th>
        <th>País</th>
      </tr>
    </thead>
    <tbody>
      @foreach($address as $item)
    
        <td>{{ $item }}</td>
    
      @endforeach

    </tbody>
  </table>
  <hr>
  <table style="font-size: 0.9rem;">
    <thead>
      <tr>
        <th>Dia de entrega</th>
        <th>Hora de entrega</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td> {{ $delivery_day }} </td>
        <td> {{ $delivery_time }} </td>
      </tr>
    </tbody>
  </table>
  <div class="total">
    <p>Total sin iva: {{ number_format($total,2) }} €</p>
    <p>Total con iva: {{ number_format($total*(1.21),2) }} €</p>
  </div>
</body>

</html>