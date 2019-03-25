<?php 
  include ('funciones.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/estilos.css">
  <link rel="shortcut icon" href="../img/favicon.png" />

  <title> TF Admin • <?php echo @$page_title; ?> </title>
</head>
<body>

<header class="header-principal">
    <nav class="nav-principal">
      <div class="container contenedor-principal">
        <a href="index.php" class="logo">
          <img src="../img/logo.svg">
        </a>
        <button class="menu-btn-movil" data-toggle='activo'></button>
        <div class="menu-movil">
          <div class="menu__links">
            <a href="/admin/productos.php" class="menu__link">Productos</a>
            <a href="/admin/novedades.php" class="menu__link">Novedades</a>
            <a href="/admin/usuarios.php" class="menu__link"> Clientes </a>
            <a href="/admin/galeria.php" class="menu__link">Galeria</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="menu-spacer"></div>

