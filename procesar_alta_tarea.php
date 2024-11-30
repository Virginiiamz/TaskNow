<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros

$id_lista = (int)$_POST['txtIdListaTarea'];
$descripcion = $_POST['txtDescripcionTarea'];
$etiqueta = $_POST['txtEtiquetaTarea'];
$fechaVencimiento = $_POST['txtfechaVenTarea'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir insert
$sql = "INSERT INTO tarea(`id`, `descripcion`, `esrealizada`, `fecha_venc`, `id_lista`, `id_etiqueta`) 
                VALUES (null,'" . $descripcion . "', 0, null, 1, null);";

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

echo $mensaje;
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
// header( "refresh:0;url=mostrarTareas.php" );
