<?php
require_once __DIR__ . '/../../../Models/Tincion_model.php';
require_once __DIR__ . '/../../../Models/error_model.php';
require_once __DIR__ . '/../../../Database.php';
require_once __DIR__ . '/../TincioDao.php';

class TincionDaoImpl implements TincionDAO
{

    private $db;
    private $error;
    private $tableName = "Tincion";

    public function __construct()
    {
        $this->error = new Error_model();
        // Instancia de la clase Database
        $this->db = new Database();
    }

    public function getDataTincion()
    {
        $query = "SELECT 
                    id, 
                    examen_id, 
                    confirmacion, 
                    observacion, 
                    fecha, 
                    hora 
                  FROM $this->tableName WHERE confirmacion = 'FALSE'";
    
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
    
    

    public function updateTincion(TincionModel $tincion)
    {
        $query_update = "UPDATE $this->tableName SET confirmacion = ?, observacion = ?, fecha = ?, hora = ? WHERE id = ?";

        $stmt = mysqli_prepare($this->db->getConnection(), $query_update);
        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "Error al preparar la declaración");
            return false;
        }

        $id = $tincion->getId();
        $confirmacion = $tincion->getConfirmacion();
        $observacion = $tincion->getObservacion();
        $fecha = $tincion->getFecha();
        $hora = $tincion->getHora();

        // Asociar parámetros a la consulta preparada
        mysqli_stmt_bind_param($stmt, "ssssi", $confirmacion, $observacion, $fecha, $hora, $id);

        // Ejecutar la consulta
        $result = mysqli_stmt_execute($stmt);

        // Verificar si la actualización fue exitosa
        if (!$result) {
            // Error en la actualización, mostrar un mensaje de error
            $this->error->handlerErrorBBDD($result, "Error al ejecutar la actualización");

            return false;
        }
        return true;
    }


    public function buscarId(TincionModel $tincion)
    {
        $id=$tincion->getId();
      

        $query = "SELECT * FROM tincion WHERE id = ?";
    
        $conn = $this->db->getConnection();
        $stmt = mysqli_prepare($conn, $query);
    
        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "error en la busqueda");
            return false;
        }
    
        mysqli_stmt_bind_param($stmt, "s", $id);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) === 0) {
            return false; 
        }
    
        mysqli_stmt_close($stmt);
    
        return $result;
    }
    

}
