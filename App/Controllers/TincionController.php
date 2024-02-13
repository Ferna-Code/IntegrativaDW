<?php
session_start();

require_once __DIR__ . '/../DAO/Tincion/Impl/TincionDaoImpl.php';
require_once __DIR__ . '/../Models/Tincion_model.php';

class TincionController
{
    public function index()
    {
        if (isset($_SESSION['nivelUsuario']) && $_SESSION['nivelUsuario'] == 3) {
            require_once VIEWS_PATH . 'layout/header.php';
            $tincion = new TincionDaoImpl();
            $data = $tincion->getDataTincion();

            include VIEWS_PATH . 'tincion/index.php';

            require_once VIEWS_PATH . 'layout/footer.php';
        } else {
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'error/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        }
    }

    public function getData()
    {
        $tincion = new TincionDaoImpl();
        $data = $tincion->getDataTincion();

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


    public function updateTincion()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }

        $id = $data['id'];
        $confirmacion = $data['confirmacion'];
        $observacion = $data['observacion'];
        $fecha = date("Y-m-d");
        $hora = date("h:i A");

        $tincion = new TincionDaoImpl();

        $tincionModel = new TincionModel();
        $tincionModel->setId($id);
        $tincionModel->setConfirmacion($confirmacion);
        $tincionModel->setObservacion($observacion);
        $tincionModel->setFecha($fecha);
        $tincionModel->setHora($hora);

        $result = $tincion->updateTincion($tincionModel);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Actualización exitosa']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
        }
    }
}
