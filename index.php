<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion - TaskNow</title>
    <link rel="stylesheet" href="src/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <section class="pantallaInicioSesion">
        <div class="pantallaInicioSesion_contenido">
            <figure class="pantallaInicioSesion_contenido--logo">
                <img src="src/img/Logo_tipo2.png" alt="Logo de la pagina">
            </figure>
            <form class="form pantallaInicioSesion_contenido--formulario" action="" method="post">
                <h4 class="formularioTitulo">Iniciar sesión en TaskNow</h4>
                <label class="form-label" for="txtUsernameLogin">Nombre de usuario: </label>
                <input type="text" class="form-control formularioInput" id="txtUsernameLogin" name="txtUsernameLogin" required>
                <label class="form-label" for="txtPasswordLogin">Contraseña: </label>
                <input type="password" class="form-control formularioInput" name="txtPasswordLogin" id="txtPasswordLogin" required>
                <input type="submit" value="Entrar" name="btnIniciarSesion" class="btn_formularios">
            </form>
            <div class="pantallaPrincipal_contenido--enlaceRegistro">
                <p class="enlaceRegistro_parrafo">¿No tienes una cuenta? <a href="">Registrate ahora</a></p>
            </div>
        </div>
    </section>

</body>