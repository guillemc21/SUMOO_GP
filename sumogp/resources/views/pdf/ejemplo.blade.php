<!DOCTYPE html>
<html>
<head>
    <title>Factura de {{ $title }}</title>
     <style>
      /* Estilos para el encabezado */
      header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #444;
        color: white;
        padding: 1rem;
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

      th, td {
        border: 1px solid black;
        padding: 0.5rem;
        text-align: center;
      }

      th {
        background-color: #444;
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
    <h1>{{ $content }}</h1>
    <p>{{ $content }}</p>
    <header>
      <h1>Factura</h1>
      <p>Fecha: {{ $date }}</p>
    </header>

    <div class="emisor">
      <h2>Información del emisor</h2>
      <p>Nombre: Juan Pérez</p>
      <p>Dirección: Calle 123, Ciudad</p>
      <p>Teléfono: 555-1234</p>
    </div>

    <div class="receptor">
      <h2>Información del receptor</h2>
      <p>Nombre: Ana Gómez</p>
      <p>Dirección: Calle 456, Ciudad</p>
      <p>Teléfono: 555-5678</p>
    </div>

    <table>
      <thead>
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio unitario</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Producto 1</td>
          <td>2</td>
          <td>$10.00</td>
          <td>$20.00</td>
        </tr>
        <tr>
          <td>Producto 2</td>
          <td>1</td>
          <td>$15.00</td>
          <td>$15.00</td>
        </tr>
        <tr>
          <td>Producto 3</td>
          <td>3</td>
          <td>$5.00</td>
          <td>$15.00</td>
        </tr>
      </tbody>
    </table>

    <div class="total">
      <p>Total: $50.00</p>
    </div>
</body>
</html>