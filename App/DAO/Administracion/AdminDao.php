<?php
require_once __DIR__ . '/../../Models/Admin_model.php';
require_once __DIR__ . '/../../Models/centrodetomas_model.php';

interface AdminDao
{
    public function registroAdmin(AdminModel $admin);
    public function getPerfiles();
    public function getProcedencias();
    public function getPerfil($id);
    public function getDataAdmin();
    public function actualizarAdmin(AdminModel $admin);
    public function eliminarAdmin(AdminModel $admin);
    public function registroCentro(centroModel $centro);
    public function actualizarCentro(centroModel $centro);
    public function eliminarCentro(centroModel $centro);
    public function buscarCentros(centroModel $centro);
    public function buscarId(centroModel $centro);
    public function buscarFrecuenciaCentros(centroModel $centro);
}
