<?php

define('CONTROLLER_PATH', '../../Controllers/');
define('VIEWS_PATH', '../../Views/');
define('MODELS_PATH', '../../Models/');
define('LIBRARIES_PATH', '../../libraries/');
define('CSS_PATH', '../css/');
define('JS_PATH', '../JS/');
define('IMG_PATH', '../img/');

include(VIEWS_PATH . "header.php");
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Viajes</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo VIEWS_PATH;?>login.php?info=2">Cerrar sesión</a>
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="jumbotron">
                <h2>
                    Bienvenido Usuario
                </h2>
                <p>
                    <img alt="Imagen de inicio usuario" src="<?php echo IMG_PATH;?>usuario.jpg" />
                    Viajar solo o acompañado.
                </p>
                <p>
                    <a class="btn btn-primary btn-large" href="https://images.pexels.com/photos/1463924/pexels-photo-1463924.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">Learn more</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php
include(VIEWS_PATH . "footer.php");
?>