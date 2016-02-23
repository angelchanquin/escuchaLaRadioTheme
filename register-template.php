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
                        <form>
                        <div class="form-group">
                            <label>Nombre Completo</label>
                            <input type="text" name="firstname" class="form-control bordered-input">
                        </div>
                        <div class="form-group">
                            <label>Correo Electrónico</label>
                            <input type="email" name="email" class="form-control bordered-input">
                        </div>
                        <div class="form-group">
                            <label>Nombre de usuario</label>
                            <input type="text" name="username" class="form-control bordered-input">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control bordered-input">
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" name="terms"> Estoy de acuerdo con los <a href="#" class="fpass">Terminos y Condiciones</a>.</label>
                            <input type="submit" value="Sign up" class="btn btn-info pull-right">
                        </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </section>
        </article>
<?php
    get_footer();
?>