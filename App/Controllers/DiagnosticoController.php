<?php
session_start();
require_once __DIR__ . '/../DAO/Diagnostico/Impl/DiagnosticoDaoImpl.php';



class DiagnosticoController
{
    //se declara una variable global para poder ocuparla en todos los metodos.
  
    private $diagnosticoService;
    public function __construct(){
        $this->diagnosticoService = new DiagnosticoDaoImpl();

    }
    public function index()
    {
        $codigosDiagnostico = $this->diagnosticoService->getEstadosDiagnostico();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST['idExamen'];
            $nombre = $_POST['nombrePaciente'];
            $fechaCreacion = $_REQUEST['fechaCreacion'];
            $examenes = $this->diagnosticoService->getAllExamenesFilter($id, $nombre, $fechaCreacion);
        }else{
            $examenes = $this->diagnosticoService->getDataDiagnostico();
        }
        if (isset($_SESSION['nivelUsuario']) && $_SESSION['nivelUsuario'] == 4) {
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'diagnostico/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        } else {
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'error/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        }
    }

    public function actualizarEstadoDiagnostico() {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
    

        $id = $data['id'];
        $codigoDiagnostico = $data['codigoDiagnostico'];
        
        $result = $this->diagnosticoService->updateDiagnosticoExamen($codigoDiagnostico, $id);
        // Simulamos una actualización exitosa
        if($result){
            echo json_encode(['success' => true, 'message' => 'Actualización exitosa']);            
        }else{
            echo json_encode(['success' => false, 'message' => 'Error al Actualizar']);
        }

    }
}
