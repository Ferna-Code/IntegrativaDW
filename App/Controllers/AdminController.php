<?php
session_start();
require_once __DIR__ . '/../Models/Admin_model.php';
require_once __DIR__ . '/../DAO/Administracion/Impl/AdminDaolmpl.php';
class AdminController
{
    public function index()
    {
        if (isset($_SESSION['nivelUsuario']) && $_SESSION['nivelUsuario'] == 1) {

            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'admin/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        } else {
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'error/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        }
    }

    public function getProcedencias()
    {
        $admin = new AdminDaoImpl();

        $data = $admin->getProcedencias();

        if ($data instanceof mysqli_result) {
            $result = array();

            while ($row = $data->fetch_assoc()) {
                $result[] = $row;
            }

            echo json_encode($result);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
        }
    }

    public function getData()
    {
        $admin = new AdminDaoImpl();

        $data = $admin->getPerfiles();

        if ($data instanceof mysqli_result) {
            $result = array();

            while ($row = $data->fetch_assoc()) {
                $result[] = $row;
            }

            echo json_encode($result);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
        }
    }

    public function buscarPerfil()
    {
        $json = file_get_contents('php://input');

        $dataJson = json_decode($json, true);

        if ($dataJson === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }
        $id = $dataJson['id'];

        $admin = new AdminDaoImpl();

        $result = $admin->getPerfil($id);

        if ($result instanceof mysqli_result) {
            $data = array();

            while ($row = $result->fetch_assoc()) {

                $data[] = $row;
            }

            echo json_encode($data);
        } else {

            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
        }
    }

    public function registroAdmin()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }

        $rut = $data['rut'];
        $nombre = $data['nombre'];
        $apPat = $data['apPat'];
        $apMat = $data['apMat'];
        $procedencia = $data['procedencia'];
        $mail = $data['mail'];
        $nivel = $data['nivel'];

        $admin = new AdminDaoImpl();

        $adminModel = new AdminModel();
        $adminModel->setRut($rut);
        $adminModel->setNombre($nombre);
        $adminModel->setapPat($apPat);
        $adminModel->setapMat($apMat);
        $adminModel->setProcedencia($procedencia);
        $adminModel->setMail($mail);
        $adminModel->setNivel($nivel);

        $result = $admin->registroAdmin($adminModel);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Actualización exitosa']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
        }
    }

    public function actualizarAdmin()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }

        $rut = $data['rut'];
        $nombre = $data['nombre'];
        $apPat = $data['apPat'];
        $apMat = $data['apMat'];
        $procedencia = $data['procedencia'];
        $mail = $data['mail'];
        $nivel = $data['nivel'];

        $admin = new AdminDaoImpl();

        $adminModel = new AdminModel();
        $adminModel->setRut($rut);
        $adminModel->setNombre($nombre);
        $adminModel->setapPat($apPat);
        $adminModel->setapMat($apMat);
        $adminModel->setProcedencia($procedencia);
        $adminModel->setMail($mail);
        $adminModel->setNivel($nivel);

        $result = $admin->actualizarAdmin($adminModel);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Actualización exitosa']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
        }
    }

    public function eliminarAdmin()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }

        $rut = $data['rut'];

        $admin = new AdminDaoImpl();

        $adminModel = new AdminModel();
        $adminModel->setRut($rut);
        $result = $admin->eliminarAdmin($adminModel);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Actualización exitosa']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
        }
    }

    public function registroCentro()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }

        $codigo = $data['codigo'];
        $nombre = $data['nombre'];

        $centro = new AdminDaoImpl();

        $centroModel = new centroModel();
        $centroModel->setCodigo($codigo);
        $centroModel->setNombre($nombre);

        $result = $centro->registroCentro($centroModel);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Actualización exitosa']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
        }
    }

    public function actualizarCentro()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }
        $nombre = $data['nombre'];
        $codigo = $data['codigo'];

        $centro = new AdminDaoImpl();

        $centroModel = new centroModel();
        $centroModel->setNombre($nombre);
        $centroModel->setCodigo($codigo);

        $result = $centro->actualizarCentro($centroModel);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Actualización exitosa']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
        }
    }

    public function eliminarCentro()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }

        $codigo = $data['codigo'];

        $centro = new AdminDaoImpl();

        $centroModel = new centroModel();
        $centroModel->setCodigo($codigo);
        $result = $centro->eliminarCentro($centroModel);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Actualización exitosa']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
        }
    }
    public function buscarCentros()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);

            if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
                echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
                return;
            }

            $fechaInicio = $data['fechaInicio'];
            $fechaFin = $data['fechaFin'];
            $centroDao = new AdminDaoImpl();
            $centroModel = new centroModel();
            $centroModel->setFechaInicial($fechaInicio);
            $centroModel->setFechaFinal($fechaFin);

            $resultados = $centroDao->buscarCentros($centroModel);

            if ($resultados) {
                echo json_encode(['success' => true, 'resultados' => $resultados]);
            } else {
                echo json_encode(['success' => false, 'message' => 'No se encontraron resultados']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: Solicitud incorrecta']);
        }
    }
    public function buscarFrecuenciaCentros()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);

            if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
                echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
                return;
            }

            $codigo = $data['codigo'];
            $centroDao = new AdminDaoImpl();
            $centroModel = new centroModel();
            $centroModel->setCodigo($codigo);
            $resultados = $centroDao->buscarFrecuenciaCentros($centroModel);

            if ($resultados) {
                echo json_encode(['success' => true, 'resultados' => $resultados]);
            } else {
                echo json_encode(['success' => false, 'message' => 'No se encontraron resultados']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: Solicitud incorrecta']);
        }
    }
}
