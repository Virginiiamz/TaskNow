<?php
session_start();
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// No validamos, suponemos que la entrada de datos es correcta

// Definir insert
$sql = "SELECT * FROM usuario WHERE username = 'marinagc40'";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

$usuario = $resultado->fetch_assoc();

$_SESSION[$usuario['username']] = $usuario;

return $usuario;
?>