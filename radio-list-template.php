<?php
/**
 * Template Name: Radios List
 */

    get_header();
?>
    <?php
        $continent = $_GET["continent"];
        $country = $_GET["country"];
        if (is_page('local')) {
            $record = geoip_detect2_get_info_from_ip('::1', array ( 0 => 'en', ), TRUE);
            $pais = $record->country->name;
            }
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
                        } else if (is_page('local')){
                            echo $pais;
                        }
                        else {
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
                        $total = null;
                        $post_per_page = 10;
                        $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
                        $offset = ( $page * $post_per_page ) - $post_per_page;
                        $radios = array();
                        if(is_page('radios')){
                            $radios = $wpdb->get_results("SELECT * FROM stations WHERE countryName = '$country' AND continentName = '$continent' ORDER BY name LIMIT ${offset}, ${post_per_page}");
                            $total = $wpdb->get_var("SELECT COUNT(*) FROM stations WHERE countryName = '$country' AND continentName = '$continent'");
                        } else if(is_page('local')) {
                            $radios = $wpdb->get_results("SELECT * FROM stations WHERE countryName = '$pais' ORDER BY name LIMIT ${offset}, ${post_per_page}");
                            $total = $wpdb->get_var("SELECT COUNT(*) FROM stations WHERE countryName = '$pais'");
                        } else if(is_page('busqueda')) {
                            $busqueda = $_GET["search"];
                            $radios = $wpdb->get_results("SELECT * FROM stations WHERE name LIKE '%{$busqueda}%' OR countryName LIKE '%{$busqueda}%' OR language LIKE '%{$busqueda}%' OR genres LIKE '%{$busqueda}%' ORDER BY name LIMIT ${offset}, ${post_per_page}");
                            $total = $wpdb->get_var("SELECT COUNT(*) FROM stations WHERE name LIKE '%{$busqueda}%' OR countryName LIKE '%{$busqueda}%' OR language LIKE '%{$busqueda}%' OR genres LIKE '%{$busqueda}%'");
                        }else if(is_page('radios-favoritas')) {
                            $user = wp_get_current_user();
                            $username = $user->user_login;
                            $radios = $wpdb->get_results("SELECT * FROM stations INNER JOIN favorites ON stations.sId = favorites.sId WHERE favorites.user_login = '$username' ORDER BY name LIMIT ${offset}, ${post_per_page}");
                            $total = $wpdb->get_var("SELECT COUNT(*) FROM stations INNER JOIN favorites ON stations.sId = favorites.sId WHERE favorites.user_login = '$username'");
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
                                                    <button radio-id="<?php echo $radio->sId; ?>" type="button" class="btn radioButton btnFavorite">
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
                        <?php
                            }
                            $pages = paginate_links(
                                array(
                                    'base' => add_query_arg( 'cpage', '%#%' ),
                                    'format' => '',
                                    'prev_text' => __('Pagina Anterior'),
                                    'next_text' => __('Pagina Siguiente'),
                                    'total' => ceil($total / $post_per_page),
                                    'current' => $page,
                                    'type'  => 'array'
                            ));
                            if( is_array( $pages ) ) {
                                echo '<ul class="pagination">';
                                foreach ( $pages as $page ) {
                                    echo "<li>$page</li>";
                                }
                                echo '</ul>';
                            }
                        }?>
                </div>
            </div>
        </section>
    </article>
<?php
    get_footer();
?>