<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros

$id_lista = trim($_POST['txtIdListaTarea']);
$descripcion = trim($_POST['txtDescripcionTarea']);
$etiqueta = trim($_POST['txtEtiquetaTarea']);
$fechaVencimiento = trim($_POST['txtfechaVenTarea']);

// Definir insert
$sql = "INSERT INTO tarea(`id`, `descripcion`, `esrealizada`, `fecha_venc`, `id_lista`, `id_etiqueta`) 
                VALUES (null,'" . $descripcion . "', 0, '" . $fechaVencimiento . "',  $id_lista, $etiqueta);";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Se ha creado la tarea correctamente</h2>";
}

// echo $mensaje;
header("refresh:0;url=get_tarea.php?idLista=$id_lista");
