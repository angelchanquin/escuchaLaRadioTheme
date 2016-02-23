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
                        <div class="form-group">
                            <input type="text" placeholder="Nombre de usuario" class="form-control bordered-input">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Contraseña" class="form-control bordered-input">
                        </div>
                        <div class="pull-left">
                            <a class="fpass" href="#">
                            ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                        <div class="pull-right">
                            <a href="#" class="btn blue">
                            Submit
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </article>
<?php
    get_footer();
?>