<?php
session_start();
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$nombreLista = trim($_POST['txtNombreLista']);

// No validamos, suponemos que la entrada de datos es correcta
$idUsuario = $_SESSION['usuario']['id'];

// Definir insert
$sql = "INSERT INTO lista(`id`, `nombre`, `id_usuario`) 
                VALUES (null,'" . $nombreLista . "', $idUsuario);";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Se ha creado la lista correctamente</h2>"; 
}
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header( "refresh:0;url=inicio.php" );
?>