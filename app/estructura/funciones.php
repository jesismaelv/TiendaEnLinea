<?php
  include ("funciones-generales.php");

  function agregar_direccion($data, $id_usuario) {
    $bd = mysqli_connect("db","root","root", "main");

    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $correo = $data['correo'];
    $calle = $data['calle'];
    $colonia = $data['colornia'];
    $zip = $data['zip'];
    $ciudad = $data['ciudad'];
    $estado  = $data['estado'];
    $notas = $data['notas'];

    $query = "INSERT INTO direccion ( id_usuario, nombre, apellido, correo, calle, colonia, zip, ciudad, estado, notas )
      VALUES ( '$id_usuario', '$nombre', '$apellido', '$correo', '$calle', '$colonia', '$zip', '$ciudad', '$estado', '$notas' )";
    $result = $bd->query($query);
    $bd->close();
    return $result;
  }

  function editar_direccion($data, $id_usuario, $id) {
    $bd = mysqli_connect("db","root","root", "main");

    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $correo = $data['correo'];
    $calle = $data['calle'];
    $colonia = $data['colonia'];
    $zip = $data['zip'];
    $ciudad = $data['ciudad'];
    $estado  = $data['estado'];
    $notas = $data['notas'];

    $query = "UPDATE direccion
              SET
                id_usuario = '$id_usuario',
                nombre = '$nombre',
                apellido = '$apellido',
                correo = '$correo',
                calle = '$calle',
                colonia = '$colonia',
                zip = '$zip',
                ciudad = '$ciudad',
                estado = '$estado',
                notas = '$notas'
              WHERE id = '$id' AND id_usuario = '$id_usuario'";
    $result = $bd->query($query);
    $bd->close();
    return $result;
  }

  function get_direcciones( $id_usuario ){
    $bd = mysqli_connect("db","root","root", "main");
    $sql = "SELECT * FROM direccion WHERE id_usuario = '$id_usuario'";
    $result = $bd->query($sql);
    $bd->close();
    return $result;
  }

  function get_direccion($id, $id_usuario) {
    $bd = mysqli_connect("db","root","root", "main");
    $sql = "SELECT * FROM direccion WHERE id_usuario = '$id_usuario' AND id = '$id'";
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
?>