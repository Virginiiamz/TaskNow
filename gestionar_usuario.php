<?php
session_start();
$etiquetas = require_once('get_etiquetas.php');
$listas = require_once('get_listas.php');
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuario - TaskNow</title>
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
                                    id="navegacionEnlaces_active--enlace"><i class="bi bi-house-door-fill me-1"></i> Inicio</p>
                            </a>
                        </div>
                        <div class="navegacionEnlaces_background">
                            <a href="editar_etiqueta.php" class="text-decoration-none navegacionEnlaces_background--enlace">
                                <p class="fs-5 m-0"><i class="bi bi-bookmark-fill me-1"></i> Editar etiquetas</p>
                            </a>
                        </div>
                        <div class="navegacionEnlaces_background">
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalEliminarEtiqueta" class="text-decoration-none navegacionEnlaces_background--enlace">
                                <p class="fs-5 m-0"><i class="bi bi-bookmark-x-fill me-1"></i> Eliminar etiquetas</p>
                            </a>
                        </div>
                        <div class="navegacionEnlaces_background">
                            <a href="" class="text-decoration-none navegacionEnlaces_background--enlace">
                                <p class="fs-5 m-0"><i class="bi bi-clipboard2-fill me-1"></i> Modificar listas</p>
                            </a>
                        </div>
                        <div class="navegacionEnlaces_background">
                            <a href="" class="text-decoration-none navegacionEnlaces_background--enlace">
                                <p class="fs-5 m-0"><i class="bi bi-archive-fill me-1"></i> Listas archivadas</p>
                            </a>
                        </div>
                        <div class="navegacionEnlaces_background">
                            <a href="" class="text-decoration-none navegacionEnlaces_background--enlace">
                                <p class="fs-5 m-0"><i class="bi bi-archive-fill me-1"></i> Desarchivar listas</p>
                            </a>
                        </div>
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
                                    id="navegacionEnlaces_active--enlace"><i class="bi bi-house-door-fill me-1"></i> Inicio</p>
                            </a>
                        </div>
                        <div class="navegacionEnlaces_background">
                            <a href="editar_etiqueta.php" class="text-decoration-none navegacionEnlaces_background--enlace">
                                <p class="fs-5 m-0"><i class="bi bi-bookmark-fill me-1"></i> Editar etiquetas</p>
                            </a>
                        </div>
                        <div class="navegacionEnlaces_background">
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalEliminarEtiqueta" class="text-decoration-none navegacionEnlaces_background--enlace">
                                <p class="fs-5 m-0"><i class="bi bi-bookmark-x-fill me-1"></i> Eliminar etiquetas</p>
                            </a>
                        </div>
                        <div class="navegacionEnlaces_background">
                            <a href="" class="text-decoration-none navegacionEnlaces_background--enlace">
                                <p class="fs-5 m-0"><i class="bi bi-clipboard2-fill me-1"></i> Modificar listas</p>
                            </a>
                        </div>
                        <div class="navegacionEnlaces_background">
                            <a href="" class="text-decoration-none navegacionEnlaces_background--enlace">
                                <p class="fs-5 m-0"><i class="bi bi-archive-fill me-1"></i> Listas archivadas</p>
                            </a>
                        </div>
                        <div class="navegacionEnlaces_background">
                            <a href="" class="text-decoration-none navegacionEnlaces_background--enlace">
                                <p class="fs-5 m-0"><i class="bi bi-archive-fill me-1"></i> Desarchivar listas</p>
                            </a>
                        </div>
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
                <h2 class="text-white m-3">Configurar usuario</h2>
            </section>

            <!-- Modal modificar etiqueta -->
            <div class="modal fade" id="modalModificarEtiqueta" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar etiqueta</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="editar_etiqueta.php" method="post">
                                <div class="mb-3">
                                    <label for="modEtiqueta" class="form-label">Etiqueta: </label>
                                    <select class="form-select" name="modEtiqueta" id="modEtiqueta" required>
                                        <option value="" selected>Selecciona una etiqueta</option>
                                        <?php
                                        foreach ($etiquetas as $etiqueta) {
                                        ?>
                                            <option value="<?php echo $etiqueta['id'] ?>"><?php echo $etiqueta['nombre'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn_formularios text-white">Seleccionar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal eliminar etiqueta -->
            <div class="modal fade" id="modalEliminarEtiqueta" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar etiqueta</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="procesar_borrar_etiqueta.php" method="post">
                                <div class="mb-3">
                                    <label for="eliminarEtiqueta" class="form-label">Etiqueta: </label>
                                    <select class="form-select" name="eliminarEtiqueta" id="eliminarEtiqueta" required>
                                        <option value="" selected>Selecciona una etiqueta</option>
                                        <?php
                                        foreach ($etiquetas as $etiqueta) {
                                        ?>
                                            <option value="<?php echo $etiqueta['id'] ?>"><?php echo $etiqueta['nombre'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn_formularios text-white">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>