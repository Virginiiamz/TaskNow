<?php
session_start();
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$nombreEtiqueta = $_POST['nombreEtiqueta'];
$colorEtiqueta = $_POST['colorEtiqueta'];
$ordenEtiqueta = $_POST['ordenEtiqueta'];

// No validamos, suponemos que la entrada de datos es correcta
$idUsuario = $_SESSION['usuario']['id'];

// Definir insert
$sql = "INSERT INTO etiqueta(`id`, `nombre`, `color`, `orden_prioridad`, `id_usuario`) 
                VALUES (null,'" . $nombreEtiqueta . "', '" . $colorEtiqueta . "', $ordenEtiqueta , $idUsuario);";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Se ha creado la etiqueta correctamente</h2>";
}
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header("refresh:0;url=inicio.php");
