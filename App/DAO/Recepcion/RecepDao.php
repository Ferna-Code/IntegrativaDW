<?php
require_once __DIR__ . '/../../Models/Paciente_model.php';
require_once __DIR__ . '/../../Models/Examen_model.php';

interface RecepDao{
    function getUsuarios();
    function insertUser(PacienteModel $admin);
    function insertExamen(ExamenModel $admin);
}