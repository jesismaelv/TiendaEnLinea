<?php 
  include ('funciones.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="shortcut icon" href="img/favicon.png" />

  <title> TrannyFrut • <?php echo @$page_title; ?> </title>
</head>
<body>
<?php
$items_carrito_cabecera = json_decode($_SESSION['carrito']);
$tiene_productos_cabecera = false;
$c = 0;
foreach($items_carrito_cabecera as $item) {
  if($item > 0) { $tiene_productos_cabecera = true; $c++; }
}
$num_productos = 0;
if( $tiene_productos_cabecera ) {
  $num_productos = $c;
}

?>
  <header class="header-principal">
    <nav class="nav-principal">
      <div class="container contenedor-principal">
        <a href="/" class="logo">
          <img src="img/logo.svg">
        </a>
        <button class="menu-btn-movil" data-toggle='activo'></button>
        <div class="menu-movil">
          <div class="menu__links">
            <a href="/" class="menu__link">Inicio</a>
            <a href="/tienda.php" class="menu__link">Tienda</a>
            <?php if($_SESSION['tipo'] == 'admin' ) : ?>
              <a href="/admin/" class="menu__link"> Admin </a>
            <?php endif; ?>
            <?php
              if($_SESSION['foto']) {
                $img = '../'.$_SESSION['foto'];
                $img = "style='background-image:url($img)'";
                $url = "perfil.php";
              }
              else {
                $img = "";
                $url = "login.php";
              }
            ?>
            <a href="<?php echo $url ?>" <?php echo $img ?> class="menu__link--cuenta">Cuenta</a>
            <a href="carrito.php" class="menu__link--carrito">Carrito <?php echo ($num_productos > 0) ? "<span>$num_productos</span>" : ""; ?></a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="menu-spacer"></div>
