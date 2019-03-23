<?php 
  include ('funciones.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/estilos.css">

  <title> TF Admin • <?php echo @$page_title; ?> </title>
</head>
<body>

<header class="header-principal">
    <nav class="nav-principal">
      <div class="container contenedor-principal">
        <a href="#" class="logo">
          Logo
        </a>
        <button class="menu-btn-movil"></button>
        <div class="menu-movil">
          <div class="menu__links">
            <a href="/admin/productos.php" class="menu__link">Productos</a>
            <a href="/admin/novedades.php" class="menu__link">Novedades</a>
            <a href="/admin/usuarios.php" class="menu__link"> Clientes </a>
            <a href="/admin/ordenes.php" class="menu__link"> Ordenes </a>
            <a href="/admin/galeria.php" class="menu__link">Galeria</a>
            <a href="/cerrar-sesion.php" class="menu__link">Cerrar Sesion</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="menu-spacer"></div>

