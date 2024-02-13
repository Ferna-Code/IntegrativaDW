<?php
require_once __DIR__ . '/../../Models/Tincion_model.php';

interface TincionDao
{

    public function getDataTincion();
    public function updateTincion(TincionModel $tincion);

    public function buscarId(TincionModel $tincion);

}
