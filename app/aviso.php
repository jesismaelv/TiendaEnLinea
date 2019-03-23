<?php
  $aviso = $str;
  if(is_array($str)) {
    $aviso = $str[0];
    $mensaje = $str[1];
  }
?>

<div class="aviso">
  <h2><?php echo $str; ?></h2>
  <?php
    if(@$mensaje != "") :
  ?>
    <p><?php echo $mensaje; ?></p>
    <?php endif; ?>
</div>