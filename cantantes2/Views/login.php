<?php

define('CONTROLLER_PATH', '../Controller/');
define('VIEWS_PATH', '../Views/');
define('MODELS_PATH', '../Models/');
define('CSS_PATH', 'css/');
define('JS_PATH', 'js/');
define('IMG_PATH', 'img/');


include(VIEWS_PATH . "header.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7 d-flex justify-content-center mt-4">
                    <img class="img-fluid" width="80%" alt="Imagen de inicio" src="<?php echo IMG_PATH;?>index.jpg" />
                </div>
                <div class="col-md-5 mt-4 ">


                    <div class="row">
                        <div class="col-sm-6">
                            <?php
                            if (isset($_GET["info"])) {
                                if ($_GET["info"] == 1) {
                            ?>
                                    <div class="alert alert-danger d-flex alert-dismissible fade show" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                            <use xlink:href="#exclamation-triangle-fill" />
                                        </svg>
                                        <strong>¡Datos Incorrectos!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                }
                                if ($_GET["info"] == 2) {
                                ?>
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                            <use xlink:href="#info-fill" />
                                        </svg>
                                        <strong>¡Cerró Sesión!</strong> Adiós
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Inicio de sesión</h5>
                                    <!--Aquí va el formulario-->
                                    <form role="form" action="<?php echo CONTROLLER_PATH; ?>valida_login.php" method="POST">
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">
                                                Correo
                                            </label>
                                            <input type="email" class="form-control" id="correo" name="correo" />
                                        </div>
                                        <div class="form-group">

                                            <label for="exampleInputPassword1">
                                                Clave
                                            </label>
                                            <input type="password" class="form-control" id="clave" name="clave" />
                                        </div>

                                        <button type="submit" class="btn btn-primary">
                                            Entrar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include(VIEWS_PATH . "footer.php");
?>