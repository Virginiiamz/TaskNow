<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// No validamos, suponemos que la entrada de datos es correcta
$idUsuario = $_SESSION['usuario']['id'];

// Definir insert
$sql = "SELECT * FROM etiqueta WHERE id_usuario = $idUsuario";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

$listas = [];

while ($fila = mysqli_fetch_assoc($resultado)) {
    $listas[] = $fila;
}

return $listas;
