$(function () {
  $('[data-toggle]').bind('click', function () {
    cla = $(this).attr('data-toggle');
    $(this).toggleClass(cla);
  });
});