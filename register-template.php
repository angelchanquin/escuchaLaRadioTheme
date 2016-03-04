<?php
/**
 * Template Name: Register
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
                <div class="register">
                    <div class="register-panel top">
                        <h3>Registrarse</h3>
                        <form id="my-registration-form" role="form">
                            <div class="form-group">
                                <label>Nombre Completo</label>
                                <input type="text" required id="name" name="name" class="form-control bordered-input">
                            </div>
                            <div class="form-group">
                                <label>Correo Electrónico</label>
                                <input type="email" required name="email" id="email" class="form-control bordered-input">
                            </div>
                            <div class="form-group">
                                <label>Nombre de usuario</label>
                                <input type="text" required name="username" id="username" class="form-control bordered-input">
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" required name="password" id="password" class="form-control bordered-input">
                            </div>
                            <div class="form-group">
                                <?php wp_nonce_field('vb_new_user','vb_new_user_nonce', true, true ); ?>
                                <label><input type="checkbox" id="terms" name="terms"> Estoy de acuerdo con los <a href="#" class="fpass">Terminos y Condiciones</a>.</label>
                                <input type="submit" class="btn btn-info pull-right" id="btn-new-user" value="Register" />
                            </div>
                                <div class="clearfix"></div>
                        </form>
                        <br>
                        <div class="alert result-message"></div>
                    </div>
                </div>
            </section>
        </article>
<?php
    get_footer();
?>