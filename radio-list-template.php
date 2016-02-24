<?php
/**
 * Template Name: Radios List
 */

    get_header();
?>
    <?php
        $continent = $_GET["continent"];
        $country = $_GET["country"];
    ?>
    <article class="top-parallax">
        <section class="display">
            <div class="headerBg big blur default-bg" id="bluredBg"></div>
        </section>
        <section class="container">
            <div class="row">
                <div class="title">
                    <h1>
                    <?php
                        if (is_page('radios')){
                            echo $country;
                        } else {
                            the_title();
                        }
                    ?>
                    </h1>
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
                    <?php 
                        $radios = array();
                        if(is_page('radios')){
                            $radios = $wpdb->get_results("SELECT * FROM stations WHERE countryName = '$country' AND continentName = '$continent' ORDER BY name");
                        } else if(is_page('local')) {
                            $radios = $wpdb->get_results("SELECT * FROM stations WHERE countryName = 'Guatemala' ORDER BY name");
                        }
                        if (count($radios) == 0 || $radios == null) {
                            echo "<h3>No hay radios registradas por el momento.</h3>";
                        } else {
                            foreach ($radios as $radio) {
                            ?>
                                <!-- Radio -->
                                <div class="content-panel-radio">
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <img class="content-image" src="<?php bloginfo('stylesheet_directory'); ?>/img/filler/placeholder-rectangle.jpg" id='headImg'>
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                                        <div class="boxgrid reverse slideright">
                                            <div class="cover radioCover">
                                                <?php echo "<h3>$radio->name</h3>"; ?>
                                                <?php echo "<p><h4>$radio->dial $radio->type</h4></p>"; ?>
                                                <?php 
                                                    if ($radio->countryName != "" || $radio->countryName != null) {
                                                        echo "<p><strong>Ubicación</strong> $radio->countryName ";
                                                    } else {
                                                        echo "<p>";
                                                    }
                                                    if ($radio->genres != "" || $radio->genres != null) {
                                                        echo "- <strong>Generos</strong> $radio->genres</p>"; 
                                                    } else {
                                                        echo "</p>";
                                                    }
                                                ?>
                                            </div>
                                            <div class="radioButtonContainer">
                                                    <button type="button" class="btn btn-primary radioButton">
                                                        <i class="fa fa-play"></i>
                                                    </button>
                                                    <button type="button" class="btn radioButton">
                                                        <i class="fa fa-star-o"></i>
                                                    </button>
                                                <a href="<?php echo home_url() . "/radio/?id=" . $radio->sId; ?>">
                                                    <button type="button" class="btn radioButton">
                                                        <b>...</b>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Radio -->        
                        <?php } 
                        }?>
                </div>
            </div>
        </section>
    </article>
<?php
    get_footer();
?>