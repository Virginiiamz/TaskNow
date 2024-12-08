<?php
session_start();
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$correo = $_POST['txtCorreoLogin'];
$username = $_POST['txtUsernameLogin'];
$password = $_POST['txtPasswordLogin'];

// Recogemos todos los usuarios, para comprobar que ya no existe un nombre de usuario y correo igual
$sql = "SELECT * FROM usuario WHERE username = '$username'";
$resultadoNombreUsuario = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultadoNombreUsuario) > 0) {
    header("refresh:0;url=registrar_usuario.php?existeUsername=true");
    exit();
}

$sql = "SELECT * FROM usuario WHERE email = '$correo'";
$resultadoCorreo = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultadoCorreo) > 0) {
    header("refresh:0;url=registrar_usuario.php?existeCorreo=true");
    exit();
}

// Definir insert
$sql = "INSERT INTO usuario(`id`, `username`, `email`, `password`) 
                VALUES (null,'" . $username . "', '" . $correo . "', '" . $password . "');";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

header("refresh:0;url=index.php");


// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Se ha creado el usuario correctamente</h2>";
}
