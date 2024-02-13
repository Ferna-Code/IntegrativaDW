<?php
require_once __DIR__ . '/Models/Insert_model.php';

class Database
{
    private $host;
    private $dbname;
    private $dbuser;
    private $dbpass;
    private $conn;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->dbname = DB_NAME;
        $this->dbuser = DB_USER;
        $this->dbpass = DB_PASS;
        $this->connect();
    }

    protected function connect()//generamos la coneccion a la base de datos
    {
        $this->conn = new mysqli($this->host, $this->dbuser, $this->dbpass);

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }

        // Verifica si $this->dbname tiene un valor antes de ejecutar la consulta
        if (!empty($this->dbname)) {
            $sql = 'CREATE DATABASE IF NOT EXISTS ' . $this->dbname;

            if (!$this->conn->query($sql)) {
                die("Error al crear la base de datos: " . $this->conn->error);
            }

            // Selecciona la base de datos después de haberla creado
            if (!$this->conn->select_db($this->dbname)) {
                die("Error al seleccionar la base de datos: " . $this->conn->error);
            }
        }
    }

    public function showTableData($connection, $tableName)
    {
        $result = $connection->query("SELECT * FROM $tableName");

        if ($result) {
            // Mostrar los datos de la tabla
            while ($row = $result->fetch_assoc()) {
                echo " - Nombre: " . $row['nombre'] . "<br>";
            }

            // Liberar el conjunto de resultados
            $result->free();
        } else {
            echo "Error al ejecutar la consulta: " . $this->conn->error;
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function close()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }


    //creaciones de tablas
    public function createAndInsertData()//obtenemos las funciones desde insert_model
    {
        $insertDataBase = new InsertDataBase();

        $insertDataBase->createPerfiles();
        $insertDataBase->createTableCentroDeTomas();
        $insertDataBase->createTableDiagnostico();
        $insertDataBase->createTablePacientes();
        $insertDataBase->createTableExamen();
        $insertDataBase->createTableTincion();
    }
}
