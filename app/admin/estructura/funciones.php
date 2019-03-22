<?php
  // Ejemplo de consulta
  // $sql = "SELECT * FROM usuarios";
  // $result = $db->query($sql);

  // CONECCION CON LA BASE DE DATOS



  if (mysqli_connect_errno()) {
    echo "No se pudo conectar con la base de datos: " . mysqli_connect_error();
  }

  function registrar_usuario($args) {
    $bd = mysqli_connect("db","root","root", "main");
    $nombre = $args['nombre'];
    $apellido = $args['apellido'];
    $correo = $args['correo'];
    $contrasena = md5($args['contrasena']);
    $foto = $args['foto'];



    $query = "SELECT correo FROM usuarios WHERE correo = $correo";
    $result = $bd->query($query);
    print_x($result);
    if ($result->num_rows > 0) {
      return 'correo_utilizado';
    } else {
      $query = "INSERT INTO usuarios ( nombre, apellido, correo, contrasena, foto, tipo )
        VALUES ('$nombre', '$apellido', '$correo', '$contrasena', '$foto', 'cliente')";
      $result = $bd->query($query);
      return $result;
    }
    $bd->close();
  }

  function registrar_producto($data) {
    $bd = mysqli_connect("db","root","root", "main");
    $nombre = $data['nombre'];
    $unidad = $data['unidad'];
    $descripcion = $data['descripcion'];
    $precio = $data['precio'];
    $existencia = $data['existencia'];

    $query = "INSERT INTO producto ( nombre, unidad, descripcion, precio, existencia )
      VALUES ( '$nombre', '$unidad', '$descrpcion', '$precio', '$existencia' )";
    $result = $bd->query($query);

    $id = $bd->insert_id;
    if( $_FILES['imagen']["tmp_name"] != "" ) {
      $index = 'imagen';
      $nombre = 'principal';
      $camino = "../img/productos/" . $id . "/";
      $status = subir_imagen($index, $nombre, $camino);
      if( $status['exito'] ) {
        $camino = $status['camino'];
        $camino = str_replace( '../', '', $camino);
        $query = "UPDATE producto SET imagen = '$camino' WHERE id = '$id'";
        $error['imagen'] = $bd->query($query);
      }
      else {
        $error['imagen'] = 'No se pudo subir la imagen.';
      }
    }

    if( $_FILES['imagenes']["tmp_name"][0] != "" ) {
      $index = 'imagen';
      $nombre = 'galeria';
      $camino = "../img/productos/" . $id . "/";

      for($i=0; $i<count($_FILES['imagenes']['name']); $i++) {
          $tmpFilePath = $_FILES['imagenes']['tmp_name'][$i];
          if($tmpFilePath != ""){
            $nombre = $nombre + $i;
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
          }
      }
    }


    $bd->close();

    return $result;
  }

  function registrar_novedad($data) {
    $bd = mysqli_connect("db","root","root", "main");
    $titulo = $data['titulo'];
    $subtitulo = $data['subtitulo'];
    $descripcion = $data['descripcion'];

    $query = "INSERT INTO novedades ( titulo, subtitulo, descripcion)
      VALUES ( '$titulo', '$subtitulo', '$descripcion')";
    $result = $bd->query($query);

    $id = $bd->insert_id;
    if( $_FILES['imagen']["tmp_name"] != "" ) {
      $index = 'imagen';
      $nombre = 'principal';
      $camino = "../img/novedades/" . $id . "/";
      $status = subir_imagen($index, $nombre, $camino);
      if( $status['exito'] ) {
        $camino = $status['camino'];
        $camino = str_replace( '../', '', $camino);
        $query = "UPDATE novedades SET imagen = '$camino' WHERE id = '$id'";
        $error['imagen'] = $bd->query($query);
      }
      else {
        $error['imagen'] = 'No se pudo subir la imagen.';
      }
    }

    $bd->close();

    return $result;
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

  function aviso( $str ){
		include "aviso.php";
  }

  function print_x($var, $die = false) {
    echo "<pre>";
      print_r($var);
    echo "</pre>";
    if($die) die();
  }
?>