<?php
  include('estructura/funciones.php');
  $tipo = $_GET['s'];
  $id = $_GET['id'];

  $url = "/admin/?eliminar=";
  switch($tipo) {
    case 'producto' :
      $url = "/admin/productos.php?eliminar=";
      break;
    case 'novedades' :
      $url = "/admin/novedades.php?eliminar=";
      break;
    case 'usuarios' :
      $url = "/admin/usuarios.php?eliminar=";
      break;
    case 'slides_inicio' :
      $url = "/admin/galeria.php?eliminar=";
      break;
  }


  if ( eliminar($tipo, $id) ) {
    header('Location: '.$url."exito");
  }
  else {
    header('Location: '.$url."error");
  }


?>