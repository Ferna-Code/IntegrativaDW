<?php

require_once 'App/config.php';
require_once 'App/Router/router.php';
require_once 'App/Database.php';

$router = new Router();
$router->route();
