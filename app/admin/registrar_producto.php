<?php
  $page_title = "Registrar Producto";
  include('estructura/cabecera.php');

  if($_POST!=NULL) {
    if( registrar_producto($_POST) === true ) {
      aviso("Se ha registrado el producto.");
    }
    else {
      aviso("El producto no se pudo registrar. Inténtalo de nuevo.");
    }
  }
?>

<main class="admin-page">
  <div class="container">
    <h1> Agregar producto </h1>

    <form action="registrar_producto.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 col-md-3">

          <div class="input-group">
            <label> Imagen Principal </label>
            <input  type="file" name="imagen" id="fileToUpload" accept="image/png, image/jpeg">
          </div>

          <div class="input-group">
            <label> Galería </label>
              <input  type="file" name="imagenes[]" id="fileToUpload" accept="image/png, image/jpeg" multiple="multiple">
          </div>

        </div>

        <div class="col-12 col-md-9">

          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Nombre </label>
                <input required type="text" name="nombre" >
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Unidad </label>
                <input required type="text" name="unidad" >
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <label> Descripción </label>
                <textarea name="descripcion" ></textarea>
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Precio </label>
                <input required type="number" name="precio" >
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Existencia </label>
                <input required type="number" name="existencia" >
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