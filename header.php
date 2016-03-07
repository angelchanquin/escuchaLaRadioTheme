<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
        <!--[if lt IE 9]>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/js/html5shiv.js"></script>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/js/respond.min.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
    </head>

    <body <?php body_class(); ?>>
        <!-- Controles de la radio en reproduccion -->
        <div class="radio-player inactive" id="radio-player">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8 box-left">
                <img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/img/filler/placeholder-square.jpg" id="playing_img">
                <div class="box-left box-fill">
                    <div style="margin:15px 0;">
                        <h3 id="playing_name"><?php _e('Nombre de la radio', 'escuchalaradio.com'); ?></h3>
                        <p id="playing_desc"><?php _e('Descripción de la radio', 'escuchalaradio.com'); ?></p>
                    </div>
                    <div class="show-more">
                        <button id="show-more" type="button" class="btn btn-primary radioButton">
                            <i class="fa fa-arrow-up"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                <div class="radioButtonContainer small">
                    <button type="button" class="btn btn-primary radioButton">
                        <i class="fa fa-play" id="state_icon"></i>
                    </button>
                    <button type="button" class="btn btn-primary radioButton">
                        <i class="fa fa-star-o" id="fav_icon"></i>
                    </button>
                    <button type="button" class="btn btn-primary radioButton" id="volume">
                        <i class="fa fa-volume-up"></i>
                    </button>
                    <a href="radio.html">
                        <button type="button" class="btn btn-primary radioButton">
                            <b>...</b>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    <!-- Terminan controles -->
        <nav class="navbar container navbar-default navbar-fixed-top" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo home_url(); ?>"><img class="brandLogo" src="<?php bloginfo('stylesheet_directory'); ?>/img/brand-white.svg"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php
            if(!is_user_logged_in()){
                $args = array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav navbar-nav navbar-right'
                );
                wp_nav_menu( $args );
            } else {
                $args = array(
                    'theme_location' => 'logged',
                    'menu_class' => 'nav navbar-nav navbar-right'
                );
                wp_nav_menu( $args );
            }
            ?>
          </div><!-- /.navbar-collapse -->
        </nav>