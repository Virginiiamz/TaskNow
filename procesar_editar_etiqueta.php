<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$idEtiqueta = trim($_POST['txtModificarId']);
$nombreEtiqueta = trim($_POST['txtModificarNombre']);
$colorEtiqueta = trim($_POST['txtModificarColor']);
$ordenEtiqueta = trim($_POST['txtModificarOrden']);

// No validamos, suponemos que la entrada de datos es correcta

// Definir update
$sql = "UPDATE etiqueta SET nombre = '" . $nombreEtiqueta . "' , color = '" . $colorEtiqueta . "', orden_prioridad = $ordenEtiqueta WHERE id = $idEtiqueta ;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Tarea actualizada</h2>";
}

header("refresh:0;url=gestionar_usuario.php");
