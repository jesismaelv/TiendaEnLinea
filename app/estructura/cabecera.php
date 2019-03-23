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
            <a href="/login.php" class="menu__link--cuenta">Cuenta</a>
            <a href="#" class="menu__link--carrito">Carrito</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="menu-spacer"></div>
