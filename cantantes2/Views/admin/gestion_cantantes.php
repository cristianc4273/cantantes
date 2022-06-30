<?php

use LDAP\Result;

define('LIBRARIES_PATH', '../../libraries/');
define('CONTROLLER_PATH', '../../Controller/');
define('VIEWS_PATH', '../../Views/');
define('MODELS_PATH', '../../Models/');
define('CSS_PATH', '../css/');
define('JS_PATH', '../js/');
if (!defined('CONFIG_PATH')) {
    define('CONFIG_PATH', '../../config/');
}

include(VIEWS_PATH . "header.php");
require_once(CONTROLLER_PATH . "cantantes.php");
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
                    <a class="nav-link disabled" href="#">Cantantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo VIEWS_PATH; ?>login.php?info=2">Cerrar sesión</a>
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="jumbotron">
                <h2>
                    Cantantes
                </h2>
                <p>
                    En esta sección se pueden agregar nuevos cantantes, modificarlos o eliminarlos.
                </p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nuevo Cantante
                </button>
                <!-- Modal -->
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Género musical</th>
                            <th scope="col">Año nacimiento</th>
                            <th scope="col">Álbumes</th>
                            <th scope="col">Nacionalidad</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = getAllCantantes();
                        //Vamos a recorrer l bd
                        if ($result != null) {


                            while ($row = mysqli_fetch_assoc($result)) {
                                //Para enviar mas de un parametro se usa ?
                        ?>
                                <tr>
                                    <td><?php echo $row["Nombre"]; ?></td>
                                    <td><?php echo $row["generoMusical"]; ?></td>
                                    <td><?php echo $row["anioNacimiento"]; ?></td>
                                    <td><?php echo $row["Albumes"]; ?></td>
                                    <td><?php echo $row["Nacionalidad"]; ?></td>
                                    <td>
                                        <a href="?id=<?php echo $row["id"]; ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?id=<?php echo $row["id"]; ?>&elimina=1">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <?php

                if (isset($_GET["id"]) && !isset($_GET["elimina"])) {
                    //echo $_GET["id"];
                    $result_one_viaje = getOneCantante($_GET["id"]);
                    //print_r($result_one_viaje);
                    while ($row = mysqli_fetch_assoc($result_one_viaje)) {
                        //print_r($row);
                ?>
                        <form method="POST" action="<?php echo CONTROLLER_PATH; ?>cantantes.php">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="Nombre" value="<?php echo $row["Nombre"] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="generoMusical" class="form-label">Género Musical</label>
                                <input type="text" class="form-control" name="generoMusical" value="<?php echo $row["generoMusical"] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="anioNacimiento" class="form-label">Año Nacimiento</label>
                                <input type="text" class="form-control" name="anioNacimiento" value="<?php echo $row["anioNacimiento"] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="albumes" class="form-label">Álbumes</label>
                                <input type="text" class="form-control" name="Albumes" value="<?php echo $row["Albumes"] ?>">
                            </div>
                            <div class="col-12">
                                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                                <input type="text" class="form-control" name="Nacionalidad" value="<?php echo $row["Nacionalidad"] ?>">
                            </div>
                            <div class="col-12">
                                <input type="hidden" name=id value="<?php echo $row["id"] ?>">
                                <input type="hidden" name="actualizaCantante">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                <?php
                    }
                }

                if (isset($_GET["elimina"]) && isset($_GET["id"])) {
                    deleteOneCantante($_GET["id"]);
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Cantante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form method="POST" action="<?php echo CONTROLLER_PATH; ?>cantantes.php">
                <div class="modal-body">
                    <div class="col-12">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="Nombre">
                    </div>
                    <br>
                    <div class="col-12">
                        <label for="generoMusical" class="form-label">Género Musical</label>
                        <input type="text" class="form-control" name="generoMusical">
                    </div>
                    <br>
                    <div class="col-12">
                        <label for="anioNacimiento" class="form-label">Año Nacimiento</label>
                        <input type="text" class="form-control" name="anioNacimiento">
                    </div>
                    <br>
                    <div class="col-12">
                        <label for="albumes" class="form-label">Álbumes</label>
                        <input type="text" class="form-control" name="Albumes">
                    </div>
                    <br>
                    <div class="col-12">
                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                        <input type="text" class="form-control" name="Nacionalidad">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" input="nuevoCantante">Confirmar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
include(VIEWS_PATH . "footer.php");
?>