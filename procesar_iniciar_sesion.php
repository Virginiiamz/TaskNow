<?php
session_start();
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$username = trim($_REQUEST['txtUsernameLogin']);
$password = trim($_REQUEST['txtPasswordLogin']);

// Obtenemos todos los usuarios de la bd
$sql = "SELECT * FROM usuario where username = '$username' and password = '$password'";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $usuario = mysqli_fetch_assoc($resultado);
    $_SESSION['usuario'] = $usuario;
    header("Location: inicio.php");
} else {
    header("Location: index.php?noCorrecto=true");
}
?>