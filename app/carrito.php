<?php
  $page_title = "Carrito";
  include('estructura/cabecera.php');
?>

<main class="carrito-page">
  <div class="container">
    <h1> Carrito </h1>
<?php
  $items = json_decode($_SESSION['carrito']);
  if(sizeof($items) > 0) :
?>
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
    <div class="alinear-derecha alinear-derecha--nosm">
      <a href="checkout.php" class="boton boton-important"> Checkout </a>
    </div>
    <?php else: ?>
      <div class="no-resultados">
        Tu carrito está vacío.
      </div>

    <?php endif;  ?>
  </div>
</main>

<?php
  include('estructura/pie.php');
?>