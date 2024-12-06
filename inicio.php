<?php
session_start();
$listas = require_once('get_listas.php');
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
                        <a href="" class="text-decoration-none">
                            <div class="navegacionEnlaces_usuario">
                                <p class="fs-5 ms-2 navegacionEnlaces_usuario--enlace"><i
                                        class="bi bi-person-circle me-1"></i>
                                    <span><?php $_SESSION['usuario']['username'] ?></span>
                                </p>
                            </div>
                        </a>
                        <a href="index.php" class="navegacionEnlaces_background text-decoration-none">
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
        <main class="pantallaPrincipal_contenido" style="height: 100vh;">
            <section class="pantallaPrincipal_contenido--header">
                <a href="" class="header_btnCrear fs-5" data-bs-toggle="modal" data-bs-target="#modalCrearLista"><i
                        class="bi bi-plus-circle-fill me-1"></i>Crear lista</a>
                <a href="" class="header_btnUsuario fs-5"><span><?php echo $_SESSION['usuario']['username'] ?></span><i class="bi bi-person-circle ms-1 fs-5"></i></a>
            </section>

            <section class="pantallaPrincipal_contenido--tituloInicio">
                <h2 class="text-white m-3">TAREAS PENDIENTES</h2>
                <a class="tituloInicio_btnEtiquetas" href="" data-bs-toggle="modal"
                    data-bs-target="#modalCrearEtiqueta"><i class="bi bi-bookmark-fill me-1"></i>Crear etiquetas</a>
            </section>

            <!-- Modal crear etiqueta -->
            <div class="modal fade" id="modalCrearEtiqueta" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Etiqueta</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="procesar_alta_etiqueta.php" method="post">
                                <div class="mb-3">
                                    <label for="nombreEtiqueta" class="form-label">Nombre: </label>
                                    <input type="text" class="form-control" id="nombreEtiqueta" name="nombreEtiqueta">
                                </div>
                                <div class="mb-3">
                                    <label for="colorEtiqueta" class="form-label">Color: </label>
                                    <input type="color" class="form-control" id="colorEtiqueta" name="colorEtiqueta">
                                </div>
                                <button type="submit" class="btn_formularios text-white">Crear</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal crear lista -->
            <div class="modal fade" id="modalCrearLista" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Lista</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="procesar_alta_lista.php" method="post">
                                <div class="mb-3">
                                    <label for="txtNombreLista" class="form-label">Nombre: </label>
                                    <input type="text" class="form-control" id="txtNombreLista" name="txtNombreLista" required>
                                </div>
                                <button type="submit" class="btn_formularios text-white">Crear</button>
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