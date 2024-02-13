<?php
class Router
{
    public static function route()
    {
        // Definir el contexto de base
        $base_path = '/ipleones/labMuest';

        // Asegúrate de que la URL comience con "/labMuest/"
        if (strpos($_SERVER['REQUEST_URI'], $base_path) === 0) {
            $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base_path));
        }

        if ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '') {
            $controller = "Home";
            $method = "index";
        } else {
            $request_uri = explode("/", $_SERVER['REQUEST_URI']);

            $controller = ucfirst($request_uri[1]);
            $method = isset($request_uri[2]) ? $request_uri[2] : "index";
        }


        // Cargar la clase y el método que nos piden
        $controller_file = CONTROLLERS_PATH . $controller . 'Controller' . '.php';

        if (file_exists($controller_file)) {
            require_once $controller_file;
            $const = $controller . 'Controller';
            $class_controller = new $const();

            if (method_exists($class_controller, $method)) {
                // Llamar al método
                $class_controller->$method();
            } else {
                echo "Método no encontrado: " . $method;
            }
        } else {
            echo "Archivo no encontrado";
        }
    }
}
