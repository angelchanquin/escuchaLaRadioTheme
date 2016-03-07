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
                        <h3><?php _e('Iniciar Sesión', 'escuchalaradio.com'); ?></h3>
                        <form method="post" rol="form" id="login">
                            <div class="form-group">
                                <input name="username" id="username" type="text" placeholder="<?php _e('Nombre de usuario', 'escuchalaradio.com'); ?>" class="form-control bordered-input">
                            </div>
                            <div class="form-group">
                                <input name="password" id="password" type="password" placeholder="<?php _e('Contraseña', 'escuchalaradio.com'); ?>" class="form-control bordered-input">
                            </div>
                            <div class="pull-left">
                                <a class="fpass" href="#">
                                    <?php _e('¿Olvidaste tu contraseña?', 'escuchalaradio.com'); ?>
                                </a>
                            </div>
                            <div class="pull-right">
                                <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                                <input class="btn blue" type="submit"  name="submit" id="submit" value="Log in" />
                            </div>
                        </form>
                        <br><br><br>
                        <div class="alert result-message"></div>
                    </div>
                </div>
            </section>
        </article>
<?php
    get_footer();
?>