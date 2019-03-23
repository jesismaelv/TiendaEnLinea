<?php
  $page_title = "Registrar Producto";
  include('estructura/cabecera.php');
?>
<main class="admin-page registrar-producto-page">
  <div class="container">
    <div class="cabecera cabecera-productos row">
      <div class="col-12 col-md-6">
        <h1> Productos </h1>

      </div>
      <div class="col-12 col-md-6 alinear-derecha alinear-derecha--nosm">
        <a  href="/admin/registrar_producto.php" class="boton"> Registrar Producto </a>
      </div>
    </div>

    <section class="archive-productos">
      <div class="row">
        <?php
          $result = get_productos();
          if ($result->num_rows > 0) :
            while($producto = $result->fetch_assoc()) :
        ?>
          <div class="col-12 col-sm-6 col-lg-4">
            <article class="tarjeta-producto">
              <a class="link-producto"
                  href="/admin/editar-producto.php?id=<?php echo $producto['id'] ?>">
                  <div class="imagen"
                  style="background-image:url(../<?php echo $producto['imagen'] ?>)"></div>

                <h2>
                  <?php echo $producto['nombre']; ?>
                </h2>
                <span class="precio">$<?php echo $producto['precio'] ?></span> • <span class="existencia">Quedan <?php echo $producto['existencia'] ?></span>
              </a>
              <a class="eliminar" href="/admin/eliminar-producto.php?id=<?php echo $producto['id'] ?>"> X </a>
            </article>
            

          </div>
        <?php
            endwhile;
          else :
        ?>
        <div class="col-12">
          <div class="no-resultados">
            No existen productos
          </div>
        </div>
        <?php
          endif;
        ?>
      </div>
    </section>
  </div>
</main>
<?php
  include('estructura/pie.php');
?>