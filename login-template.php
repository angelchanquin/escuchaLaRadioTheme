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
                        <form method="post" rol="form" id="login">
                            <div class="form-group">
                                <input name="username" id="username" type="text" placeholder="Nombre de usuario" class="form-control bordered-input">
                            </div>
                            <div class="form-group">
                                <input name="password" id="password" type="password" placeholder="Contraseña" class="form-control bordered-input">
                            </div>
                            <div class="pull-left">
                                <a class="fpass" href="#">
                                    ¿Olvidaste tu contraseña?
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