<?php

require_once __DIR__ . '/../../../Database.php';
require_once __DIR__ . '/../DiagnosticoDao.php';

class DiagnosticoDaoImpl implements DiagnosticoDao
{
    private $db;
    private $error;
    private $tableName = "Examenes";

    public function __construct()
    {
        $this->error = new Error_model();
        // Instancia de la clase Database
        $this->db = new Database();
    }

    public function getDataDiagnostico()
    {

        $query = "SELECT * FROM $this->tableName 
        INNER JOIN Pacientes ON Examenes.paciente_id= Pacientes.id
        INNER JOIN Tincion ON Tincion.examen_id= Examenes.id
        WHERE Tincion.confirmacion = 1";
        $stmt = mysqli_prepare($this->db->getConnection(), $query);
        $conn = $this->db->getConnection();


        $stmt = mysqli_prepare($conn, $query);
        
        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "Error al preparar la declaración");

            return false;
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }
    public function getEstadosDiagnostico()
    {

        $query = "SELECT codigo, descripcion FROM Diagnostico";

        $stmt = mysqli_prepare($this->db->getConnection(), $query);
        $conn = $this->db->getConnection();


        $stmt = mysqli_prepare($conn, $query);
        
        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "Error al preparar la declaración");

            return false;
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }
    public function getAllExamenesFilter($idExamen, $nombre, $fechaCreacion){
        $sql = "SELECT e.*, p.*, Tincion.* FROM Examenes AS e 
        INNER JOIN Pacientes AS p ON e.paciente_id= p.id 
        INNER JOIN Tincion ON Tincion.examen_id = e.id
        WHERE 1 = 1 AND Tincion.confirmacion = 1";
        if(isset($idExamen)&& $idExamen != ''){
            $sql = $sql." "."AND e.id =".$idExamen;
        }
        if(isset($nombre)&& $nombre != ''){
            $sql = $sql." "."AND CONCAT(p.nombre, ' ', p.apPat, ' ', p.apMat ) LIKE '%$nombre%'";
        }
        if(isset($fechaCreacion)&& $fechaCreacion != ''){
            $sql = $sql." "."AND e.fecha = '$fechaCreacion'";
        }
        $result = mysqli_query($this->db->getConnection(), $sql);
        $examenes = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $examenes;
    }

    public function updateDiagnosticoExamen($codigoDiagnostico, $idExamen) {
        // Corregir la consulta SQL y el nombre de la variable $idExamen
        $sql = "UPDATE Examenes
                SET diagnostico_codigo = '$codigoDiagnostico'
                WHERE Examenes.id = $idExamen";
    
        $stmt = mysqli_prepare($this->db->getConnection(), $sql); // Corregir $query_update a $sql
        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "Error al preparar la declaración");
            return false;
        }
    
        $result = mysqli_stmt_execute($stmt);
    
        // Verificar si la actualización fue exitosa
        if (!$result) {
            // Error en la actualización, mostrar un mensaje de error
            $this->error->handlerErrorBBDD($stmt, "Error al ejecutar la actualización"); // Corregir $result a $stmt
    
            return false;
        }
    
        return true;
    }

}    
