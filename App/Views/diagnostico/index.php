<head>
    <link rel="stylesheet" href="../../../../public/css/diagnostico.css">
    <title>Interfaz de Diagnosticos Médicos</title>
</head>

<body>
    <div class="mb-5 text-center ">
        <h2>Diagnosticos de Muestra</h2>
    </div>
    <div class="container text-center">
        <div class="row">
            <!--Tamaño del Formulario -->
            <div class="col-md-5 mx-auto">
                <form action="/diagnostico/index" method="POST" class="form-diagnostico">
                    <h2 class="mb-5">Filtros de Búsqueda</h2>

                    <div class="col">
                        <label for="idExamen">ID de Examen:</label>
                        <input class="mb-3" type="text" id="idExamen" name="idExamen">
                    </div>
                    <div class="col">
                        <label for="nombrePaciente">Nombre del Paciente:</label>
                        <input class="mb-3" type="text" id="nombrePaciente" name="nombrePaciente">
                    </div>
                    <div class="col">
                        <label for="fechaCreacion">Fecha de Creación:</label>
                        <input class="mb-4" type="date" id="fechaCreacion" name="fechaCreacion">
                    </div>
                    <div class="col">
                        <button class="btn btn-default button-diagnostico " type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="container">
        <h1 class="text-center">Lista de Exámenes Médicos</h1>
        <div class="row">
            <div class="col-12">
                <table>
                    <thead>
                        <tr>
                            <th>N° Examen</th>
                            <th>Codigo estado Exámen</th>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Tincíon</th>
                            <th>Observación con Tinción</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($examenes as $examen) : ?>
                            <tr>
                                <td><?php echo $examen["id"]; ?></td>
                                <td><?php echo $examen["diagnostico_codigo"]; ?></td>
                                <td><?php echo $examen["rut"]; ?></td>
                                <td><?php echo $examen["nombre"]; ?></td>
                                <td><?php echo $examen["apPat"]; ?></td>
                                <td><?php echo $examen["apMat"]; ?></td>
                                <td><?php echo $examen["confirmacion"] == 1 ? "Confirmado" : "No Confirmado"; ?></td>
                                <td><?php echo $examen["observacion"]; ?></td>
                                <td>
                                    <div class="row gap-1">
                                        <div class="col">
                                            <a href="#" onclick="openModal(<?= $examen['id']; ?>)">Diagnosticar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal para modificar -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Actualizar estado de las muestras</h2>
            <!-- Contenido del formulario para modificar -->
            <form id="modifyForm" class="form-diagnostico">

                <label for="modEstado">Nuevo Estado:</label>
                <select id="modEstado" name="modEstado" required>
                    <?php foreach ($codigosDiagnostico as $cod) : ?>
                        <option value="<?= $cod['codigo']; ?>"><?= $cod['descripcion']; ?></option>
                    <?php endforeach; ?>
                </select>


                <input type="hidden" id="idExamen">
                <button class="button-diagnostico" type="button" onclick="updateExam()">Guardar Cambios</button>
            </form>
        </div>
    </div>

    </div>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <script src="../../../../public/js/diagnostico.js"></script>
</body>