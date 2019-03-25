<?php
  $page_title = "Ordenes";
  include('estructura/cabecera.php');

?>

<main cla1ss="ordenes-page">
  <div class="container">
    <h1> Órdenes </h1>

    <div class="row">
      <div class="col-12">
        <h2> Pendientes </h2>
      </div>
      <?php
          $result = get_ordenes_estado('Pendiente');
          if ($result->num_rows > 0) :
            while($orden = $result->fetch_assoc()) :
              $total = $orden['total'];
              $id_orden = $orden['id'];
              $status = $orden['estado'];
              $fecha = date('d/M/Y',time($orden['fecha']));
        ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 tarjeta-orden__wrapper <?php $status ?>">
            <a href="orden.php?id=<?php echo $id_orden ?>" class="tarjeta-orden">
              <h3><?php echo "Orden: #$id_orden"; ?></h3>
              <span class="total">$<?php echo number_format($total); ?> • <?php echo $fecha; ?> </span>
              <p><?php echo $status; ?></p>
            </a>
          </div>
        <?php
            endwhile;
          else :
        ?>
        <div class="col-12">
          <div class="no-resultados">
            No existen órdenes
          </div>
        </div>
        <?php
          endif;
        ?>
      </div>


      <div class="row">
      <div class="col-12">
        <h2> Enviadas </h2>
      </div>
      <?php
          $result = get_ordenes_estado('Enviado');
          if ($result->num_rows > 0) :
            while($orden = $result->fetch_assoc()) :
              $total = $orden['total'];
              $id_orden = $orden['id'];
              $status = $orden['estado'];
              $fecha = date('d/M/Y',time($orden['fecha']));
        ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 tarjeta-orden__wrapper <?php $status ?>">
            <a href="orden.php?id=<?php echo $id_orden ?>" class="tarjeta-orden">
              <h3><?php echo "Orden: #$id_orden"; ?></h3>
              <span class="total">$<?php echo number_format($total); ?> • <?php echo $fecha; ?> </span>
              <p><?php echo $status; ?></p>
            </a>
          </div>
        <?php
            endwhile;
          else :
        ?>
        <div class="col-12">
          <div class="no-resultados">
            No existen órdenes
          </div>
        </div>
        <?php
          endif;
        ?>
      </div>


      <div class="row">
      <div class="col-12">
        <h2> Entregadas </h2>
      </div>
      <?php
          $result = get_ordenes_estado('Entregado');
          if ($result->num_rows > 0) :
            while($orden = $result->fetch_assoc()) :
              $total = $orden['total'];
              $id_orden = $orden['id'];
              $status = $orden['estado'];
              $fecha = date('d/M/Y',time($orden['fecha']));
        ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 tarjeta-orden__wrapper <?php $status ?>">
            <a href="orden.php?id=<?php echo $id_orden ?>" class="tarjeta-orden">
              <h3><?php echo "Orden: #$id_orden"; ?></h3>
              <span class="total">$<?php echo number_format($total); ?> • <?php echo $fecha; ?> </span>
              <p><?php echo $status; ?></p>
            </a>
          </div>
        <?php
            endwhile;
          else :
        ?>
        <div class="col-12">
          <div class="no-resultados">
            No existen órdenes
          </div>
        </div>
        <?php
          endif;
        ?>
      </div>


      <div class="row">
      <div class="col-12">
        <h2> Canceladas </h2>
      </div>
      <?php
          $result = get_ordenes_estado('Cancelado');
          if ($result->num_rows > 0) :
            while($orden = $result->fetch_assoc()) :
              $total = $orden['total'];
              $id_orden = $orden['id'];
              $status = $orden['estado'];
              $fecha = date('d/M/Y',time($orden['fecha']));
        ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 tarjeta-orden__wrapper <?php $status ?>">
            <a href="orden.php?id=<?php echo $id_orden ?>" class="tarjeta-orden">
              <h3><?php echo "Orden: #$id_orden"; ?></h3>
              <span class="total">$<?php echo number_format($total); ?> • <?php echo $fecha; ?> </span>
              <p><?php echo $status; ?></p>
            </a>
          </div>
        <?php
            endwhile;
          else :
        ?>
        <div class="col-12">
          <div class="no-resultados">
            No existen órdenes
          </div>
        </div>
        <?php
          endif;
        ?>
      </div>
  </div>
</main>

<?php
  include('estructura/pie.php');
?>