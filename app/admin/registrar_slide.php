<?php
  $page_title = "Registrar Slide";
  include('estructura/cabecera.php');

  if($_POST!=NULL) {
    if( registrar_slide($_POST) === true ) {
      aviso("Se ha registrado la slide.");
    }
    else {
      aviso("La slide no se pudo registrar. Inténtalo de nuevo.");
    }
  }
?>

<main class="admin-page registrar-producto-page">
  <div class="container">
    <h1> Agregar Slide </h1>

    <form action="registrar_slide.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 col-md-3">

          <div class="input-group">
            <label> Imagen </label>
            <input type="file" name="imagen" accept="image/png, image/jpeg">
          </div>

        </div>

        <div class="col-12 col-md-9">

          <div class="row">

            <div class="col-12">
              <div class="input-group">
                <label> Frase </label>
                <input type="text" name="frase" >
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Subtítulo </label>
                <input type="text" name="subtitulo" >
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Acción </label>
                <input type="text" name="accion" >
              </div>
            </div>


          </div>
          <div class="alinear-derecha">
            <button class="boton boton-important"> Guardar </button>
          </div>
        </div>
      </div>
    </form>

  </div>
</main>

<?php
  include('estructura/pie.php');
?>