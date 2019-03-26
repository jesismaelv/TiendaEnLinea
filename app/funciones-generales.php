<?php
session_start();
date_default_timezone_set("America/Tijuana");
$carrito = json_decode($_SESSION['carrito']);
if(sizeof($carrito) == 0) {
  $_SESSION['carrito'] = "{}";
}

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

  function registrar_usuario($args, $es_admin = false) {
    $bd = mysqli_connect("db","root","root", "main");
    $nombre = $args['nombre'];
    $apellido = $args['apellido'];
    $correo = $args['correo'];
    $contrasena = md5($args['contrasena']);
    if( $args['tipo'] != '' && $_SESSION['tipo'] == 'admin' ) {
      $tipo = $args['tipo'];
    }
    else {
      $tipo = 'cliente';
    }

    $carrito = json_decode($_SESSION['carrito']);

    if(!$es_admin && sizeof($carrito) > 0) {
      $carrito = $_SESSION['carrito'];
    }
    else {
      $carrito = "{}";
    }

    $query = "SELECT correo FROM usuarios WHERE correo = '$correo'";
    $result = $bd->query($query);
    if ($result->num_rows > 0) {
      $bd->close();
      return false;
    } else {
      $query = "INSERT INTO usuarios ( nombre, apellido, correo, contrasena, foto, tipo, carrito )
        VALUES ('$nombre', '$apellido', '$correo', '$contrasena', '$foto', '$tipo', '$carrito')";
      $result = $bd->query($query);

      $id = $bd->insert_id;
      if( $_FILES['imagen']["tmp_name"] != "" ) {
        $index = 'imagen';
        $nombre = 'perfil';
        if($es_admin) {
          $camino = "../img/usuarios/" . $id . "/";
        }
        else {
          $camino = "img/usuarios/" . $id . "/";
        }
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

  function editar_usuario($args, $id, $es_admin = false) {
    $bd = mysqli_connect("db","root","root", "main");
    $nombre = $args['nombre'];
    $apellido = $args['apellido'];
    if( $args['tipo'] != '' && $_SESSION['tipo'] == 'admin' ) {
      $tipo = $args['tipo'];
      $tipo_query = ", tipo = '$tipo' ";
    }
    else {
      $tipo = 'cliente';
      $tipo_query = "";
    }

    if( $args['contrasena'] != '') {
      $contrasena = md5($args['contrasena']);
      $contrasena_sql = ", contrasena = '$contrasena'";
    }
    else {
      $contrasena_sql = "";
    }

    $query = "UPDATE usuarios
              SET nombre = '$nombre', apellido = '$apellido'$contrasena_sql$tipo_query
              WHERE id = '$id'";
    $result = $bd->query($query);

    if( $_FILES['imagen']["tmp_name"] != "" ) {
      $index = 'imagen';
      $nombre = 'perfil';
      if($es_admin) {
        $camino = "../img/usuarios/" . $id . "/";
      }
      else {
        $camino = "img/usuarios/" . $id . "/";
      }
      $status = subir_imagen($index, $nombre, $camino);
      if( $status['exito'] ) {
        $camino = $status['camino'];
        $camino = str_replace( '../', '', $camino);

        if(!$es_admin) $_SESSION['foto'] = $camino;

        $query = "UPDATE usuarios SET foto = '$camino' WHERE id = '$id'";
        $error['imagen'] = $bd->query($query);
      }
      else {
        $error['imagen'] = 'No se pudo subir la imagen.';
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

  function buscar_productos( $s ){
    $bd = mysqli_connect("db","root","root", "main");
    $sql = "SELECT * FROM producto WHERE nombre LIKE '%$s%'";
    $result = $bd->query($sql);
    $bd->close();
    return $result;
  }

  function get_mas_productos(){
    $bd = mysqli_connect("db","root","root", "main");
    $sql = "SELECT * FROM producto ORDER BY RAND() LIMIT 4";
    $result = $bd->query($sql);
    $bd->close();
    return $result;
  }

  function productos_recientes($cant) {
    $bd = mysqli_connect("db","root","root", "main");
    $sql = "SELECT * FROM producto ORDER BY fecha_creacion LIMIT $cant";
    $result = $bd->query($sql);
    $bd->close();
    return $result;
  }

  function get_single( $tipo, $id ){
    $bd = mysqli_connect("db","root","root", "main");
    $sql = "SELECT * FROM $tipo WHERE id = '$id'";
    $result = $bd->query($sql);
    if ($result->num_rows > 0) :
      while($row = $result->fetch_assoc()) :
        $res = $row;
      endwhile;
    else :
      $res = false;
    endif;
    $bd->close();
    return $res;
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

  function actualizar_orden($data, $id_usuario, $es_admin = false) {
    $bd = mysqli_connect("db","root","root", "main");

    $id = $data['id'];
    $estado = $data['estado'];

    if($es_admin) {
      $query = "UPDATE orden
                SET estado = '$estado'
                WHERE id = '$id'";
    }
    else {
      $query = "UPDATE orden
                SET estado = '$estado'
                WHERE id = '$id' AND id_usuario = '$id_usuario'";
    }
    $result = $bd->query($query);

    $bd->close();
    return $result;
  }

  function print_x($var, $die = false) {
    echo "<pre>";
      print_r($var);
    echo "</pre>";
    if($die) die();
  }
?>