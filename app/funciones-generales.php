<?php
session_start();

  function iniciar_sesion($args) {
    $bd = mysqli_connect("db","root","root", "main");

    $correo = $args['correo'];
    $contrasena = md5($args['contrasena']);
    $query = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $result = $bd->query($query);

      if ($result->num_rows > 0) :
        while($row = $result->fetch_assoc()) :
          return $row;
        endwhile;
      else :
        return false;
      endif;
    $bd->close();
  }

  function registrar_usuario($args) {
    $bd = mysqli_connect("db","root","root", "main");
    $nombre = $args['nombre'];
    $apellido = $args['apellido'];
    $correo = $args['correo'];
    $contrasena = md5($args['contrasena']);
    if( $args['tipo'] != '' ) {
      $tipo = $args['tipo'];
    }
    else {
      $tipo = 'cliente';
    }

    $query = "SELECT correo FROM usuarios WHERE correo = '$correo'";
    $result = $bd->query($query);
    if ($result->num_rows > 0) {
      $bd->close();
      return false;
    } else {
      $query = "INSERT INTO usuarios ( nombre, apellido, correo, contrasena, foto, tipo )
        VALUES ('$nombre', '$apellido', '$correo', '$contrasena', '$foto', '$tipo')";
      $result = $bd->query($query);

      $id = $bd->insert_id;
      if( $_FILES['imagen']["tmp_name"] != "" ) {
        $index = 'imagen';
        $nombre = 'perfil';
        $camino = "../img/usuarios/" . $id . "/";
        $status = subir_imagen($index, $nombre, $camino);
        if( $status['exito'] ) {
          $camino = $status['camino'];
          $camino = str_replace( '../', '', $camino);
          $query = "UPDATE usuarios SET foto = '$camino' WHERE id = '$id'";
          $error['imagen'] = $bd->query($query);
        }
        else {
          $error['imagen'] = 'No se pudo subir la imagen.';
        }
      }
      $bd->close();
      return $result;
    }
  }

  function get_archivo( $tipo ){
    $bd = mysqli_connect("db","root","root", "main");
    $sql = "SELECT * FROM $tipo";
    $result = $bd->query($sql);
    $bd->close();
    return $result;
  }

  function aviso( $str ){
		include "aviso.php";
  }

  function subir_imagen($index, $nombre, $camino) {
    $name = basename($_FILES[$index]["name"]);
    $tipo = strtolower(pathinfo($name,PATHINFO_EXTENSION));
    if (!is_dir($camino)) {
      mkdir($camino);
    }
    $camino = $camino . $nombre . "." . $tipo;
    if ( move_uploaded_file($_FILES[$index]["tmp_name"], $camino ) ) {
      $status['exito'] = true;
      $status['camino'] = $camino;
    }
    else {
      $status['exito'] = false;
    }
    return $status;
  }

  function print_x($var, $die = false) {
    echo "<pre>";
      print_r($var);
    echo "</pre>";
    if($die) die();
  }
?>