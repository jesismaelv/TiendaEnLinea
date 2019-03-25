<?php
  $page_title = "Registrar Usuario";
  include('estructura/cabecera.php');

  if($_POST!=NULL) {
    if( registrar_usuario($_POST, true) === true ) {
      aviso("Se ha registrado el usuario.");
    }
    else {
      aviso("El usuario no se pudo registrar. Inténtalo de nuevo.");
    }
  }

?>

<main class="admin-page registrar-producto-page">
  <div class="container">
    <h1> Agregar usuario </h1>

    <form action="registrar_usuario.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 col-md-3">

          <div class="input-group">
            <label> Foto </label>
            <input required type="file" name="imagen" accept="image/png, image/jpeg">
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
                <label> Apellido </label>
                <input required type="text" name="apellido" >
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Correo </label>
                <input required type="text" name="correo" >
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Contraseña </label>
                <input required type="password" name="contrasena" >
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Tipo </label>
                <select name="tipo">
                  <option value="cliente"> Cliente </option>
                  <option value="admin"> Administrador </option>
                </select>
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