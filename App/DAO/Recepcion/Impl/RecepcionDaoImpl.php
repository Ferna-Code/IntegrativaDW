<?php
require_once __DIR__ . '/../../../Models/Paciente_model.php';
require_once __DIR__ . '/../../../Database.php';
require_once __DIR__ . '/../RecepcionDao.php';

class RecepcionDaoImpl implements RecepcionDao // se implementa la interface de mi archivoRecepcionDao.php
{

    private $db;
    private $error;
    private $tableName = "pacientes";

    public function __construct()
    {
        $this->error = new Error_model();
        // Instancia de la clase Database
        $this->db = new Database();
    }

    public function getRegistroRecepcion()
    {

        $query = "SELECT rut, nombre, apPat, apMat,telefono,E.centro_codigo, E.fecha
        FROM Pacientes AS P
        INNER JOIN Examenes AS E ON P.id = E.paciente_id
        where E.diagnostico_codigo IS NOT NULL;";

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



    public function buscarRut(PacienteModel $paciente)
    {
        $rut = $paciente->getRut();
        $query = "SELECT * FROM pacientes WHERE rut LIKE '%$rut%'";
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
