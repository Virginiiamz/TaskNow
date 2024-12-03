<?php
$listas = require_once('get_listas.php');
$usuario = require_once('get_usuario.php');

if (isset($_GET['tareas']) && isset($_GET['listaSeleccionada']) && isset($_GET['etiquetas'])) {
    // Decodificar el JSON que recibimos de la URL
    $tareas = json_decode($_GET['tareas'], true);  // El segundo parámetro 'true' convierte el JSON a un array asociativo
    $listaSeleccionada = json_decode($_GET['listaSeleccionada'], true);
    $etiquetas = json_decode($_GET['etiquetas'], true);
    // var_dump($tareas);
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
        <main class="pantallaPrincipal_contenido" style="min-height: 100vh;">
            <section class="pantallaPrincipal_contenido--header">
                <a href="" class="header_btnCrear fs-5" data-bs-toggle="modal" data-bs-target="#modalCrearTarea"><i
                        class="bi bi-plus-circle-fill me-1"></i>Crear tarea</a>
                <a href="" class="header_btnUsuario fs-5"><span><?php echo $usuario['username'] ?></span>
                    <i class="bi bi-person-circle ms-1 fs-5"></i></a>
            </section>

            <section>
                <h2 class="text-white m-3"><?php echo $listaSeleccionada['nombre'] ?></h2>
                <div class="pantallaTareas">
                    <?php
                    foreach ($tareas as $tarea) {
                        foreach ($etiquetas as $etiqueta) {
                            if ($etiqueta['id'] == $tarea['id_etiqueta']) {
                                $etiquetaSeleccionada = $etiqueta;
                            }
                        }
                    ?>
                        <div class="pantallaTareas_contenido">
                            <a class="pantallaTareas_contenido--informacion" href="editar_tarea.php?
                            idTarea=<?php echo $tarea['id'] ?>
                            &descripcionTarea=<?php echo $tarea['descripcion'] ?>
                            &esrealizadaTarea=<?php echo $tarea['esrealizada'] ?>
                            &fechavencTarea=<?php echo $tarea['fecha_venc'] ?>
                            &idEtiqueta=<?php echo $tarea['id_etiqueta'] ?>
                            &etiquetaNombre=<?php echo $etiquetaSeleccionada['nombre'] ?>
                            &idLista=<?php echo $listaSeleccionada['id'] ?>">

                                <div class="checkbox-wrapper-12">
                                    <div class="cbx">
                                        <input <?php echo $tarea['esrealizada'] ? 'checked' : ''; ?> type="checkbox" id="cbx-12" disabled>
                                        <label for="cbx-12"></label>
                                        <svg fill="none" viewBox="0 0 15 14" height="12" width="13">
                                            <path d="M2 8.36364L6.23077 12L13 2"></path>
                                        </svg>
                                    </div>

                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <filter id="goo-12">
                                                <feGaussianBlur result="blur" stdDeviation="4" in="SourceGraphic"></feGaussianBlur>
                                                <feColorMatrix result="goo-12" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 22 -7" mode="matrix" in="blur"></feColorMatrix>
                                                <feBlend in2="goo-12" in="SourceGraphic"></feBlend>
                                            </filter>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="fs-5 tareaInformacion_descripcion"><?php echo $tarea['descripcion'] ?></p>
                                <p class="fs-5 tareaInformacion_fecha"><?php echo $tarea['fecha_venc'] ?></p>
                                <?php
                                foreach ($etiquetas as $etiqueta) {
                                    if ($etiqueta['id'] == $tarea['id_etiqueta']) {
                                ?>
                                        <span class="tareaInformacion_etiqueta fs-5" style="background-color: <?php echo $etiqueta['color'] ?>;"><?php echo $etiqueta['nombre'] ?></span>

                                <?php
                                    }
                                }
                                ?>
                            </a>
                            <a class="pantallaTareas_contenido--borrarTarea fs-5" href="procesar_borrar_tarea.php?idTarea=<?php echo $tarea['id'] ?>&idLista=<?php echo $listaSeleccionada['id'] ?>"><i class="bi bi-trash3-fill text-white"></i></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </section>

            <!-- Modal Crear -->
            <div class="modal fade" id="modalCrearTarea" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tarea</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="procesar_alta_tarea.php" method="post">
                                <input type="hidden" name="txtIdListaTarea" id="txtIdListaTarea" value="<?php echo $listaSeleccionada['id'] ?>">
                                <div class="mb-3">
                                    <label for="txtDescripcionTarea" class="form-label">Descripción: </label>
                                    <input type="text" class="form-control" id="txtDescripcionTarea"
                                        name="txtDescripcionTarea">
                                </div>
                                <div class="mb-3">
                                    <label for="txtEtiquetaTarea" class="form-label">Etiqueta: </label>
                                    <select class="form-select" name="txtEtiquetaTarea" id="txtEtiquetaTarea">
                                        <option value="1" selected>Selecciona una etiqueta</option>
                                        <!-- <option th:each="etiqueta: ${listaEtiquetas}" th:value="${etiqueta.id_etiqueta}"
                                            th:text="${etiqueta.nombre}"
                                            th:style="'color:' + ${etiqueta.color}"></option> -->
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="txtfechaVenTarea" class="form-label">Fecha vencimiento: </label>
                                    <input type="date" class="form-control" id="txtfechaVenTarea" name="txtfechaVenTarea" required>
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