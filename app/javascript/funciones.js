$(function () {


  $('[data-agregar-imagen]').bind('click', function () {
    val = $(this).attr('data-agregar-imagen');
    $('#' + val).append('<input type="file" name="imagenes[]" id="fileToUpload">');
  });
});