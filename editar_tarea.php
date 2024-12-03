<?php
$listas = require_once('get_listas.php');
$usuario = require_once('get_usuario.php');
$etiquetas = require_once('get_etiquetas.php');

if (isset($_REQUEST['idTarea'])) {
    // Recuperar los parámetros
    $idTarea = $_REQUEST['idTarea'];
    $descripcionTarea = $_REQUEST['descripcionTarea'];
    $esrealizadaTarea = $_REQUEST['esrealizadaTarea'];
    $fechavencTarea = $_REQUEST['fechavencTarea'];
    $idEtiqueta = $_REQUEST['idEtiqueta'];
    $nombreEtiqueta = $_REQUEST['etiquetaNombre'];
    $idLista = $_REQUEST['idLista'];
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
                                    <span><?php echo $usuario['username'] ?></span>
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
                <a href="" class="header_btnCrear fs-5" data-bs-toggle="modal" data-bs-target="#modalCrearTarea"><i
                        class="bi bi-plus-circle-fill me-1"></i>Crear tarea</a>
                <a href="" class="header_btnUsuario fs-5"><span><?php echo $usuario['username'] ?></span>
                    <i class="bi bi-person-circle ms-1 fs-5"></i></a>
            </section>

            <section>
                <h2 class="text-white m-3">Editar tarea</h2>
                <!-- Modal Editar -->
                <form action="procesar_editar_tarea.php" class="form m-3 formularioEditarTarea" method="post">
                    <input type="hidden" name="txtModificarId" value="<?php echo $idTarea ?>">
                    <input type="hidden" name="idLista" value="<?php echo $idLista ?>">
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
                                    <option <?php echo $idEtiqueta==$etiqueta['id'] ? 'selected' : ''; ?> value="<?php echo $etiqueta['id'] ?>"><?php echo $etiqueta['nombre'] ?></option>
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