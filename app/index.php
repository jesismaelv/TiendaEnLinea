<?php
  $page_title = "Inicio";
  include('estructura/cabecera.php');
?>

<main class="index-page">
  <div class="container">
    <?php print_x($_SESSION) ?>
  </div>
</main>

<?php
  include('estructura/pie.php');
?>