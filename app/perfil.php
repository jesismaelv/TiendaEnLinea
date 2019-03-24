<?php
  $page_title = "Perfil";
  include('estructura/cabecera.php');

  $id = $_SESSION['id'];

  if($_POST!=NULL) {
    if( editar_usuario($_POST, $id) === true ) {
      aviso("Se ha editado tu perfil.");
    }
    else {
      aviso("Tu perfil no se pudo actualizar. Inténtalo de nuevo.");
    }
  }

  $info = get_single('usuarios', $id);

  $img = $info['foto'];
  $nombre = $info['nombre'];
  $apellido = $info['apellido'];
  $correo = $info['correo'];

  if($_GET['eliminar_direccion'] == 'exito') {
    aviso('La direccion ha sido eliminada con éxito.');
  }

  if($_GET['eliminar_direccion'] == 'error') {
    aviso('La direccion no se pudo eliminar.');
  }
?>

<main class="admin-page pagina-editar-usuario">
  <div class="container">
    <h1> Editar perfil </h1>

    <form action="editar_usuario.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 col-md-3">

          <div class="input-group">
            <label> Foto </label>
            <img src="/<?php echo $img ?>">
            <input type="file" name="imagen" accept="image/png, image/jpeg">
          </div>

        </div>

        <div class="col-12 col-md-9">

          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Nombre </label>
                <input type="text" name="nombre" value="<?php echo $nombre ?>">
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Apellido </label>
                <input type="text" name="apellido" value="<?php echo $apellido ?>">
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Correo </label>
                <input type="text" name="correo" value="<?php echo $correo ?>" disabled>
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Contraseña </label>
                <input type="password" name="contrasena">
              </div>
            </div>

          </div>
          <div class="alinear-derecha">
            <button class="boton boton-important"> Guardar </button>
          </div>
        </div>
      </div>
    </form>
    <hr>
    <div class="row">
      <div class="col-12 col-md-6">
        <h1> Direcciones </h1>
      </div>
      <div class="col-12 col-md-6 alinear-derecha alinear-derecha--nosm">
        <a href="agregar_direccion.php" class="boton"> Agregar direccion </a>
      </div>

      <?php
        $direcciones = get_direcciones($_SESSION['id']);
        if ($direcciones->num_rows > 0) :
          while($direccion = $direcciones->fetch_assoc()) :
            $id_direccion = $direccion['id'];
            $nombre = $direccion['nombre'];
            $apellido = $direccion['apellido'];
            $correo = $direccion['correo'];
            $calle = $direccion['calle'];
            $colonia = $direccion['colonia'];
            $zip = $direccion['zip'];
      ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <a href="editar_direccion.php?id=<?php echo $id_direccion ?>" class="tarjeta-direccion">
                <h5><?php echo "$calle $colonia ($zip)" ?></h5>
                <p><?php echo "$nombre $apellido ($correo)" ?></p>
              </a>
            </div>
      <?php
          endwhile;
        endif;
      ?>
    </div>
  </div>

</main>

<?php
  include('estructura/pie.php');
?>