<?php
  $page_title = "Registrar Novedades";
  include('estructura/cabecera.php');

  if($_POST!=NULL) {
    if( registrar_novedad($_POST) === true ) {
      aviso("Se ha registrado la novedad.");
    }
    else {
      aviso("La novedad no se pudo registrar. Inténtalo de nuevo.");
    }
  }

?>

<main class="admin-page registrar-producto-page">
  <div class="container">
    <h1> Agregar novedad </h1>

    <form action="registrar_novedad.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 col-md-3">

          <div class="input-group">
            <label> Imagen Principal </label>
            <input type="file" name="imagen" id="fileToUpload" accept="image/png, image/jpeg">
          </div>

        </div>

        <div class="col-12 col-md-9">

          <div class="row">
            <div class="col-12">
              <div class="input-group">
                <label> Titulo </label>
                <input type="text" name="titulo" >
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <label> Subtitulo </label>
                <input type="text" name="subtitulo" >
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <label> Descripcion </label>
                <textarea name="descripcion"></textarea>
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