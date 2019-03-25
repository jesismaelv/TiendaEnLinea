<?php
  $page_title = "Carrito";
  include('estructura/cabecera.php');

  if($_POST['terminos']) {
    $status = registrar_orden($_POST, $_SESSION['id']);
    if( $status[0] === true ) {
      $id = $status[1];
      $url = "orden.php?id=" . $id;
      echo "<meta http-equiv='refresh' content='0; URL=$url' />";
    }
    else {
      echo aviso("No se pudo regisrar la orden. Por favor, intentelo de nuevo.");
    }
  }

?>

<main class="carrito-page">
  <div class="container">
    <h1> Checkout </h1>
    <h2> Resumen </h2>
    <div class="carrito__wrapper">
      <table class="carrito">
          <tr >
            <th>
              Imagen
            </th>
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
              Total
            </th>
        </tr>
        <?php
          $items = json_decode($_SESSION['carrito']);
          $total = 0;
          $total_items = 0;
          foreach($items as $id => $cantidad) :
            $data = get_single('producto', $id);
            $nombre = $data['nombre'];
            $unidad = $data['unidad'];
            $descripcion = $data['descripcion'];
            $precio = $data['precio'];
            $existencia = $data['existencia'];
            $imagen = $data['imagen'];
            $total = $total + ( $cantidad * $precio );
            $total_items += $cantidad;
        ?>
          <tr class="carrito__item">
              <td class="imagen">
                <div class="img" style='background-image:url("<?php echo $imagen ?>")'></div>
              </td>
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
                $<?php echo number_format($precio * $cantidad); ?>
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
            <td class="cantidad alinear-derecha">
              <?php echo $total_items; ?>
            </td>
            <td class="total">
              $<?php echo number_format($total); ?>
            </td>
        </tr>
      </table>
    </div>
    <form action="checkout.php" method="post">
    <div class="row">
      <div class="col-12 col-md-6">
        <h2> Direccion </h2>
      </div>
      <div class="col-12 col-md-6 alinear-derecha alinear-derecha--nosm">
        <a href="agregar_direccion.php?redirect=checkout" class="boton"> Agregar direccion </a>
      </div>

      <?php
        $direcciones = get_direcciones($_SESSION['id']);
        if ($direcciones->num_rows > 0) :
          while($direccion = $direcciones->fetch_assoc()) :
            $id_direccion = $direccion['id'];
            $nombre = $direccion['nombre'];
            $apellido = $direccion['apellido'];
            $correo = $direccion['correo'];
            $calle = $direccion['calle'];
            $colonia = $direccion['colonia'];
            $zip = $direccion['zip'];
      ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 tarjeta-direccion__wrapper">
              <label href="editar_direccion.php?id=<?php echo $id_direccion ?>" class="tarjeta-direccion">
                <h5><?php echo "$calle $colonia ($zip)" ?></h5>
                <p><?php echo "$nombre $apellido ($correo)" ?></p>
                <a href="editar_direccion.php?id=<?php echo $id_direccion ?>" class="link">
                  Editar 
                </a>
                <input required type="radio" name="direccion" value="<?php echo $id_direccion ?>" checked>
              </label>
            </div>
      <?php
          endwhile;
        endif;
      ?>
    </div>

    <div class="row">
      <div class="col-12">
        <h2> Forma de pago </h2>
      </div>
      

      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="input-group">
          <label> Nombre Completo </label>
          <input required type="text" class="nombre_tarjeta">
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="input-group">
          <label> Numero Tarjeta </label>
          <input required type="number" class="numero_tarjeta">
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="input-group">
          <label> Fecha de Vencimiento </label>
          <input required type="text" class="vence_tarjeta">
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="input-group">
          <label> Tipo </label>
          <select name="tipo_tarjeta">
            <option> Mastercard </option>
            <option> Visa </option>
            <option> American Express </option>
          </select>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="input-group">
          <label> CCV </label>
          <input required type="text" class="ccv_tarjeta">
        </div>
      </div>

    </div>

    <label> <input required type="checkbox" name="terminos"> Acepto los <a class="link" href="terminos.php"> Terminos y Condiciones </a></label>

    <div class="alinear-derecha alinear-derecha--nosm">
      <button class="boton boton-important"> Comprar </button>
    </div>

    </form> <!--- ACABA CHECKOUT -->
  </div>
</main>

<?php
  include('estructura/pie.php');
?>