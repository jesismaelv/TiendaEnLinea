<?php
  $page_title = "Carrito";
  include('estructura/cabecera.php');

  if($_POST != NULL) {
    if(actualizar_carrito($_POST, $_SESSION['id'])) {
      aviso('El carrito fue actualizado.');
    }
    else {
      aviso('No se pudo actualizar el carrito.');
    }
  }
?>

<main class="carrito-page">
  <div class="container">
    <h1> Carrito </h1>
<?php
  $items = json_decode($_SESSION['carrito']);
  $tiene_productos = false;
  foreach($items as $item) {
    if($item > 0) $tiene_productos = true;
  }
  if( $tiene_productos ) :
?>
    <form action="carrito.php" method="post">
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
                <input required type="number" name='cantidad[<?php echo $id ?>]' value = <?php echo $cantidad; ?>>
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
    <div class="row">
      <div class="col-12 col-md-6">
        <button class='boton'> Actualizar </button>
      </div>
      <div class="col-12 col-md-6 alinear-derecha alinear-derecha--nosm">
        <a href="checkout.php" class="boton boton-important"> Checkout </a>
      </div>
    </div>
    </form>
    <?php else: ?>
      <div class="no-resultados">
        Tu carrito está vacío. <a href="tienda.php" class='link'> Ir a la tienda. </a>
      </div>

    <?php endif;  ?>
  </div>
</main>

<?php
  include('estructura/pie.php');
?>