<?php
  session_start();
  $id = $_GET['id'];
  $bd = mysqli_connect("db","root","root", "main");
  $id_usuario = $_SESSION['id'];
  $sql = "DELETE FROM direccion WHERE id = '$id' AND id_usuario = '$id_usuario'";
  $result = $bd->query($sql);

  if($result) {
    $status = 'exito';
  }
  else {
    $status = 'error';
  }

  $bd->close();
  header('Location: perfil.php?eliminar_direccion=' . $status);
?>