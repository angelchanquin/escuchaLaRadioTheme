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
                        <?php if(defined('REGISTRATION_ERROR')){
                                foreach(unserialize(REGISTRATION_ERROR) as $error){
                                    echo '<p class="order_error">'.$error.'</p><br>';
                                }
                            }?>
                        <form id="my-registration-form" method="post" action="<?php echo add_query_arg('do', 'register', get_permalink( $post->ID )); ?>">
                        <div class="form-group">
                            <label>Nombre Completo</label>
                            <input type="text" required value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>" id="name" name="name" class="form-control bordered-input">
                        </div>
                        <div class="form-group">
                            <label>Correo Electrónico</label>
                            <input type="email" required value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" name="email" id="email" class="form-control bordered-input">
                        </div>
                        <div class="form-group">
                            <label>Nombre de usuario</label>
                            <input type="text" required value="<?php if(isset($_POST['user'])) echo $_POST['user'];?>" name="user" id="user" class="form-control bordered-input">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" required value="<?php if(isset($_POST['pass'])) echo $_POST['pass'];?>" name="pass" id="pass" class="form-control bordered-input">
                        </div>
                        <div class="form-group">
                            <label><input type="checkbox" required name="terms"> Estoy de acuerdo con los <a href="#" class="fpass">Terminos y Condiciones</a>.</label>
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