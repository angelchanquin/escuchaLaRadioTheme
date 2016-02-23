<?php

    get_header();
?>
    <article class="top-parallax large">
        <section class="display">
            <!-- actualizado automaticamente en base a la imagen de la radio -->
            <div class="headerBg big blur" id="bluredBg"></div>
        </section>
        <section class="container">
            <div class="flexslider">
                <img class="img-responsive sliderimg" id="headImg" src="<?php bloginfo('stylesheet_directory'); ?>/img/filler/placeholder-square.jpg" alt="radio"/>
                <h2>Nombre de la radio</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscipit sem ut pretium egestas. Curabitur sed odio sit amet eros sagittis viverra eu vel ante.</p>
            </div>
        </section>
        <section class="top"></section>
    </article>
    <article class="main">
        <section class="container">
            <div class="row buttonRow">
                <div class="col-xs-3 col-sm-4 col-md-4 col-lg-4"></div>
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 box">
                    <button type="button" class="btn btn-primary radioButtonBig">
                        <i class="fa fa-play"></i>
                    </button>
                </div>
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 box">
                    <button type="button" class="btn radioButtonBig">
                        <i class="fa fa-star-o"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="content-panel">
                        <h3 class="text-center">Información de la Radio</h3>
                        <dl>
                            <dt>Ubicación</dt>
                            <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</dd>
                            <dt>Generos</dt>
                            <dd>Vestibulum id, ligula porta, felis euismod.</dd>
                            <dt>Idioma</dt>
                            <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</dd>
                        </dl>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="content-panel">
                        <h3 class="text-center">Más información</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscipit sem ut pretium egestas. Curabitur sed odio sit amet eros sagittis viverra eu vel ante. Duis at nisi libero. Nam scelerisque nunc orci, eu placerat dui egestas quis. Etiam condimentum eros at nisi efficitur, eu auctor risus facilisis. Etiam finibus lobortis nibh laoreet viverra.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="container">

        </section>
    </article>
<?php
    get_footer();
?>