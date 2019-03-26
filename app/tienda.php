<?php
  $page_title = "Tienda";
  include('estructura/cabecera.php');


?>
<main class="admin-page registrar-producto-page">
  <div class="container">

  <div class="row">
    <div class="col-12 col-md-6"><h1> Tienda </h1></div>
    <div class="col-12 col-md-6">
      <form action="tienda.php">
        <div class="input-group--flex">
          <input type="text" name='s' placeholder='Buscar...' value="<?php echo $_GET['s'] ?>">
          <button class="boton">Buscar</button>
        </div>
      </form>
    </div>
  </div>


    <section class="archive-productos">
      <div class="row">
        <?php
          if( $_GET['s'] != '') {
            $result = buscar_productos($_GET['s']);
          }
          else {
            $result = get_archivo("producto");
          }
          if ($result->num_rows > 0) :
            while($producto = $result->fetch_assoc()) :
              $precio = $producto['precio'];
              $unidad = $producto['unidad'];
        ?>
          <div class="col-12 col-sm-6 col-lg-4">
            <?php include('tarjeta-producto.php') ?>
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