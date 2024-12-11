<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$idtarea = trim($_POST['txtModificarId']);
$idlista = trim($_POST['idLista']);
$descripcion = trim($_POST['txtModificarDescripcion']);
$estado = trim($_POST['txtModificarEstado']);
$etiqueta = trim($_POST['txtModificarEtiqueta']);
$esInicio = trim($_POST['esInicio']);

// No validamos, suponemos que la entrada de datos es correcta

// Definir update
$sql = "UPDATE tarea SET descripcion = '" . $descripcion . "' , esrealizada = $estado , id_etiqueta = $etiqueta WHERE id = $idtarea ;";

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

if ($esInicio == false) {
    header("refresh:0;url=get_tarea.php?idLista=$idlista");
} else {
    header("refresh:0;url=inicio.php");
}
