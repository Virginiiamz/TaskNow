<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$idtarea = $_POST['txtModificarId'];
$idlista = $_POST['idLista'];
$descripcion = $_POST['txtModificarDescripcion'];
$estado = $_POST['txtModificarEstado'];
$etiqueta = $_POST['txtModificarEtiqueta'];
$esInicio = $_POST['esInicio'];

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
