<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// No validamos, suponemos que la entrada de datos es correcta

// Definir insert
$sql = "SELECT * FROM etiqueta";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

$listas = [];

while ($fila = mysqli_fetch_assoc($resultado)) {
    $listas[] = $fila;
}

return $listas;
?>