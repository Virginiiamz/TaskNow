<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$idUsuario = $_SESSION['usuario']['id'];

$tareas_noCompletadas = [];

$sql_tareas_noCompletadas = "SELECT tarea.*, etiqueta.orden_prioridad 
    FROM tarea
    JOIN etiqueta ON tarea.id_etiqueta = etiqueta.id AND etiqueta.id_usuario = $idUsuario
    WHERE esRealizada = 0
    ORDER BY etiqueta.orden_prioridad ASC, tarea.fecha_venc ASC";
$resultado_tareas_noCompletadas = mysqli_query($conexion, $sql_tareas_noCompletadas);

while ($fila = mysqli_fetch_assoc($resultado_tareas_noCompletadas)) {
    $tareas_noCompletadas[] = $fila;
}

return $tareas_noCompletadas;
