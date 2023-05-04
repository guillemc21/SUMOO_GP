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
        <th>SUMO GP</th>
        <th>CLIENTE</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
        <th>
          <h2>Información de la empresa</h2>
        </th>
        <th>
          <p>Nombre: INK SPOT S.L.L</p>
        </th>
        <th>
          <p>Correo electronico: inkspotsll86@gmial.com</p>
        </th>
        <th>
          <p>Teléfono: 613621145</p>
        </th>
        <th>
          <p>Cif: B-43536274</p>
        </th>
        <th>
          <p>Direccion: C/ Conssell de Cent nº282</p>
        </th>

        <!-- <div class="emisor"> 
          </div> -->
        </td>
        <td>
      <tr>
        <td>
        <th>
          <h2>Información del cliente</h2>
        </th>
      </tr>
      <tr>
        <th>
          <p>Nombre: {{ $nameuser }}</p>
        </th>
      </tr>
      <tr>
        <th>
          <p>Apellidos: {{ $last_name }}</p>
        </th>
      </tr>
      <tr>
        <th>
          <p>Correo electronico: {{ $email }}</p>
        </th>
      </tr>
      <tr>
        <th>
          <p>Teléfono: 555-1234</p>
        </th>
      </tr>
      <!-- <div class="emisor">
           
            
            
            
            
          </div> -->
      </td>
      </tr>
    </tbody>
  </table>

  <hr>
  <!-- <div class="receptor">
      <h2>Información del receptor</h2>
      <p>Nombre: Ana Gómez</p>
      <p>Dirección: Calle 456, Ciudad</p>
      <p>Teléfono: 555-5678</p>
    </div> -->

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
      <!-- <h5>{{ $item->name_product }}</h5>
        <h5>{{ $item->sell_price }}</h5>
        <h5>{{ $item->content }}</h5>
        <h5>{{ $item->category->name }}</h5>
        <h5>{{ $item->brand->name }}</h5> -->
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

  <div class="total">
    <p>Total: {{ number_format($total,2) }} €</p>
  </div>
</body>

</html>