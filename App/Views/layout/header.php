<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../../../public/css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<!--Menú-->

<body>

    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <div class="collapse navbar-collapse col" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto align-items-center">
                    <?php

                    if (isset($_SESSION['nivelUsuario'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo "/".$_SESSION['pagina_local'] ?>">Inicio
                            </a>
                        </li>
                        <?php
                    }

                    if (isset($_SESSION['nivelUsuario'])) {
                        switch ($_SESSION['nivelUsuario']) {
                            case 1:
                        ?>
                                <li class="nav-item"><a class="nav-link" onclick="mostrarFormulario('formularioUsuarios')">Registro
                                        de usuarios</a></li>
                                <li class="nav-item"><a class="nav-link" onclick="mostrarFormulario('formularioCentroMedico')">Registro centro médico</a></li>
                                <li class="nav-item"><a class="nav-link" onclick="mostrarFormulario('verOpciones')">Consultas</a>
                                </li>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>

                    <li class="nav-item"><a class="nav-link" href="<?php echo SERVICIOS_URL; ?>">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo PREGUNTAS_FRECUENTES_URL; ?>">Preguntas
                            frecuentes</a></li>

                    <?php
                    if (isset($_SESSION['nivelUsuario'])) { //SI NO EXISTEN DATOS GUARDADOS EN LA SESION
                    ?>
                        <li class="nav-item">
                            <form method="post" action="/home">
                                <input type="submit" value="Cerrar sesión">
                                <input type="hidden" name="op" value="CERRAR_SESION">
                            </form>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

            </div>
            <div class="col text-center">
               <a class="nav-link" href="/"> <h1 class="title-lab">LABMUEST</h1>
                <p class="sub-title-lab">Procesamiento de muestra</p>
                </a>
            </div>
            <div class="col text-end">
                <a><img src="../../../public/img/logo.png" width="110" height="50"></a>

            </div>
        </div>
    </nav>
    <main>