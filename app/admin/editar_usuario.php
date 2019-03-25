<?php
  $page_title = "Editar Usuario";
  include('estructura/cabecera.php');

  $id = $_GET['id'];

  if($_POST!=NULL) {
    if( editar_usuario($_POST, $id, true) === true ) {
      aviso("Se ha editado el usuario.");
    }
    else {
      aviso("El usuario no se pudo editar. Inténtalo de nuevo.");
    }
  }

  $info = get_single('usuarios', $id);

  $img = $info['foto'];
  $nombre = $info['nombre'];
  $apellido = $info['apellido'];
  $correo = $info['correo'];
  $tipo = $info['tipo'];
?>

<main class="admin-page pagina-editar-usuario">
  <div class="container">
    <h1> Editar usuario </h1>

    <form action="editar_usuario.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 col-md-3">

          <div class="input-group">
            <label> Foto </label>
            <img src="../<?php echo $img ?>">
            <input required type="file" name="imagen" accept="image/png, image/jpeg">
          </div>

        </div>

        <div class="col-12 col-md-9">

          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Nombre </label>
                <input required type="text" name="nombre" value="<?php echo $nombre ?>">
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Apellido </label>
                <input required type="text" name="apellido" value="<?php echo $apellido ?>">
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Correo </label>
                <input required type="text" name="correo" value="<?php echo $correo ?>" disabled>
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Contraseña </label>
                <input required type="password" name="contrasena">
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Tipo </label>
                <select name="tipo">
                  <option value="cliente" <?php if($tipo == 'cliente') echo selected; ?>> Cliente </option>
                  <option value="admin" <?php if($tipo == 'admin') echo selected; ?>> Administrador </option>
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