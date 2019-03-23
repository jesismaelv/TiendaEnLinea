<?php
  $page_title = "Inicio";
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
            <input type="file" name="fileToUpload" id="fileToUpload">
          </div>

          <div class="input-group">
            <label> Galería </label>
            <div class="input-galeria-producto">
              <input type="file" name="fileToUpload" id="fileToUpload">
              <button type="button" data-agregar-imagen> Agregar más </button>
            </div>
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

        </div>
      </div>
    </form>

  </div>
</main>

<?php
  include('estructura/pie.php');
?>