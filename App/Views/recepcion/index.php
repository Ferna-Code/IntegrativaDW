<head>
    <link rel="stylesheet" href="../../../../public/css/recepcion.css">
    <title>Recepci&oacute;n</title>
</head>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-center flex-column">
        <h2 class="titulo-recep">Recepcion y Digitacion</h2>
        <nav class="nav-ok">
            <a class="enlace-nav" href="#" onclick="controlVisi1()">REGISTRAR EXAMEN</a>
            <a class="enlace-nav" href="#" onclick="controlVisi2()">ENTREGAR RESULTADOS</a>
            <a class="enlace-nav" href="#" onclick="controlVisi3()">REGISTRAR PACIENTE</a>
        </nav>
        <div id="diagnostico" style="display:none">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-center flex-column">
                    <div class="form-group">
                        <h3>Rut de Paciente</h3>
                        <input type="text" class="form-control" id="buscar" placeholder="Rut">
                        <select id="miAdmin"></select>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <h1 class="text-center">Lista de Exámenes Médicos</h1>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">rut</th>
                                    <th scope="col">nombre</th>
                                    <th scope="col">apPat</th>
                                    <th scope="col">apMat</th>
                                    <th scope="col">telefono</th>
                                    <th scope="col">Centro Medico</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Opci&oacute;n</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                <?php foreach ($data as $row) : ?>
                                    <tr>
                                        <td><?php echo $row['rut']; ?></td>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['apPat']; ?></td>
                                        <td><?php echo $row['apMat']; ?></td>
                                        <td><?php echo $row['telefono']; ?></td>
                                        <td><?php echo $row['centro_codigo']; ?></td>
                                        <td><?php echo $row['fecha']; ?></td>
                                        <td><button class="btn btn-primary btn-sm">Ver Diagnostico</button></td>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--REGISTRO EXAMEN-->
        <div id="ingreso" class="ver-ingreso">
            <?php include("complementos/registroExamen.php"); ?>
        </div>

        <!--INGRESAR PACIENTE-->
        <div id="ingresarPaciente" class="ver-ingresos formulario" style="display:none">
            <?php include("complementos/ingresarUsuario.php"); ?>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<script src="../../../../public/js/recepcion.js"></script>

</html>