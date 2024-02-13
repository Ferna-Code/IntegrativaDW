<?php
require_once __DIR__ . '/../../../Models/Admin_model.php';
require_once __DIR__ . '/../../../Models/error_model.php';
require_once __DIR__ . '/../../../Database.php';
require_once __DIR__ . '/../AdminDao.php';

class AdminDaoImpl implements AdminDao
{

    private $db;
    private $error;

    public function __construct()
    {
        $this->error = new Error_model();
        // Instancia de la clase Database
        $this->db = new Database();
    }

    public function getProcedencias()
    {
        $query = "SELECT * FROM CentroDeTomas";

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

    public function getPerfiles()
    {
        $query = "SELECT id, rut FROM Perfiles";

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

    public function getPerfil($id)
    {
        $query = "SELECT * FROM Perfiles WHERE id = $id";
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

    public function getDataAdmin()
    {
        $tableName = "perfiles";

        $query = "SELECT 
                    id, 
                    rut, 
                    nombre, 
                    apPat, 
                    apMat, 
                    clave,
                    procedencia,
                    mail,
                    nivel 
                  FROM $tableName WHERE confirmacion = 'FALSE'";

        $stmt = mysqli_prepare($this->db->getConnection(), $query);
        $conn = $this->db->getConnection();

        $stmt = mysqli_prepare($conn, $query);
        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "error en la busqueda");
            return false;
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }
    public function getDataCentros()
    {
        $tableName = "centrodetomas";

        $query = "SELECT 
                    codigo, 
                    nombre
                  FROM $tableName WHERE";

        $stmt = mysqli_prepare($this->db->getConnection(), $query);
        $conn = $this->db->getConnection();

        $stmt = mysqli_prepare($conn, $query);
        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "error en la busqueda");
            return false;
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }

    public function buscarId(centroModel $centro)
    {
        $id = $centro->getCodigo();
        $query = "SELECT * FROM centrodetomas WHERE id = ?";

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
        } else {
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    public function registroAdmin(AdminModel $admin)
    {
        $tableName = "perfiles";
        $rut = $admin->getRut();
        if ($this->verificarRut($rut)) {
            echo json_encode(['success' => false, 'message' => 'El código ya existe en la tabla.']);
            return false;
        }

        $query_insert = "INSERT INTO $tableName (rut,nombre, apPat, apMat, clave, procedencia, mail, nivel) VALUES (?, ?, ?, ?,?,?,?,?)";

        $stmt = mysqli_prepare($this->db->getConnection(), $query_insert);
        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "Error al preparar la declaración");
            return false;
        }
        $inicialNombre = substr($admin->getNombre(), 0, 1);
        $inicialApPat = substr($admin->getapPat(), 0, 1);
        $inicialApMat = substr($admin->getapMat(), 0, 1);
        $inicialRut = $admin->getRut();

        //creacion de la clave de usuario
        $nombre = $admin->getNombre();
        $apPat = $admin->getapPat();
        $apMat = $admin->getapMat();
        $claveAutomatica = $inicialNombre . $inicialApPat . $inicialApMat . $inicialRut;
        $procedencia = $admin->getProcedencia();
        $mail = $admin->getMail();
        $nivel = $admin->getNivel();

        // Asociar parámetros a la consulta preparada
        mysqli_stmt_bind_param($stmt, "sssssssi", $rut, $nombre, $apPat, $apMat, $claveAutomatica, $procedencia, $mail, $nivel);

        // Ejecutar la consulta
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            // Error en la actualización, mostrar un mensaje de error
            $this->error->handlerErrorBBDD($result, "Error al ejecutar la actualización");
            return false;
        }
        return true;
    }
    private function verificarRut($rut)
    {
        $tableName = "perfiles";
        $query = "SELECT COUNT(*) as cuenta FROM $tableName WHERE rut = ?";

        $stmt = mysqli_prepare($this->db->getConnection(), $query);
        mysqli_stmt_bind_param($stmt, "s", $rut);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        return $row['cuenta'] > 0;
    }
    public function actualizarAdmin(AdminModel $admin)
    {
        $tableName = "perfiles";
        // Query de actualización
        $query_actualizacion = "UPDATE $tableName SET nombre = ?, apPat = ?, apMat = ?, clave = ?, procedencia = ?, mail = ?, nivel = ? WHERE rut = ?";

        // Preparar la declaración
        $stmt = mysqli_prepare($this->db->getConnection(), $query_actualizacion);

        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "Error al preparar la declaración");
            return false;
        }

        // Obtener datos del objeto $admin
        $rut = $admin->getRut();
        $nombre = $admin->getNombre();
        $apPat = $admin->getapPat();
        $apMat = $admin->getapMat();
        $procedencia = $admin->getProcedencia();
        $mail = $admin->getMail();
        $nivel = $admin->getNivel();

        //Aca estoy creando la clave del usuario apartir de los campos del formulario
        $inicialNombre = substr($nombre, 0, 1);
        $inicialApPat = substr($apPat, 0, 1);
        $inicialApMat = substr($apMat, 0, 1);
        $claveAutomatica = $inicialNombre . $inicialApPat . $inicialApMat . $rut;

        mysqli_stmt_bind_param($stmt, "ssssssis", $nombre, $apPat, $apMat, $claveAutomatica, $procedencia, $mail, $nivel, $rut);

        $result = mysqli_stmt_execute($stmt);

        if (!$result) {

            $this->error->handlerErrorBBDD($result, "Error al ejecutar la actualización: " . mysqli_error($this->db->getConnection()));
            return false;
        }
        return true;
    }

    public function eliminarAdmin(AdminModel $admin)
    {
        $tableName = "perfiles";

        $query_eliminar = "DELETE FROM $tableName WHERE rut = ?";

        $stmt = mysqli_prepare($this->db->getConnection(), $query_eliminar);

        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "Error al preparar la declaración");
            return false;
        }
        $rut = $admin->getRut();
        mysqli_stmt_bind_param($stmt, "s", $rut);

        $result = mysqli_stmt_execute($stmt);

        if (!$result) {

            $this->error->handlerErrorBBDD($result, "Error al ejecutar la actualización: " . mysqli_error($this->db->getConnection()));
            return false;
        }
        return true;
    }

    public function registroCentro(centroModel $centro)
    {
        $tableName = "centrodetomas";
        $codigo = $centro->getCodigo();
        $nombre = $centro->getNombre();

        if ($this->verificarCodigo($codigo)) {
            echo json_encode(['success' => false, 'message' => 'El código ya existe en la tabla.']);
            return false;
        }

        $query_insert = "INSERT INTO $tableName (codigo, nombre) VALUES (?, ?)";

        $stmt = mysqli_prepare($this->db->getConnection(), $query_insert);
        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "Error al preparar la declaración");
            return false;
        }

        mysqli_stmt_bind_param($stmt, "ss", $codigo, $nombre);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            $this->error->handlerErrorBBDD($result, "Error al ejecutar la actualización");
            return false;
        }
        return true;
    }

    private function verificarCodigo($codigo)
    {
        $tableName = "centrodetomas";
        $query = "SELECT COUNT(*) as cuenta FROM $tableName WHERE codigo = ?";

        $stmt = mysqli_prepare($this->db->getConnection(), $query);
        mysqli_stmt_bind_param($stmt, "s", $codigo);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        return $row['cuenta'] > 0;
    }
    public function actualizarCentro(centroModel $centro)
    {
        $tableName = "centrodetomas";

        $query_actualizacion = "UPDATE $tableName SET  nombre = ? WHERE codigo = ?";


        $stmt = mysqli_prepare($this->db->getConnection(), $query_actualizacion);

        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "Error al preparar la declaración");
            return false;
        }


        $codigo = $centro->getCodigo();
        $nombre = $centro->getNombre();

        mysqli_stmt_bind_param($stmt, "ss", $nombre, $codigo);

        $result = mysqli_stmt_execute($stmt);

        if (!$result) {

            $this->error->handlerErrorBBDD($result, "Error al ejecutar la actualización: " . mysqli_error($this->db->getConnection()));
            return false;
        }
        return true;
    }
    public function eliminarCentro(centroModel $centro)
    {
        $tableName = "centrodetomas";
        $query_eliminar = "DELETE FROM $tableName WHERE codigo = ?";

        $stmt = mysqli_prepare($this->db->getConnection(), $query_eliminar);

        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "Error al preparar la declaración");
            return false;
        }

        $codigo = $centro->getCodigo();
        mysqli_stmt_bind_param($stmt, "s", $codigo);

        $result = mysqli_stmt_execute($stmt);

        if (!$result) {

            $this->error->handlerErrorBBDD($result, "Error al ejecutar la actualización: " . mysqli_error($this->db->getConnection()));
            return false;
        }
        return true;
    }
    public function buscarCentros(centroModel $centro)
    {
        $tableName = "examenes";
        $query_seleccionar = "SELECT * FROM $tableName WHERE fecha BETWEEN ? AND ?";

        $stmt = mysqli_prepare($this->db->getConnection(), $query_seleccionar);

        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "Error al preparar la declaración");
            return false;
        }

        // Obtener fechas desde el modelo
        $fechaInicio = $centro->getFechaInicial();
        $fechaFin = $centro->getFechaFin();

        mysqli_stmt_bind_param($stmt, "ss", $fechaInicio, $fechaFin);


        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            $this->error->handlerErrorBBDD($result, "Error al ejecutar la consulta: " . mysqli_error($this->db->getConnection()));
            return false;
        }


        $result_set = mysqli_stmt_get_result($stmt);


        $resultados = [];

        while ($row = mysqli_fetch_assoc($result_set)) {
            $resultados[] = $row;
        }
        return $resultados;
    }

    public function buscarFrecuenciaCentros(centroModel $centro)
    {
        $tableName = "examenes";
        $query_seleccionar = "SELECT * FROM $tableName WHERE centro_codigo=?";

        $stmt = mysqli_prepare($this->db->getConnection(), $query_seleccionar);

        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "Error al preparar la declaración");
            return false;
        }
        $codigo = $centro->getCodigo();

        mysqli_stmt_bind_param($stmt, "s", $codigo);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            $this->error->handlerErrorBBDD($result, "Error al ejecutar la consulta: " . mysqli_error($this->db->getConnection()));
            return false;
        }

        $result_set = mysqli_stmt_get_result($stmt);
        $resultados = [];
        while ($row = mysqli_fetch_assoc($result_set)) {
            $resultados[] = $row;
        }
        return $resultados;
    }
}
