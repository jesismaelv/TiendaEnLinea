<?php
  $page_title = "Editar Novedad";
  include('estructura/cabecera.php');

  $id = $_GET['id'];

  if($_POST!=NULL) {
    if( editar_novedad($_POST, $id) === true ) {
      aviso("Se ha editado la novedad.");
    }
    else {
      aviso("La novedad no se pudo editar. Inténtalo de nuevo.");
    }
  }

  $info = get_single('novedades', $id);

  $img = $info['imagen'];
  $titulo = $info['titulo'];
  $subtitulo = $info['subtitulo'];
  $descripcion = $info['descripcion'];

?>

<main class="admin-page">
  <div class="container">
    <h1> Editar novedad </h1>

    <form action="editar_novedad.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 col-md-3">

          <div class="input-group">
            <label> Imagen Principal </label>
            <img src="../<?php echo $img ?>">
            <input  type="file" name="imagen" accept="image/png, image/jpeg">
          </div>

        </div>

        <div class="col-12 col-md-9">

          <div class="row">
            <div class="col-12">
              <div class="input-group">
                <label> Titulo </label>
                <input required type="text" name="titulo" value="<?php echo $titulo; ?>" >
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <label> Subtitulo </label>
                <input required type="text" name="subtitulo" value="<?php echo $subtitulo; ?>">
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <label> Descripcion </label>
                <textarea name="descripcion"><?php echo $descripcion; ?></textarea>
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