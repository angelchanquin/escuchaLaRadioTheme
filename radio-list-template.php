<?php
/**
 * Template Name: Radios List
 */

    get_header();
?>
    <article class="top-parallax">
        <section class="display">
            <div class="headerBg big blur default-bg" id="bluredBg"></div>
        </section>
        <section class="container">
            <div class="row">
                <div class="title">
                    <h1><?php the_title(); ?> </h1>
                </div>
            </div>
        </section>
        <section class="top"></section>
    </article>
    <article class="main">
        <section class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="content-panel-title">
                        <h2>Radios</h2>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                    <!-- Radio -->
                    <div class="content-panel-radio">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <img class="content-image" src="<?php bloginfo('stylesheet_directory'); ?>/img/filler/placeholder-rectangle.jpg" id='headImg'>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                            <div class="boxgrid reverse slideright">
                                <div class="cover radioCover">
                                    <h3>Lorem ipsum dolor sit amet</h3>
                                    <p>Nunc vehicula dapibus ipsum. Duis venenatis risus non nunc fermentum dapibus. Morbi lorem ante, malesuada in mollis nec, non auctor nec massa. Aenean tempus dui eget felis blandit at fringilla urna ultrices. Suspendisse feugiat, ante et viverra lacinia, lectus sem lobortis dui, ultricies consectetur leo mauris at tortor.</p>
                                </div>
                                <div class="radioButtonContainer">
                                    <button type="button" class="btn btn-primary radioButton">
                                        <i class="fa fa-play"></i>
                                    </button>
                                    <button type="button" class="btn radioButton">
                                        <i class="fa fa-star-o"></i>
                                    </button>
                                    <a href="<?php echo home_url(); ?>/radio">
                                        <button type="button" class="btn radioButton">
                                            <b>...</b>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Radio -->
                    <!-- Radio -->
                    <div class="content-panel-radio">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <img class="content-image" src="<?php bloginfo('stylesheet_directory'); ?>/img/filler/placeholder-rectangle.jpg" id='headImg'>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                            <div class="boxgrid reverse slideright">
                                <div class="cover radioCover">
                                    <h3>Lorem ipsum dolor sit amet</h3>
                                    <p>Nunc vehicula dapibus ipsum. Duis venenatis risus non nunc fermentum dapibus. Morbi lorem ante, malesuada in mollis nec, non auctor nec massa. Aenean tempus dui eget felis blandit at fringilla urna ultrices. Suspendisse feugiat, ante et viverra lacinia, lectus sem lobortis dui, ultricies consectetur leo mauris at tortor.</p>
                                </div>
                                <div class="radioButtonContainer">
                                    <button type="button" class="btn btn-primary radioButton">
                                        <i class="fa fa-play"></i>
                                    </button>
                                    <button type="button" class="btn radioButton">
                                        <i class="fa fa-star-o"></i>
                                    </button>
                                    <a href="<?php echo home_url(); ?>/radio">
                                        <button type="button" class="btn radioButton">
                                            <b>...</b>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Radio -->
                    <!-- Radio -->
                    <div class="content-panel-radio">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <img class="content-image" src="<?php bloginfo('stylesheet_directory'); ?>/img/filler/placeholder-rectangle.jpg" id='headImg'>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                            <div class="boxgrid reverse slideright">
                                <div class="cover radioCover">
                                    <h3>Lorem ipsum dolor sit amet</h3>
                                    <p>Nunc vehicula dapibus ipsum. Duis venenatis risus non nunc fermentum dapibus. Morbi lorem ante, malesuada in mollis nec, non auctor nec massa. Aenean tempus dui eget felis blandit at fringilla urna ultrices. Suspendisse feugiat, ante et viverra lacinia, lectus sem lobortis dui, ultricies consectetur leo mauris at tortor.</p>
                                </div>
                                <div class="radioButtonContainer">
                                    <button type="button" class="btn btn-primary radioButton">
                                        <i class="fa fa-play"></i>
                                    </button>
                                    <button type="button" class="btn radioButton">
                                        <i class="fa fa-star-o"></i>
                                    </button>
                                    <a href="<?php echo home_url(); ?>/radio">
                                        <button type="button" class="btn radioButton">
                                            <b>...</b>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Radio -->
                </div>
            </div>
        </section>
    </article>
<?php
    get_footer();
?>