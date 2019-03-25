<?php
  $page_title = "Registrar Slide";
  include('estructura/cabecera.php');

  $id = $_GET['id'];

  if($_POST!=NULL) {
    if( editar_slide($_POST, $id) === true ) {
      aviso("Se ha editado la slide.");
    }
    else {
      aviso("La slide no se pudo editar. Inténtalo de nuevo.");
    }
  }

  $info = get_single('slides_inicio', $id);

  $img = $info['imagen'];
  $frase = $info['frase'];
  $subtitulo = $info['subtitulo'];
  $boton = $info['boton'];
?>

<main class="admin-page editar-slide-page">
  <div class="container">
    <h1> Editar Slide </h1>

    <form action="editar_slide.php?id=<?php echo  $id ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 col-md-3">

          <div class="input-group">
            <label> Imagen </label>
            <img src="../<?php echo $img ?>" alt="">
            <input  type="file" name="imagen" accept="image/png, image/jpeg">
          </div>

        </div>

        <div class="col-12 col-md-9">

          <div class="row">

            <div class="col-12">
              <div class="input-group">
                <label> Frase </label>
                <input required type="text" name="frase" value="<?php echo $frase ?>">
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Subtítulo </label>
                <input required type="text" name="subtitulo" value="<?php echo $subtitulo ?>">
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Acción </label>
                <input required type="text" name="accion" value="<?php echo $boton ?>">
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