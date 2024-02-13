<?php
require_once __DIR__ . '/../../../Models/usuario_model.php';
require_once __DIR__ . '/../../../Models/error_model.php';
require_once __DIR__ . '/../../../Database.php';
require_once __DIR__ . '/../UserDao.php';

class UserDaoImpl implements UserDao
{

    private $db;
    private $error;
    private $tablename = "pacientes";


    public function __construct()
    {
        $this->error = new Error_model();
        // Instancia de la clase Database
        $this->db = new Database();
    }

    public function getDataPaciente($buscador, $procedencia, $nivel)
    {

        $query = "SELECT e.* FROM pacientes P  
        INNER JOIN examenes e ON P.id = e.paciente_id  
        INNER JOIN perfiles AS p2 ON e.centro_codigo = p2.procedencia
        WHERE p2.procedencia = '$procedencia' AND p2.nivel = '$nivel' AND P.rut='$buscador' OR P.nombre LIKE '%$buscador%'";

        $conn = $this->db->getConnection();
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "error en la busqueda");
            return false;
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 0) {
            return false;
        }

        mysqli_stmt_close($stmt);

        return $result;
    }
}
