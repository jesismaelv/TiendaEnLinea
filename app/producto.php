<?php
  $page_title = "Producto";
  include('estructura/cabecera.php');

  $id = $_GET['id'];
  $data = get_single('producto', $id);
  $nombre = $data['nombre'];
  $unidad = $data['unidad'];
  $descripcion = $data['descripcion'];
  $precio = $data['precio'];
  $existencia = $data['existencia'];
  $imagen = $data['imagen'];
  $galeria = json_decode($data['imagenes']);
  if($galeria[0] == '') {
    $galeria = [];
  }

  if( $_POST['cantidad'] > 0 ) {
    if(agregar_producto($_POST['cantidad'], $id, $_SESSION['id']) === true ) {
      echo aviso("El producto ha sido agregado al carrito");
    }
    else {
      echo aviso("Hubo un error al agregarlo al carrito. Por favor intentalo de nuevo.");
    }
  }
  ?>

<main class="single-product-page">
  <div class="container">
    <div class="row">
      <?php if( !$_SESSION['id'] > 0) : ?>
        <div class="col-12">
          <div class="advertencia"> 
          <p> Si tienes cuenta <a class='link' href="login.php"> Inicia sesión </a> perro! Lo que guardes en el carrito no se mostrará en tu cuenta. </a>
              <p> Si no tienes cuenta tu carrito se guardará al <a class='link' href="registrarse.php"> hacer una.  </a> </p>
          </div>
        </div>
      <?php endif; ?>
      <div class="col-12 col-md-6 col-lg-4 galeria-producto">
        <?php
          $slides = $galeria;
          array_unshift($slides, $imagen);
          include("galeria.php");
        ?>
      </div>
      <div class="col-12 col-md-6 col-lg-8">
        <h1><?php echo $nombre ?></h1>

        <p class="detalles">
          <span class="precio"><?php echo "$$precio por $unidad" ?></span> • 
          <span class="existencia">Quedan <?php echo $existencia ?></span>
        </p>

        <p class="descripcion"><?php echo $descripcion; ?></p>
        <form action="producto.php?id=<?php echo $id ?>" method="post">
          <div class="agregar-al-carrito">
            <div class="contenido">
              <input required class="cantidad" name="cantidad" type="number" value="1" min="1" max="<?php echo $existencia ?>">
              <button class="boton boton-important"> Agregar </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row productos-relacionados">
      <div class="col-12">
        <h1> Otros productos </h1>
      </div>
      <?php
          $result = get_mas_productos();
          if ($result->num_rows > 0) :
            while($producto = $result->fetch_assoc()) :
              $precio = $producto['precio'];
              $unidad = $producto['unidad'];
        ?>
          <div class="col-12 col-sm-6 col-lg-3">
            <?php include('tarjeta-producto.php') ?>
          </div>
        <?php
            endwhile;
          else :
        ?>
        <div class="col-12">
          <div class="no-resultados">
            No existen productos
          </div>
        </div>
        <?php
          endif;
        ?>
    </div>
  </div>
</main>

<?php
  include('estructura/pie.php');
?>