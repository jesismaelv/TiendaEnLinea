<?php
  $page_title = "Slides";
  include('estructura/cabecera.php');

  if($_GET['eliminar'] == 'exito') {
    echo aviso("La slide se ha eliminado con exito.");
  }
  if($_GET['eliminar'] == 'error') {
    echo aviso("Hubo un error al eliminar la slide.");
  }

?>
<main class="admin-page registrar-producto-page">
  <div class="container">
    <div class="cabecera cabecera-productos row">
      <div class="col-12 col-md-6">
        <h1> Slides </h1>

      </div>
      <div class="col-12 col-md-6 alinear-derecha alinear-derecha--nosm">
        <a  href="/admin/registrar_slide.php" class="boton"> Registrar slide </a>
      </div>
    </div>

    <section class="archive-slides">
      <div class="row">
        <?php
          $result = get_archivo("slides_inicio");
          if ($result->num_rows > 0) :
            while($slide = $result->fetch_assoc()) :
        ?>
          <div class="col-12 col-md-6">
            <article class="tarjeta tarjeta-slide">
              <a class="link-slide"
                  href="/admin/editar_slide.php?id=<?php echo $slide['id'] ?>"
                  style="background-image:url(../<?php echo $slide['imagen'] ?>)">

                <div class="contenido">
                  <h2>
                    <?php echo $slide['frase'] ?>
                  </h2>
                  <p><?php echo $slide['subtitulo'] ?></p>

                </div>
              </a>
              <a class="eliminar" href="/admin/eliminar.php?s=slides_inicio&id=<?php echo $slide['id'] ?>"> X </a>
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