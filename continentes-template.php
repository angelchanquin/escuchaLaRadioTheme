<?php
/**
 * Template Name: Continentes List
 */

    get_header();
?>
    <?php
        $continent = $_GET["continent"];
    ?>
    <article class="top-parallax">
            <section class="display">
                <div class="headerBg big blur default-bg"></div>
            </section>
            <section class="container">
                <div class="row">
                    <div class="title">
                        <?php 
                            if ($continent == null || $continent == "") {
                                echo "<h2>Por Ubicación</h2>";
                            } else {
                                echo "<h2>$continent</h2>";
                            }
                        ?>
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
                            <?php 
                                if ($continent == null || $continent == "") {
                                    echo "<h2>Continentes</h2>";
                                } else {
                                    echo "<h2>Paises</h2>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 blog">
                        <div class="content-panel">
                                <ul class="list-unstyled">
                                    <?php 
                                        if ($continent == null || $continent == "") {
                                            $continentes = $wpdb->get_results("SELECT DISTINCT continentName FROM stations ORDER BY continentName");
                                            foreach ($continentes as $continente) {
                                            echo "<li><a href=\"por-ubicacion?continent=$continente->continentName\">$continente->continentName</a></li>";
                                            }
                                        } else {
                                            $paises = $wpdb->get_results("SELECT DISTINCT countryName FROM stations WHERE continentName = '$continent' ORDER BY countryName");
                                            foreach ($paises as $pais) {
                                            echo "<li><a href=\"radios?continent=$continent&country=$pais->countryName\">$pais->countryName</a></li>";
                                            }
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