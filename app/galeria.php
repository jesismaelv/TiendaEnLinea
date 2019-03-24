<?php
    $class="gallery";
    $slide_class="slide gallery__slide";
?>

<div class="<?php echo $class; ?>"
    data-gallery="0" 
    data-number-of-slides=<?php echo sizeof($slides) - 1; ?>>
    <div class="slides gallery__slides" data-slides>
        <?php
            foreach($slides as $slide) :
                if( is_array($slide) ) {
                  $img = $slide['imagen'];
                  $frase = $slide['frase'];
                  $subtitulo = $slide['subtitulo'];
                  $accion = $slide['seccion'];
                }
                else {
                  $img = $slide;
                  $frase = "";
                  $subtitulo = "";
                  $accion = "";
                }
        ?>
            <a class="<?php echo $slide_class; ?>"
            style="background-image:url(<?php echo $img ?>)"
            data-slide href="<?php echo $accion ?>">
            </a>
        <?php
            endforeach;
        ?>
        <div class="container gallery-nav-container">
            <button class="gallery__previous-btn" data-previous-slide>
                Previous slide
            </button>
            <button class="gallery__next-btn" data-next-slide>
                Next slide
            </button>
        </div>
    </div>
</div>