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

  function get_ordenes($id_usuario) {
    $bd = mysqli_connect("db","root","root", "main");
    $sql = "SELECT * FROM orden WHERE id_usuario = '$id_usuario'";
    $result = $bd->query($sql);
    $bd->close();
    return $result;
  }

  function agregar_producto($cantidad, $id, $id_usuario) {
    $bd = mysqli_connect("db","root","root", "main");
    $carrito = json_decode($_SESSION['carrito']);

    if($carrito->$id > 0) {
      $carrito->$id += $cantidad;
    }
    else {
      $carrito->$id = $cantidad;
    }

    $carrito = json_encode($carrito);
    $_SESSION['carrito'] = $carrito;

    $sql = "UPDATE usuarios SET carrito = '$carrito' WHERE id = '$id_usuario'";
    $result = $bd->query($sql);
    $bd->close();
    return $result;
  }

  function get_carrito($id_usuario) {
    $bd = mysqli_connect("db","root","root", "main");
    $sql = "SELECT carrito FROM usuarios WHERE id = '$id_usuario'";
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

  function restar_existencia($id, $cantidad) {
    $producto = get_single('producto', $id);
    $existencia = $producto['existencia'];
    $existencia = $existencia - $cantidad; 
    if($existencia <= 0) {
      $existencia = 0;
    }
    $bd = mysqli_connect("db","root","root", "main");

    $query = "UPDATE producto SET existencia = '$existencia' WHERE id = '$id'";

    $result = $bd->query($query);
    if($result === true) {
      $bd->close();
      return $existencia;
    }
    else {
      $bd->close();
      return false;
    }
  }



  function registrar_orden($data, $id_usuario) {
    $items = get_carrito($id_usuario);
    $items = json_decode($items['carrito']);

    $detalles = [];
    $total = 0;
    foreach($items as $id => $cantidad) :
      $producto = get_single('producto', $id);
      $quedan = $producto['existencia'];
      if($quedan > 0) :
        if($quedan < $cantidad) {
          $cantidad = $quedan;
        }
        restar_existencia($id, $cantidad);
        $detalles[$id]['nombre'] = $producto['nombre'];
        $detalles[$id]['unidad'] = $producto['unidad'];
        $detalles[$id]['descripcion'] = $producto['descripcion'];
        $detalles[$id]['precio'] = $producto['precio'];
        $detalles[$id]['cantidad'] = $cantidad;
        $detalles[$id]['subtotal'] = $cantidad * $producto['precio'];
        $total = $total + ( $cantidad * $producto['precio'] );
      endif;
    endforeach;

    $direccion = get_direccion($data['direccion'], $id_usuario);
    $pago = [
      'nombre' => $data['nombre_tarjeta'],
      'numero' => $data['numero_tarjeta'],
      'vence' => $data['vence_tarjeta'],
      'tipo' => $data['tipo_tarjeta'],
      'ccv' => $data['ccv_tarjeta']
    ];

    $detalles = json_encode($detalles);
    $direccion = json_encode($direccion);
    $pago = json_encode($pago);

    $bd = mysqli_connect("db","root","root", "main");

    $query = "INSERT INTO orden (id_usuario, detalles, direccion, pago, total, estado) VALUES ('$id_usuario','$detalles','$direccion','$pago', '$total', 'pendiente')";
    $result = $bd->query($query);

    $status[0] = $result;
    $status[1] = $bd->insert_id;

    if($result === true) {
      $sql = "UPDATE usuarios SET carrito = '{}' WHERE id = '$id_usuario'";
      $res = $bd->query($sql);
      $_SESSION['carrito'] = '';
    }

    $bd->close();

    return $status;
  }

  function actualizar_carrito($data, $id_usuario) {
    $data = $data['cantidad'];
    $carrito = [];
    foreach($data as $item => $cantidad) {
      if($cantidad > 0) {
        $carrito[$item] = $cantidad;
      }
    }

    $carrito = json_encode($carrito);

    $bd = mysqli_connect("db","root","root", "main");
    $query = "UPDATE usuarios SET carrito = '$carrito' WHERE id = '$id_usuario'";
    $result = $bd->query($query);
    if($result === true) {
      $bd->close();
      $_SESSION['carrito'] = $carrito;
      return true;
    }
    else {
      $bd->close();
      return false;
    }
  }
?>