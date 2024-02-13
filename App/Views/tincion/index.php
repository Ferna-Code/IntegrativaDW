<head>
    <link rel="stylesheet" href="../../../../public/css/diagnostico.css">
    <link rel="stylesheet" href="../../../../public/css/tincion.css">
    <title>Tinción</title>
</head>

<div class="container">
    <h1 class="text-center">Lista de Exámenes Médicos</h1>
    <div class="row">
        <div class="col-12">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Examen Id</th>
                        <th>Confirmación</th>
                        <th>Observación</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['examen_id']; ?></td>
                            <td><?php echo ($row['confirmacion'] != 0 ? 'Confirmado' : 'Por Confirmar'); ?></td>
                            <td><?php echo $row['observacion']; ?></td>
                            <td><?php echo $row['fecha']; ?></td>
                            <td><?php echo $row['hora']; ?></td>
                            <td>
                                <button data-id="<?php echo $row['id']; ?>" type='button' class='btn btn-primary openModalBtn'>Diagnosticar</button>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tincionModalLabel">Consultar Examen</h1>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form id="myFormTincion" class="form-tincion" method="POST">

                    <label for="placa_muestra"><b>Confirmar Tinción:</b></label>

                    <input id="confirmacion" type="checkbox" name="confirmacion" required>
                    <br>

                    <label for="proceso_realizado"><b>Proceso Realizado:</b></label>

                    <textarea id="observacion" name="observacion" rows="4" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<script src="../../../../public/js/tincion.js"></script>

</div>