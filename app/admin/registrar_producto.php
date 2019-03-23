<?php
  $page_title = "Registrar Producto";
  include('estructura/cabecera.php');
?>

<main class="admin-page registrar-producto-page">
  <div class="container">
    <h1> Agregar producto </h1>

    <form action="registrar_producto.php">
      <div class="row">
        <div class="col-12 col-md-3">

          <div class="input-group">
            <label> Imagen Principal </label>
            <input type="file" name="imagen" id="fileToUpload">
          </div>

          <div class="input-group">
            <label> Galería </label>
            <div class="input-galeria" id="galeriaProducto">
              <input type="file" name="imagenes[]" id="fileToUpload">
            </div>
            <button class="boton boton-wide" type="button" data-agregar-imagen='galeriaProducto'> + Agregar más </button>
          </div>

        </div>

        <div class="col-12 col-md-9">
          
          <div class="input-group">
            <label> Nombre </label>
            <input type="text" name="nombre">
          </div>

          <div class="input-group">
            <label> Descripción </label>
            <textarea name="descripcion"></textarea>
          </div>

          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Precio </label>
                <input type="number" name="price">
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Existencia </label>
                <input type="number" name="price">
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