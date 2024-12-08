<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// No validamos, suponemos que la entrada de datos es correcta
$idLista = $_GET['idLista'];

// Definir insert
$sql_tareas = "SELECT * FROM tarea WHERE id_lista = $idLista";
$sql_lista = "SELECT * FROM lista WHERE id = $idLista";

// Ejecutar consulta
$resultado_tareas = mysqli_query($conexion, $sql_tareas);
$resultado_lista = mysqli_query($conexion, $sql_lista);

$tareas = [];
$listas = mysqli_fetch_assoc($resultado_lista);

while ($fila = mysqli_fetch_assoc($resultado_tareas)) {
    $tareas[] = $fila;
}

$tareasJSON = urlencode(json_encode($tareas));
$listaJSON = urlencode(json_encode($listas));

header( "refresh:0;url=mostrarTareas.php?tareas=$tareasJSON&listaSeleccionada=$listaJSON");
exit();

?>