<?php
session_start();
$etiquetas = require_once('get_etiquetas.php');
$listas = require_once('get_listas.php');
if (isset($_POST['modEtiqueta'])) {
    $idEtiqueta = $_POST['modEtiqueta'];

    foreach ($etiquetas as $etiqueta) {
        if ($etiqueta['id'] == $idEtiqueta) {
            $etiquetaSeleccionada = $etiqueta;
        }
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Etiqueta - TaskNow</title>
    <link rel="stylesheet" href="src/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <section class="pantallaPrincipal">
        <sidebar class="rounded-end-2 p-0 pantallaPrincipal_sidebar">
            <nav class="navbar navbar-expand-md pantallaPrincipal_sidebar--navegacion">

                <div class="navegacionPrincipal">
                    <a class="navbar-brand align-self-center navegacionPrincipal_logo" href="#"><img
                            src="src/img/Logo_tipo2.png" class="img-fluid navegacionPrincipal_logo--logo"
                            alt="Logo"></a>
                    <button class="navegacionPrincipal_btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse navegacionEnlaces" id="navbarNavAltMarkup">
                    <div class="navbar-nav d-flex flex-column gap-2 align-items-center">
                        <a href="gestionar_usuario.php" class="text-decoration-none">
                            <div class="navegacionEnlaces_usuario">
                                <p class="fs-5 ms-2 navegacionEnlaces_usuario--enlace"><i
                                        class="bi bi-person-circle me-1"></i>
                                    <span><?php echo $_SESSION['usuario']['username'] ?></span>
                                </p>
                            </div>
                        </a>
                        <a href="inicio.php" class="navegacionEnlaces_background text-decoration-none">
                            <div class="navegacionEnlaces_background" id="navegacionEnlaces_active">
                                <p class="navegacionEnlaces_background--enlace fs-5 ms-2"
                                    id="navegacionEnlaces_active--enlace"><i class="bi bi-house-door-fill me-1"></i>
                                    Inicio</p>
                            </div>
                        </a>
                        <?php
                        foreach ($listas as $lista) {
                        ?>
                            <a href="get_tarea.php?idLista=<?php echo $lista['id'] ?>" class="text-decoration-none">
                                <div class="navegacionEnlaces_background">
                                    <p class="navegacionEnlaces_background--enlace fs-5 ms-2"><i
                                            class="bi bi-journal-check me-1"></i><span><?php echo $lista['nombre'] ?></span>
                                    </p>
                                    <a href="procesar_borrar_lista.php?idLista=<?php echo $lista['id'] ?>">
                                        <i class="bi bi-x-lg me-3"></i>
                                    </a>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </sidebar>
        <main class="pantallaPrincipal_contenido" style="min-height: 100vh;">
            <section class="pantallaPrincipal_contenido--header">
                <a href="procesar_cerrar_sesion.php" class="header_btnCrear fs-5"><i class="bi bi-reply-all-fill me-1 fs-5"></i> Cerrar sesión</a>
                <a href="gestionar_usuario.php" class="header_btnUsuario fs-5"><span><?php echo $_SESSION['usuario']['username'] ?></span>
                    <i class="bi bi-person-circle ms-1 fs-5"></i></a>
            </section>

            <section>
                <h2 class="text-white m-3">Editar etiqueta</h2>
                <form action="procesar_editar_etiqueta.php" class="form m-3 formularioEditarTarea" method="post">
                    <input type="hidden" name="txtModificarId" value="<?php echo $etiquetaSeleccionada['id'] ?>">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="txtModificarNombre" class="form-label text-white fs-5">Nombre:</label>
                            <input type="text" class="form-control" name="txtModificarNombre" id="txtModificarNombre" value="<?php echo $etiquetaSeleccionada['nombre'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="txtModificarOrden" class="form-label text-white fs-5">Orden de prioridad:</label>
                            <input type="number" class="form-control" name="txtModificarOrden" id="txtModificarOrden" value="<?php echo $etiquetaSeleccionada['orden_prioridad'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="txtModificarColor" class="form-label text-white fs-5">Color: </label>
                            <input type="color" class="form-control" name="txtModificarColor" id="txtModificarColor" value="<?php echo $etiquetaSeleccionada['color'] ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn_formularios fs-5">Guardar</button>
                </form>
            </section>
        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>