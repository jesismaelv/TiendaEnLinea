//AUTO ROTATE

$(function () {

  var autoRotate_isHovered = false;
  $("[data-gallery-auto-rotate]").mouseenter(function () {
    autoRotate_isHovered = true;
  });
  $("[data-gallery-auto-rotate]").mouseleave(function () {
    autoRotate_isHovered = false;
  });
  setInterval(function () {
    if (!autoRotate_isHovered) {
      $("[data-gallery-auto-rotate]").each(function () {
        $(this).find("[data-next-slide]").trigger("click");
      });
    }
  }, 5000);

  //INICIALIZAR
  // SWIPE ACTIONS
  // $.mobile.autoInitializePage = false;

  // $('[data-gallery]').on("swiperight", function () {
  //   $(this).find("[data-previous-slide]").trigger("click");
  // });

  // $('[data-gallery]').on("swipeleft", function () {
  //   $(this).find("[data-next-slide]").trigger("click");
  // });
  $("[data-gallery]").each(function () {
    numberOfSlides = $(this).attr("data-number-of-slides");
    slide = $(this).attr("data-gallery");
    changeGallerySlide(this, slide, 0, 'none');
  });

  $('[data-gallery]').each(function () {
    current = $(this).attr("data-gallery");
    $(this).find("[data-slide]").eq(current).addClass("active");
  });


  $('[data-previous-slide]').bind("click", function () {
    obj = $(this).parents("[data-gallery]");
    current = $(obj).attr("data-gallery");
    numberOfSlides = $(obj).attr("data-number-of-slides");
    if (current == 0) {
      newSlide = numberOfSlides;
    } else {
      newSlide = current - 1;
    }
    changeGallerySlide(obj, newSlide, current, 'previous');
  });

  $('[data-next-slide]').bind("click", function () {
    obj = $(this).parents("[data-gallery]");
    current = $(obj).attr("data-gallery");
    numberOfSlides = $(obj).attr("data-number-of-slides");
    if (current == numberOfSlides) {
      newSlide = 0;
    } else {
      newSlide = parseInt(current) + 1;
    }
    changeGallerySlide(obj, newSlide, current, 'next');

  });

  $("[data-indicator-number]").bind("click", function () {
    obj = $(this).parents("[data-gallery]");
    slide = $(this).attr("data-indicator-number");
    current = $(obj).attr("data-gallery");
    if (slide > current) {
      direction = "next";
    } else {
      direction = "previous";
    }
    if (slide != current) changeGallerySlide(obj, slide, current, direction);
  });

  function changeGallerySlide(obj, slide, oldSlide, direction) {
    $(obj).attr("data-gallery", slide);
    $(obj).children("[data-slides]").each(function () {
      changeGallerySlidesSlide($(this), slide, oldSlide, direction);
    });
  }

  function changeGallerySlidesSlide(obj, slide, oldSlide, direction) {
    $(obj).find("[data-slide]").removeClass("active");
    $(obj).find("[data-slide]").removeClass("previous-in");
    $(obj).find("[data-slide]").removeClass("previous-out");
    $(obj).find("[data-slide]").removeClass("next-in");
    $(obj).find("[data-slide]").removeClass("next-out");
    if (direction == 'previous') {
      style = $(obj).find("[data-slide]").eq(slide).attr("data-image-style");
      $(obj).find("[data-slide]").eq(slide).attr('style', style);
      $(obj).find("[data-slide]").eq(slide).addClass("active previous-in");
      $(obj).find("[data-slide]").eq(oldSlide).addClass("active previous-out");
    }
    if (direction == 'next') {
      style = $(obj).find("[data-slide]").eq(slide).attr("data-image-style");
      $(obj).find("[data-slide]").eq(slide).attr('style', style);
      $(obj).find("[data-slide]").eq(slide).addClass("active next-in");
      $(obj).find("[data-slide]").eq(oldSlide).addClass("active next-out");
    }
    if (direction == 'none') {
      style = $(obj).find("[data-slide]").eq(slide).attr("data-image-style");
      $(obj).find("[data-slide]").eq(slide).attr('style', style);
      $(obj).find("[data-slide]").eq(slide).addClass("active");
    }
    $(obj).find("[data-indicator-number]").removeClass("active");
    $(obj).find("[data-indicator-number=" + slide + "]").addClass("active");
  }

});