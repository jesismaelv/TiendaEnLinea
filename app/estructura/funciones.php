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

    $query = " SELECT correo FROM usuarios WHERE correo = '$correo' ";
    $result = $bd->query($query);
    if ($result->num_rows > 0) {
      return "correo_repetido";
    } else {
      $query = " INSERT INTO usuarios ( nombre, apellido, correo, contrasena, foto, tipo )
        VALUES ('$nombre', '$apellido', '$correo', '$contrasena', '$foto', 'cliente')";
      $result = $bd->query($query);
      return $result;
    }
    $bd->close();
  }


  function print_x($var, $die = false) {
    echo "<pre>";
      print_r($var);
    echo "</pre>";
    if($die) die();
  }
?>