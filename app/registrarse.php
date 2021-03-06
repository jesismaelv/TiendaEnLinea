<?php
  $page_title = "Registrarse";
  include('estructura/cabecera.php');

  if($_POST!=NULL) {
    if( registrar_usuario($_POST, false) === true ) {
      $str = "Ahora puedes intentar Iniciar sesión.";
      aviso($str);
    }
    else {
      aviso("Ha ocurrido un error, por favor inténtalo de nuevo.");
    }
  }

?>

<main class="admin-page">
  <div class="container">
    <h1> Registrarse </h1>

    <form action="registrarse.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 col-md-3">

          <div class="input-group">
            <label> Foto </label>
            <input  type="file" name="imagen" accept="image/png, image/jpeg">
          </div>

        </div>

        <div class="col-12 col-md-9">

          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Nombre </label>
                <input required type="text" name="nombre">
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

          </div>
          <div class="alinear-derecha">
            <button class="boton boton-important"> Registrarme </button>
          </div>
        </div>
      </div>
    </form>

  </div>
</main>

<?php
  include('estructura/pie.php');
?>