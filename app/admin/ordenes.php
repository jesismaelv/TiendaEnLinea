<?php
  $page_title = "Ordenes";
  include('estructura/cabecera.php');

?>

<main cla1ss="ordenes-page">
  <div class="container">
    <h1> Órdenes </h1>

    <?php
          $result = get_archivo("orden");
          if ($result->num_rows > 0) :
            while($orden = $result->fetch_assoc()) :
        ?>
          <div class="col-12 tarjeta-orden__wrapper">
            <article class="tarjeta tarjeta-orden">
              <?php print_x($orden) ?>
            </article>
          </div>
        <?php
            endwhile;
          else :
        ?>
        <div class="col-12">
          <div class="no-resultados">
            No existen productos
          </div>
        </div>
        <?php
          endif;
        ?>
  </div>
</main>

<?php
  include('estructura/pie.php');
?>