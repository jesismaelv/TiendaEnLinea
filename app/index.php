<?php
  $page_title = "Inicio";
  include('estructura/cabecera.php');

  
?>

<main class="index-page">
  <section class="galeria-inicio" data-gallery-auto-rotate>
    <?php
      $result = get_archivo("slides_inicio");
      if ($result->num_rows > 0) :
        while($slide = $result->fetch_assoc()) :
          $slides[] = $slide;
        endwhile;
      endif;
      include('galeria.php');
    ?>
  </section>

  <section class="container novedades-inicio">
    <div class="row">
      <div class="col-12">
        <h1>
          Novedades
        </h1>
      </div>
    
      <?php
        $result = get_archivo("novedades");
        if ($result->num_rows > 0) :
          while($novedad = $result->fetch_assoc()) :
            $titulo = $novedad['titulo'];
            $subtitulo = $novedad['subtitulo'];
            $descripcion = $novedad['descripcion'];
            $imagen = $novedad['imagen'];
      ?>
        <div class="col-12 col-md-6">
          <div class="tarjeta-novedad">
            <div class="img" style="background-image:url(<?php echo $imagen ?>);"></div>
            <h3><?php echo $titulo; ?></h3>
            <span><?php echo $subtitulo; ?></span>
            <p><?php echo $descripcion; ?></p>
          </div>
        </div>
      <?php
          endwhile;
        endif;
      ?>
      </div>
    </section>
    
    <section class="container productos-recientes">
        <div class="row">
          <div class="col-12">
            <h1> Productos Recientes </h1>
          </div>
          <?php
            $result = productos_recientes(4);
            if ($result->num_rows > 0) :
              while($producto = $result->fetch_assoc()) :
                $precio = $producto['precio'];
                $unidad = $producto['unidad'];
          ?>
            <div class="col-12 col-sm-6 col-lg-3">
              <article class="tarjeta tarjeta-producto">
                <a class="link-producto"
                    href="/producto.php?id=<?php echo $producto['id'] ?>">
                    <div class="imagen"
                    style="background-image:url(../<?php echo $producto['imagen'] ?>)"></div>

                  <h2>
                    <?php echo $producto['nombre']; ?>
                  </h2>
                  <span class="precio"><?php echo "$$precio por $unidad" ?></span> • <span class="existencia">Quedan <?php echo $producto['existencia'] ?></span>
                </a>
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
</main>

<?php
  include('estructura/pie.php');
?>