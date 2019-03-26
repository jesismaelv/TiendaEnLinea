
<?php 
  $imagenes = json_decode($producto['imagenes']);
  $imagen_secundaria = $imagenes[0];

?>
<article class="tarjeta tarjeta-producto">
  <a class="link-producto"
      href="/producto.php?id=<?php echo $producto['id'] ?>">
      <div class="imagen"
      style="background-image:url(../<?php echo $producto['imagen'] ?>)">
        <div class="imagen-secundaria" style="background-image:url(../<?php echo $imagen_secundaria ?>)"></div>
      </div>

    <h2>
      <?php echo $producto['nombre']; ?>
    </h2>
    <span class="precio"><?php echo "$$precio por $unidad" ?></span> • <span class="existencia">Quedan <?php echo $producto['existencia'] ?></span>
  </a>
</article>