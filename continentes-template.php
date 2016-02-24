<?php
/**
 * Template Name: Continentes List
 */

    get_header();
?>

    <?php
        $continentes = $wpdb->get_results("SELECT DISTINCT continentName FROM stations ORDER BY continentName");
    ?>
    <article class="top-parallax">
            <section class="display">
                <div class="headerBg big blur default-bg"></div>
            </section>
            <section class="container">
                <div class="row">
                    <div class="title">
                        <h1>Por Ubicación</h1>
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
                            <h2>Continentes</h2>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 blog">
                        <div class="content-panel">
                                <ul class="list-unstyled">
                                    <?php 
                                        foreach ($continentes as $continente) {
                                            echo "<li><a href=\"#\">$continente->continentName</a></li>";
                                        }
                                    ?>
                                </ul>
                        </div>
                    </div>
                </div>
            </section>
        </article>
<?php
    get_footer();
?>