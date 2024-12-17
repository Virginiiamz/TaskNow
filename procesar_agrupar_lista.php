<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$idlista = $_REQUEST['lista'];


$sql = "UPDATE lista SET agrupado = 1 WHERE id = $idlista;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Se ha agrupado la lista correctamente</h2>";
}
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header("refresh:0;url=inicio.php");
