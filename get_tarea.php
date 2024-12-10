<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// No validamos, suponemos que la entrada de datos es correcta
$idLista = $_GET['idLista'];

$idUsuario = $_SESSION['usuario']['id'];

$tareas_noCompletadas = [];
$tareas_completadas = [];

$sql_tareas_noCompletadas = "SELECT tarea.*, etiqueta.orden_prioridad 
    FROM tarea
    JOIN etiqueta ON tarea.id_etiqueta = etiqueta.id AND etiqueta.id_usuario = $idUsuario
    WHERE tarea.id_lista = $idLista AND esRealizada = 0
    ORDER BY etiqueta.orden_prioridad ASC";
$resultado_tareas_noCompletadas = mysqli_query($conexion, $sql_tareas_noCompletadas);

while ($fila = mysqli_fetch_assoc($resultado_tareas_noCompletadas)) {
    $tareas_noCompletadas[] = $fila;
}

$sql_tareas_completadas = "SELECT tarea.*, etiqueta.orden_prioridad 
    FROM tarea
    JOIN etiqueta ON tarea.id_etiqueta = etiqueta.id AND etiqueta.id_usuario = $idUsuario
    WHERE tarea.id_lista = $idLista AND esRealizada = 1
    ORDER BY etiqueta.orden_prioridad ASC";

$resultado_tareas_completadas = mysqli_query($conexion, $sql_tareas_completadas);
while ($fila = mysqli_fetch_assoc($resultado_tareas_completadas)) {
    $tareas_completadas[] = $fila;
}

// $sql_tareas = "SELECT * FROM tarea WHERE id_lista = $idLista AND id_etiqueta = $etiquetas";
$sql_lista = "SELECT * FROM lista WHERE id = $idLista";

// Ejecutar consulta
$resultado_lista = mysqli_query($conexion, $sql_lista);
$listas = mysqli_fetch_assoc($resultado_lista);

$tareasNoCompletadasJSON = urlencode(json_encode($tareas_noCompletadas));
$tareasCompletadasJSON = urlencode(json_encode($tareas_completadas));
$listaJSON = urlencode(json_encode($listas));

header("refresh:0;url=mostrarTareas.php?tareasNoCompletadas=$tareasNoCompletadasJSON&listaSeleccionada=$listaJSON&tareasCompletadas=$tareasCompletadasJSON");
// exit();
