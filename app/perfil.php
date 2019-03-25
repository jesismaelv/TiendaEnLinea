<?php
  $page_title = "Perfil";
  include('estructura/cabecera.php');

  $id = $_SESSION['id'];

  if($_POST!=NULL) {
    if( editar_usuario($_POST, $id, false) === true ) {
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
    <div class="row">
      <div class="col-12 col-md-6">
        <h1> Editar perfil </h1>
      </div>
      <div class="col-12 col-md-6 alinear-derecha alinear-derecha--nosm">
        <a href="cerrar-sesion.php" class="boton">Cerrar sesión</a>
      </div>
    </div>

    <form action="perfil.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 col-md-3">

          <div class="input-group">
            <label> Foto </label>
            <img src="/<?php echo $img ?>">
            <input  type="file" name="imagen" accept="image/png, image/jpeg">
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
        <h2> Direcciones </h2>
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
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 tarjeta-direccion__wrapper">
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

    <hr>
    <div class="row">
      <div class="col-12">
        <h2> Órdenes </h2>
      </div>

      <?php
        $ordenes = get_ordenes($_SESSION['id']);
        if ($ordenes->num_rows > 0) :
          while($orden = $ordenes->fetch_assoc()) :
            $total = $orden['total'];
            $id_orden = $orden['id'];
            $status = $orden['estado'];
            $fecha = date('d/M/Y',time($orden['fecha']));

      ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 tarjeta-orden__wrapper">
              <a href="orden.php?id=<?php echo $id_orden ?>" class="tarjeta-orden">
                <h3><?php echo "Orden: #$id_orden"; ?></h3>
                <span class="total">$<?php echo number_format($total); ?> • <?php echo $fecha; ?> </span>
                <p><?php echo $status; ?></p>
              </a>
            </div>
      <?php
          endwhile;
        else:
      ?>
        <div class="col-12">
          <div class="no-resultados"> No haz hecho ninguna orden todavía. </div>
        </div>
      <?php;
        endif;
      ?>
    </div>


  </div>

</main>

<?php
  include('estructura/pie.php');
?>