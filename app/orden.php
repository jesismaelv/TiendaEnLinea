<?php
  $page_title = "Orden";
  include('estructura/cabecera.php');
  $id = $_GET['id'];


  if($_POST['estado'] != NULL) {
    $data = $_POST;
    $data['id'] = $id;
  
    if(actualizar_orden($data, $_SESSION['id'], false)) {
      aviso("La orden ha sido actualizada.");
    }
    else {
      aviso("La orden no se pudo actualizar.");
    }
  }

  $orden = get_orden($id, $_SESSION['id']);
  $fecha = date('d/M/Y',time($orden['fecha']));
?>

<main class="orden-page">
  <div class="container">
  <div class="row">
      <div class="col-12 col-md-6">

        <h1> Orden #<?php echo $orden['id'] ?></h1>

        <h4> Pedido por: <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?></h4>
        <p> El <?php echo $fecha; ?></p>
      </div>
      <div class="col-12 col-md-6">
        <?php 
          if($orden['estado'] != 'Cancelado') :
        ?>
        <form action="/admin/orden.php?id=<?php echo $id ?>" method='post'>
          <div class="input-group">
            <label> Status </label>
            <select name="estado">
              <option disabled selected> <?php echo $orden['estado'] ?> </option>
              <option value="Cancelado"> Cancelar </option>
            </select>
            <button class="boton" style="margin-left: 0px;"> Actualizar </button>
          </div>
        </form>
        <?php else : ?>
          <div class="input-group">
            <label> Status </label>
            <select disabled>
              <option> Cancelado </option>
            </select>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="carrito__wrapper">
      <table class="carrito">
          <tr >
            <th class="nombre">
              Nombre
            </th>
            <th>
              Precio
            </th>
            <th>
              Unidad
            </th>
            <th>
              Cantidad
            </th>
            <th>
              Subtotal
            </th>
        </tr>
        <?php
          $items = json_decode($orden['detalles']);
          $total = 0;
          $total_items = 0;
          foreach($items as $data) :
            $nombre = $data->nombre;
            $precio = $data->precio;
            $unidad = $data->unidad;
            $cantidad = $data->cantidad;
            $subtotal = $data->subtotal;

        ?>
          <tr class="carrito__item">
              <td class="nombre">
                <h3><?php echo $nombre; ?></h3>
              </td>
              <td class="precio">
                $<?php echo number_format($precio); ?>
              </td>
              <td class="unidad">
                <?php echo $unidad; ?>
              </td>
              <td class="cantidad">
                <?php echo $cantidad; ?>
              </td>
              <td class="total">
                $<?php echo number_format($subtotal); ?>
              </td>
          </tr>
        <?php
          endforeach;
        ?>
        <tr class="carrito__item carrito__totales">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total">
              $<?php echo number_format($orden['total']); ?>
            </td>
        </tr>
      </table>
    </div>

    <div class="row">
      <div class="col-12 col-md-6 detalles-de-envio">
          <h2> Dirección de envío: </h2>
          <?php
            $direccion = json_decode($orden['direccion']);

          ?>
          <p>
            <strong> Nombre: </strong>
            <?php echo $direccion->nombre . " " . $direccion->apellido ?>
            (<?php echo $direccion->correo; ?>)
          </p>
          <p><strong>Calle: </strong><?php echo $direccion->calle; ?></p>
          <p><strong>Colonia: </strong><?php echo $direccion->colonia; ?> (<?php echo $direccion->zip ?>) </p>

          <p><strong>Ciudad: </strong><?php echo $direccion->ciudad . ", " . $direccion->estado; ?></p>
          <p><strong>Notas: </strong><?php echo $direccion->notas ?></p>

      </div>
      <div class="col-12 col-md-6">
          <?php 
            $pago = json_decode($orden['pago']);
            $numero = $pago->numero;
            $numero = substr($numero, -4)
          ?>
          <h2> Forma de pago: </h2>
          <p><strong>Nombre: </strong><?php echo $pago->nombre; ?></p>
          <p><strong>Número: </strong> **** **** **** <?php echo $numero; ?></p>
          <p><strong>Tipo: </strong><?php echo $pago->tipo; ?></p>
      </div>
    </div>
  </div>
</main>

<?php
  include('estructura/pie.php');
?>