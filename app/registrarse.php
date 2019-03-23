<?php
  $page_title = "Registro";
  include('estructura/cabecera.php');

  $args = [
    'nombre' => 'Ismael',
    'apellido' => 'Villegas',
    'correo' => 'jesismaelv@gmail.com',
    'contrasena' => 'ismael',
    'foto' => 'fotos/ismael.jpg'
  ];

  $res = registrar_usuario($args);
  print_r($res);
?>

<main class="registration-page">
  <div class="container">
    <h1> Registration </h1>
    <form action="registro_completado.php"
      class="forma-registro"
      method="post"
      enctype='multipart/form-data'>
      <div class="row">

        <div class="col-12">
          <div class="forma-registro__input">
            <label> Nombre </label>
            <input type="text" name="nombre">
          </div>
        </div>

        <div class="col-12">
          <div class="forma-registro__input">
            <label> Nombre </label>
            <input type="text" name="nombre">
          </div>
        </div>

        <div class="col-12">
          <div class="forma-registro__input">
            <label> Nombre </label>
            <input type="text" name="nombre">
          </div>
        </div>
      
      </div>
    </form>
  </div>
</main>

<?php
  include('estructura/pie.php');
?>