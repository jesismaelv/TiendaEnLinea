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

  <title> TrannyFrut • <?php echo @$page_title; ?> </title>
</head>
<body>

  <header class="header-principal">
    <nav class="nav-principal">
      <div class="container contenedor-principal">
        <div class="logo">
          Logo
        </div>
        <button class="menu-btn-movil"></button>
        <div class="menu-movil">
          <div class="menu__links">
            <a href="#" class="menu__link">Inicio</a>
            <a href="#" class="menu__link">Tienda</a>
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
            <a href="#" class="menu__link--carrito">Carrito</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="menu-spacer"></div>
