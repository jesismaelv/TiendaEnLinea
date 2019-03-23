<?php
  // Ejemplo de consulta
  // $sql = "SELECT * FROM usuarios";
  // $result = $db->query($sql);

  // CONECCION CON LA BASE DE DATOS

  include ("../funciones-generales.php");

  if (mysqli_connect_errno()) {
    echo "No se pudo conectar con la base de datos: " . mysqli_connect_error();
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
      $camino = "../img/producto/" . $id . "/";
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
      $dir = "../img/producto/" . $id . "/";

      for($i=0; $i<count($_FILES['imagenes']['name']); $i++) {
        $tmpFilePath = $_FILES['imagenes']['tmp_name'][$i];
        if($tmpFilePath != ""){
          $name = basename($_FILES['imagenes']["name"][$i]);
          $tipo = strtolower(pathinfo($name,PATHINFO_EXTENSION));
          if (!is_dir($dir)) {
            mkdir($dir);
          }
          $camino = $dir . $nombre . $i . "." . $tipo;
          if ( move_uploaded_file( $tmpFilePath, $camino ) ) {
            $galeria[$i] = str_replace('../','',$camino);
          }
        }
      }
      $galeria = json_encode($galeria);
      $query = "UPDATE producto SET imagenes = '$galeria' WHERE id = '$id'";
      $error['imagenes'] = $bd->query($query);
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

  function registrar_slide($data) {
    $bd = mysqli_connect("db","root","root", "main");
    $frase = $data['frase'];
    $subtitulo = $data['subtitulo'];
    $accion = $data['accion'];

    $query = "INSERT INTO slides_inicio ( frase, subtitulo, boton)
      VALUES ( '$frase', '$subtitulo', '$accion')";
    $result = $bd->query($query);

    $id = $bd->insert_id;
    if( $_FILES['imagen']["tmp_name"] != "" ) {
      $index = 'imagen';
      $nombre = 'principal';
      $camino = "../img/slides_inicio/" . $id . "/";
      $status = subir_imagen($index, $nombre, $camino);
      if( $status['exito'] ) {
        $camino = $status['camino'];
        $camino = str_replace( '../', '', $camino);
        $query = "UPDATE slides_inicio SET imagen = '$camino' WHERE id = '$id'";
        $error['imagen'] = $bd->query($query);
      }
      else {
        $error['imagen'] = 'No se pudo subir la imagen.';
      }
    }

    $bd->close();

    return $result;
  }

  function eliminar($tipo, $id) {
    $bd = mysqli_connect("db","root","root", "main");
    $sql = "DELETE FROM $tipo WHERE id = '$id'";
    $result = $bd->query($sql);
    $bd->close();

    $path = "../img/$tipo/$id/";

    delete_files($path);
    return $result;
  }

  function delete_files($target) {
    if(is_dir($target)){
        $files = glob( $target . '*', GLOB_MARK );
        foreach( $files as $file ){
            delete_files( $file );
        }
        rmdir( $target );
    } elseif(is_file($target)) {
        unlink( $target );
    }
  }
?>