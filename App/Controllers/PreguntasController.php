<?php
session_start();

class PreguntasController
{
    public function index()
    {
        require_once VIEWS_PATH . 'layout/header.php';
        include VIEWS_PATH . 'preguntasFrecuetes/index.php';
        require_once VIEWS_PATH . 'layout/footer.php';
    }
}
