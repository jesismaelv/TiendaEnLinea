<?php
  $page_title = "Iniciar Sesión";
  include('estructura/cabecera.php');

  if($_POST['correo'] != "") {
    $sesion = iniciar_sesion($_POST);
    if( $sesion['id'] > 0 ) {
      $_SESSION = $sesion;
      $url = "http://localhost/?welcome=true";
      echo '<meta http-equiv="refresh" content="0; URL=' . $url . '" />';
    }
    else {
      aviso("Ha ocurrido un error, por favor inténtalo de nuevo.");
    }
  }

?>

<main class="login-page">
  <div class="container">
    <h1 class="centrado"> Iniciar Sesión </h1>

    <form action="login.php" method="post" enctype="multipart/form-data">



          <div class="input-group">
            <label> Correo </label>
            <input required type="text" name="correo" >
          </div>

          <div class="input-group">
            <label> Contraseña </label>
            <input required type="password" name="contrasena" >
          </div>

          <div>
            <a href="registrarse.php" class="boton"> Registrarse </a>
            <button class="boton boton-important"> Entrar </button>
          </div>

    </form>

  </div>
</main>

<?php
  include('estructura/pie.php');
?>