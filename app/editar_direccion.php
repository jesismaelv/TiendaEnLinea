<?php
  $page_title = "Agregar Direccion";
  include('estructura/cabecera.php');

  $id = $_GET['id'];

  if($_POST!=NULL) {
    if( editar_direccion($_POST, $_SESSION['id'], $id) === true ) {
      aviso("Se ha actualizado la dirección.");
    }
    else {
      aviso("La dirección no se pudo editar. Inténtalo de nuevo.");
    }
  }

  $info = get_direccion($id, $_SESSION['id']);

  $nombre = $info['nombre'];
  $apellido = $info['apellido'];
  $correo = $info['correo'];
  $calle = $info['calle'];
  $colonia = $info['colonia'];
  $zip = $info['zip'];
  $ciudad = $info['ciudad'];
  $estado  = $info['estado'];
  $notas = $info['notas'];
?>

<main class="agregar-direccion">
  <div class="container">

    <div class="row">
      <div class="col-12 col-md-6">
       <h1> Editar direccion </h1>
      </div>
      <div class="col-12 col-md-6 alinear-derecha alinear-derecha--nosm">
        <a href="eliminar_direccion.php?id=<?php echo $id ?>" class="boton"> Eliminar </a>
      </div>
    </div>

    <form action="editar_direccion.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
      <div class="row">

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Nombre </label>
            <input type="text" name="nombre" value="<?php echo $nombre ?>">
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Apellido </label>
            <input type="text" name="apellido" value="<?php echo $apellido ?>">
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Correo </label>
            <input type="text" name="correo" value="<?php echo $correo ?>">
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Calle </label>
            <input type="text" name="calle" value="<?php echo $calle ?>">
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Colonia </label>
            <input type="text" name="colonia" value="<?php echo $colonia ?>">
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> ZIP </label>
            <input type="number" name="zip" value="<?php echo $zip ?>">
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Ciudad </label>
            <input type="text" name="ciudad" value="<?php echo $ciudad ?>">
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="input-group">
            <label> Estado </label>
            <input type="text" name="estado" value="<?php echo $estado ?>">
          </div>
        </div>

        <div class="col-12">
          <div class="input-group">
            <label> Notas </label>
            <textarea name="notas"><?php echo $notas ?></textarea>
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