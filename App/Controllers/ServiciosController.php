<?php
session_start();

class ServiciosController
{
    public function index()
    {
        require_once VIEWS_PATH . 'layout/header.php';
        include VIEWS_PATH . 'servicios/index.php';
        require_once VIEWS_PATH . 'layout/footer.php';
        
    }
}
