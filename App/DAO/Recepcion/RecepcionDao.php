<?php
require_once __DIR__ . '/../../Models/Paciente_model.php';
interface RecepcionDao
{
    public function getRegistroRecepcion();
    public function buscarRut(PacienteModel $paciente);

}
