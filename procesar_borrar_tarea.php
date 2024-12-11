<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$idtarea = $_REQUEST['idTarea'];
$idlista = $_REQUEST['idLista'];
$esInicio = $_REQUEST['esInicio'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir delete
$sql = "DELETE FROM tarea WHERE id = $idtarea;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>La tarea se ha borrado correctamente</h2>"; 
}

if ($esInicio == true) {
    header( "refresh:0;url=inicio.php" );
} else {
    header( "refresh:0;url=get_tarea.php?idLista=$idlista" );
}

?>