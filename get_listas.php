<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// No validamos, suponemos que la entrada de datos es correcta

// Definir insert
$sql = "SELECT * FROM lista WHERE id_usuario = 1";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

$listas = [];

while ($fila = mysqli_fetch_assoc($resultado)) {
    $listas[] = $fila;
}

// var_dump($listas);
return $listas;
?>