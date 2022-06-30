<?php

if (!defined('LIBRARIES_PATH')) {
    define('LIBRARIES_PATH', '../libraries/');
}

if (!defined('VIEWS_PATH')) {
    define('VIEWS_PATH', '../Views/');
}

require_once(LIBRARIES_PATH . "Conexion.php");

//crear función
function getAllCantantes(){
    $db = Conexion::getConnection();
    $query_cantantes = "SELECT * FROM cantantes";
    $result = $db->query($query_cantantes);

    if($result->num_rows > 0){
        return $result;
    }
}

//Con el punto se concatena
function getOneCantante($id){
    $db = Conexion::getConnection();
    $query_cantantes = "SELECT * FROM cantantes WHERE id = ".$id;
    $result = $db->query($query_cantantes);

    if($result->num_rows > 0){
        return $result;
    }
}

//crear función
function updateCantante($id, $Nombre, $generoMusical, $anioNacimiento, $Albumes, $Nacionalidad){
    $db = Conexion::getConnection();
    $query_cantantes = "UPDATE cantantes SET Nombre = '$Nombre', generoMusical = '$generoMusical', anioNacimiento = '$anioNacimiento', Albumes = '$Albumes', Nacionalidad = '$Nacionalidad'WHERE id = ".$id;
    $db->query($query_cantantes);
    //header("Location:".VIEWS_PATH."home_admin/gestion_cantantes.php");
}
//crear función
function deleteOneCantante($id)
{
    $db = Conexion::getConnection();
    //crear variable para hacer consultas SQL
    $query_cantantes = "DELETE FROM cantantes WHERE id=" . $id;
    //echo $queryViajes;
    $db->query($query_cantantes);
    header("Location:".VIEWS_PATH."admin/gestion_cantantes.php");
}

if (isset($_POST['actualizaCantante'])) {
    updateCantante($_POST["id"], $_POST["Nombre"], $_POST["generoMusical"], $_POST["anioNacimiento"], $_POST["Albumes"], $_POST["Nacionalidad"]);
    header("Location:".VIEWS_PATH."admin/gestion_cantantes.php");
}

//crear función
function newCantante($Nombre, $generoMusical, $anioNacimiento, $Albumes, $Nacionalidad){
    $db = Conexion::getConnection();
    $query_cantantes = "INSERT INTO cantantes (Nombre, generoMusical, anioNacimiento, Albumes, Nacionalidad) VALUES ('$Nombre', '$generoMusical', '$anioNacimiento', '$Albumes', '$Nacionalidad');";
    $db->query($query_cantantes);
    //header("Location:".VIEWS_PATH."home_admin/gestion_cantantes.php");
}

if (isset($_POST['nuevoCantante'])) {
    newCantante($_POST["Nombre"], $_POST["generoMusical"], $_POST["anioNacimiento"], $_POST["Albumes"], $_POST["Nacionalidad"]);
    header("Location:".VIEWS_PATH."admin/gestion_cantantes.php");
}
