<?php

    get_header();
    $radioId = $_GET['id'];
    $results = $wpdb->get_results("SELECT * FROM stations WHERE sId = '$radioId'");
    $radio = $results[0];
?>
    <article class="top-parallax large">
        <section class="display">
            <!-- actualizado automaticamente en base a la imagen de la radio -->
            <div class="headerBg big blur" id="bluredBg"></div>
        </section>
        <section class="container">
            <div class="flexslider">
                <img class="img-responsive sliderimg" id="headImg" src="<?php bloginfo('stylesheet_directory'); ?>/img/filler/placeholder-square.jpg" alt="radio"/>
                <h2><?php echo $radio->name; ?></h2>
                <p><?php echo $radio->dial . " " . $radio->type ?></p>
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
                        <?php if(!is_null($radio->countryName) || $radio->countryName != ""){ ?>
                            <dt>Ubicación</dt>
                            <dd><?php echo $radio->countryName; ?></dd>
                        <?php } ?>
                        <?php if(!is_null($radio->genres) || $radio->genres != ""){ ?>
                            <dt>Generos</dt>
                            <dd><?php echo $radio->genres; ?></dd>
                        <?php } ?>
                        <?php if(!is_null($radio->language) || $radio->language != ""){ ?>
                            <dt>Idioma</dt>
                            <dd><?php echo $radio->language; ?></dd>
                        <?php } ?>
                        </dl>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="content-panel">
                        <h3 class="text-center">Más información</h3>
                        <p>No hay mas información.</p>
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