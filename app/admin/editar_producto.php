<?php
  $page_title = "Registrar Producto";
  include('estructura/cabecera.php');

  $id = $_GET['id'];

  if($_POST!=NULL) {
    if( editar_producto($_POST, $id) === true ) {
      aviso("Se ha editado el producto.");
    }
    else {
      aviso("El producto no se pudo editar. Inténtalo de nuevo.");
    }
  }

  $info = get_single('producto', $id);

  $img = $info['imagen'];
  $galeria = json_decode($info['imagenes']);
  if(sizeof($galeria) == 0) {
    $galeria = [];
  }
  $nombre = $info['nombre'];
  $unidad = $info['unidad'];
  $descripcion = $info['descripcion'];
  $precio = $info['precio'];
  $existencia = $info['existencia'];

?>

<main class="admin-page registrar-producto-page">
  <div class="container">
    <h1> Editar producto </h1>
    <form action="editar_producto.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 col-md-3">

          <div class="input-group">
            <label> Imagen Principal </label>
            <img src="../<?php echo $img ?>" alt="">
            <input required type="file" name="imagen" id="fileToUpload" accept="image/png, image/jpeg">
          </div>

          <div class="input-group">
            <label> Galería </label>
              <?php
                foreach($galeria as $slide) :
              ?>
                <img src="../<?php echo $slide; ?>" alt="">
              <?php
                endforeach;
              ?>
              <input required type="file" name="imagenes[]" id="fileToUpload" accept="image/png, image/jpeg" multiple="multiple">
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
                <label> Unidad </label>
                <input required type="text" name="unidad" value="<?php echo $unidad ?>">
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <label> Descripción </label>
                <textarea name="descripcion" ><?php echo $descripcion ?></textarea>
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Precio </label>
                <input required type="number" name="precio" value="<?php echo $precio ?>">
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="input-group">
                <label> Existencia </label>
                <input required type="number" name="existencia" value="<?php echo $existencia ?>">
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