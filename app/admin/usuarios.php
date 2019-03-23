<?php
  $page_title = "Usuarios";
  include('estructura/cabecera.php');

  if($_GET['eliminar'] == 'exito') {
    echo aviso("El usuario se ha eliminado con exito.");
  }
  if($_GET['eliminar'] == 'error') {
    echo aviso("Hubo un error al eliminar el usuario.");
  }

?>
<main class="admin-page registrar-producto-page">
  <div class="container">
    <div class="cabecera cabecera-productos row">
      <div class="col-12 col-md-6">
        <h1> Usuarios </h1>

      </div>
      <div class="col-12 col-md-6 alinear-derecha alinear-derecha--nosm">
        <a  href="/admin/registrar_usuario.php" class="boton"> Registrar usuario </a>
      </div>
    </div>

    <section class="archive-productos">
      <div class="row">
        <?php
          $result = get_archivo("usuarios");
          if ($result->num_rows > 0) :
            while($usuario = $result->fetch_assoc()) :
        ?>
          <div class="col-12 col-sm-6 col-lg-4">
            <article class="tarjeta tarjeta-usuario">
              <a class="link-usuario"
                  href="/admin/editar-usuario.php?id=<?php echo $usuario['id'] ?>">
                  <div class="imagen"
                  style="background-image:url(../<?php echo $usuario['foto'] ?>)"></div>

                <h2>
                  <?php echo $usuario['nombre'] . " " . $usuario['apellido']; ?>
                </h2>

                <p><?php echo $usuario['correo'] ?></p>
              </a>
              <a class="eliminar" href="/admin/eliminar.php?s=usuarios&id=<?php echo $usuario['id'] ?>"> X </a>
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
    </section>
  </div>
</main>
<?php
  include('estructura/pie.php');
?>