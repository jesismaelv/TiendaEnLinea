<?php
  $page_title = "Orden";
  include('estructura/cabecera.php');

  $id = $_GET['id'];

  $orden = get_orden($id, $_SESSION['id']);

?>

<main class="orden-page">
  <div class="container">
    <?php print_x($orden) ?>
  </div>
</main>

<?php
  include('estructura/pie.php');
?>