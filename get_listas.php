<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// No validamos, suponemos que la entrada de datos es correcta
$idUsuario = $_SESSION['usuario']['id'];

// Definir insert
$sql = "SELECT * FROM lista WHERE id_usuario = $idUsuario AND agrupado = 0";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

$listas = [];

while ($fila = mysqli_fetch_assoc($resultado)) {
    $listas[] = $fila;
}

return $listas;
?>