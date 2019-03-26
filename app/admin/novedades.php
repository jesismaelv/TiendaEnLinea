<?php
  $page_title = "Novedades";
  include('estructura/cabecera.php');

  if($_GET['eliminar'] == 'exito') {
    echo aviso("La novedad se ha eliminado con exito.");
  }
  if($_GET['eliminar'] == 'error') {
    echo aviso("Hubo un error al eliminar la novedad.");
  }

?>
<main class="admin-page">
  <div class="container">
    <div class="cabecera cabecera-productos row">
      <div class="col-12 col-md-6">
        <h1> Novedades </h1>

      </div>
      <div class="col-12 col-md-6 alinear-derecha alinear-derecha--nosm">
        <a  href="/admin/registrar_novedad.php" class="boton"> Registrar novedad </a>
      </div>
    </div>

    <section class="archive-productos">
      <div class="row">
        <?php
          $result = get_archivo("novedades");
          if ($result->num_rows > 0) :
            while($novedad = $result->fetch_assoc()) :
        ?>
          <div class="col-12 col-sm-6 col-lg-4">
            <article class="tarjeta tarjeta-producto">
              <a class="link-producto"
                  href="/admin/editar_novedad.php?id=<?php echo $novedad['id'] ?>">
                  <div class="imagen"
                  style="background-image:url(../<?php echo $novedad['imagen'] ?>)"></div>

                <h2>
                  <?php echo $novedad['titulo']; ?>
                </h2>
              </a>
              <a class="eliminar" href="/admin/eliminar.php?s=novedades&id=<?php echo $novedad['id'] ?>"> X </a>
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