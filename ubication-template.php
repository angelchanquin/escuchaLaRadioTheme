<?php
/**
 * Template Name: Ubication
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
                        <h1>
                        <?php 
                            if ($continent == null || $continent == "") {
                                the_title();
                            } else {
                                echo $continent;
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
                            <h2>
                            <?php 
                                if ($continent == null || $continent == "") {
                                    echo "Continentes";
                                } else {
                                    echo "Paises";
                                }
                            ?>
                            </h2>
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
                                            if (count($paises) == 0 || $paises == null) {
                                                echo "<h3>No hay países registrados por el momento.</h3?";
                                            } else {
                                                foreach ($paises as $pais) {
                                                    echo "<li><a href=\"radios?continent=$continent&country=$pais->countryName\">$pais->countryName</a></li>";
                                                }
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