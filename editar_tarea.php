<?php

if (isset($_REQUEST['idTarea'])) {
    // Recuperar los parámetros
    $idTarea = $_REQUEST['idTarea'];
    $descripcionTarea = $_REQUEST['descripcionTarea'];
    $esrealizadaTarea = $_REQUEST['esrealizadaTarea'];
    $fechavencTarea = $_REQUEST['fechavencTarea'];
    $idEtiqueta = $_REQUEST['idEtiqueta'];
    $nombreEtiqueta = $_REQUEST['etiquetaNombre'];
    $idLista = $_REQUEST['idLista'];
    $esInicio = $_REQUEST['esInicio'];

    $etiquetas = require_once('get_etiquetas.php');
    $listas = require_once('get_listas.php');
    $usuario = $_SESSION['usuario'];
}

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - TaskNow</title>
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
                    <a class="navbar-brand align-self-center navegacionPrincipal_logo" href="inicio.php"><img
                            src="src/img/Logo_tipo2.png" class="img-fluid navegacionPrincipal_logo--logo"
                            alt="Logo"></a>
                    <button class="navegacionPrincipal_btn" type="button" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="offcanvas offcanvas-start d-md-none navegacionEnlaces" style="background-color: #2F2F2F;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="navbar-nav d-flex flex-column gap-2 align-items-center w-100">
                        <button type="button" class="btn-close btn-close-white align-self-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        <div class="navegacionEnlaces_usuario">
                            <a href="gestionar_usuario.php" class="text-decoration-none navegacionEnlaces_usuario--enlace">
                                <p class="fs-5 m-0"><i
                                        class="bi bi-person-circle me-1"></i>
                                    <span><?php echo $_SESSION['usuario']['username'] ?></span>
                                </p>
                            </a>
                        </div>
                        <div class="navegacionEnlaces_background" id="navegacionEnlaces_active">
                            <a href="inicio.php" class="navegacionEnlaces_background--enlace text-decoration-none">
                                <p class="fs-5 m-0"
                                    id="navegacionEnlaces_active--enlace"><i class="bi bi-house-door-fill me-1"></i>
                                    Inicio</p>
                            </a>
                        </div>
                        <?php
                        foreach ($listas as $lista) {
                        ?>
                            <div class="navegacionEnlaces_background">
                                <a href="get_tarea.php?idLista=<?php echo $lista['id'] ?>" class="text-decoration-none navegacionEnlaces_background--enlace">
                                    <p class="fs-5 m-0"><i
                                            class="bi bi-journal-check me-1"></i><?php echo $lista['nombre'] ?>
                                    </p>
                                </a>
                                <a href="procesar_borrar_lista.php?idLista=<?php echo $lista['id'] ?>">
                                    <i class="bi bi-x-lg me-3"></i>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="collapse navbar-collapse d-sm-none navegacionEnlaces" id="navbarNavAltMarkup">
                    <div class="navbar-nav d-flex flex-column gap-2 align-items-center w-100">
                        <div class="navegacionEnlaces_usuario">
                            <a href="gestionar_usuario.php" class="text-decoration-none navegacionEnlaces_usuario--enlace">
                                <p class="fs-5 m-0"><i
                                        class="bi bi-person-circle me-1"></i>
                                    <span><?php echo $_SESSION['usuario']['username'] ?></span>
                                </p>
                            </a>
                        </div>
                        <div class="navegacionEnlaces_background" id="navegacionEnlaces_active">
                            <a href="inicio.php" class="navegacionEnlaces_background--enlace text-decoration-none">
                                <p class="fs-5 m-0"
                                    id="navegacionEnlaces_active--enlace"><i class="bi bi-house-door-fill me-1"></i>
                                    Inicio</p>
                            </a>
                        </div>
                        <?php
                        foreach ($listas as $lista) {
                        ?>
                            <div class="navegacionEnlaces_background">
                                <a href="get_tarea.php?idLista=<?php echo $lista['id'] ?>" class="text-decoration-none navegacionEnlaces_background--enlace">
                                    <p class="fs-5 m-0"><i
                                            class="bi bi-journal-check me-1"></i><?php echo $lista['nombre'] ?>
                                    </p>
                                </a>
                                <a href="procesar_borrar_lista.php?idLista=<?php echo $lista['id'] ?>">
                                    <i class="bi bi-x-lg me-3"></i>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </sidebar>

        <main class="pantallaPrincipal_contenido" style="height: 100vh;">
            <section class="pantallaPrincipal_contenido--header">
                <a href="get_tarea.php?idLista=<?php echo $idLista ?>" class="header_btnCrear fs-5"><i class="bi bi-arrow-left-circle-fill me-1 fs-5"></i>Volver</a>
                <a href="gestionar_usuario.php" class="header_btnUsuario fs-5"><span><?php echo $usuario['username'] ?></span>
                    <i class="bi bi-person-circle ms-1 fs-5"></i></a>
            </section>

            <section>
                <h2 class="text-white m-3">Editar tarea</h2>
                <!-- Formulario Editar -->
                <form action="procesar_editar_tarea.php" class="form m-3 formularioEditarTarea" method="post">
                    <input type="hidden" name="txtModificarId" value="<?php echo $idTarea ?>">
                    <input type="hidden" name="idLista" value="<?php echo $idLista ?>">
                    <input type="hidden" name="esInicio" value="<?php echo $esInicio ?>">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="txtModificarDescripcion" class="form-label text-white fs-5">Descripcion:</label>
                            <input type="text" class="form-control" id="txtModificarDescripcion" name="txtModificarDescripcion" value="<?php echo $descripcionTarea ?>">
                        </div>
                    </div>
                    <div class="row mb-3 mb-md-0">
                        <div class="col-md-2 mb-3">
                            <label for="txtModificarEstado" class="form-label text-white fs-5">Estado:</label>
                            <select class="form-select" name="txtModificarEstado" id="txtModificarEstado">
                                <option <?php echo $esrealizadaTarea == 1 ? 'selected' : '' ?> value="0">No completada</option>
                                <option <?php echo $esrealizadaTarea == 1 ? 'selected' : ''; ?> value="1">Completada</option>
                            </select>
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="txtModificarEtiqueta" class="form-label text-white fs-5">Etiqueta: </label>
                            <select class="form-select" name="txtModificarEtiqueta" id="txtModificarEtiqueta" required>
                                <?php
                                foreach ($etiquetas as $etiqueta) {
                                ?>
                                    <option <?php echo $idEtiqueta == $etiqueta['id'] ? 'selected' : ''; ?> value="<?php echo $etiqueta['id'] ?>"><?php echo $etiqueta['nombre'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
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