<?php
  $page_title = "Agregar Direccion";
  include('estructura/cabecera.php');

  if($_POST!=NULL) {
    if( agregar_direccion($_POST, $_SESSION['id']) === true ) {
      aviso("Se ha registrado la direccion.");
    }
    else {
      aviso("La direccion no se pudo registrar. Inténtalo de nuevo.");
    }
  }
?>

<main class="agregar-direccion">
  <div class="container">
    <h1> Agregar direccion </h1>

    <form action="agregar_direccion.php" method="post" enctype="multipart/form-data">
      <div class="row">

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Nombre </label>
            <input type="text" name="nombre" >
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Apellido </label>
            <input type="text" name="apellido" >
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Correo </label>
            <input type="text" name="correo" >
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Calle </label>
            <input type="text" name="calle" >
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Colonia </label>
            <input type="text" name="colonia" >
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> ZIP </label>
            <input type="number" name="zip" >
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Ciudad </label>
            <input type="text" name="ciudad" >
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Estado </label>
            <input type="text" name="estado" >
          </div>
        </div>

        <div class="col-12">
          <div class="input-group">
            <label> Notas </label>
            <textarea name="notas"></textarea>
          </div>
        </div>

      <div class="alinear-derecha">
        <button class="boton boton-important"> Guardar </button>
      </div>
    </form>

  </div>
</main>

<?php
  include('estructura/pie.php');
?>