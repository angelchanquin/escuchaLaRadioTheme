<?php
/**
 * Template Name: Log In
 */

    get_header();
?>
    <article class="top-noparallax">
            <section class="display">
                <div class="headerBg big login-bg"></div>
            </section>
            <section class="top"></section>
        </article>
        <article class="main main-sign">
            <section class="container signContainer">
                <div class="login">
                    <div class="login-panel top">
                        <h3>Iniciar Sesión</h3>
                        <?php echo do_shortcode('[dm_login_form]'); ?>
                    </div>
                </div>
            </section>
        </article>
<?php
    get_footer();
?>