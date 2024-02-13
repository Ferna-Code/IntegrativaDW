<?php
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/error_model.php';

class InsertDataBase
{
    private $db;
    private $error;


    public function __construct()
    {
        $this->error = new Error_model();
        // Instancia de la clase Database
        $this->db = new Database();
    }


    public function createPerfiles()
    {
        $tableName = "Perfiles";

        $buildTable = "CREATE TABLE IF NOT EXISTS $tableName (
            id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            rut VARCHAR(12) UNIQUE NOT NULL,
            nombre VARCHAR(50) NOT NULL,
            apPat VARCHAR(50) NOT NULL,
            apMat VARCHAR(50) NOT NULL,
            clave VARCHAR(255) NOT NULL, 
            procedencia VARCHAR(20) NOT NULL,
            mail VARCHAR(50) NOT NULL,
            nivel INT(3) NOT NULL
        )";

        $Create = mysqli_query($this->db->getConnection(), $buildTable);

        $this->error->handlerErrorBBDD($Create, $tableName);

        $this->insertDefaultDataPerfiles($tableName);

        return true;
    }


    public function createTableCentroDeTomas()
    {
        $tableName = "CentroDeTomas";

        $buildTable = "CREATE TABLE IF NOT EXISTS $tableName (
            codigo varchar(10) PRIMARY KEY NOT NULL,
            nombre varchar(50) NOT NULL
        )";

        $Create = mysqli_query($this->db->getConnection(), $buildTable);

        $this->error->handlerErrorBBDD($Create, $tableName);

        $this->insertDataCentroDeTomas($tableName);

        return true;
    }

    public function createTableDiagnostico()
    {
        $tableName = "Diagnostico";

        $buildTable = "CREATE TABLE IF NOT EXISTS $tableName(
            codigo VARCHAR(20) PRIMARY KEY NOT NULL, 
            descripcion VARCHAR(255) NOT NULL,
            fecha DATE NOT NULL )";

        $Create = mysqli_query($this->db->getConnection(), $buildTable);

        $this->error->handlerErrorBBDD($Create, $tableName);

        $this->insertDataDiagnostico($tableName);

        return true;
    }

    public function createTablePacientes()
    {
        $tableName = "Pacientes";

        $buildTable = "CREATE TABLE IF NOT EXISTS $tableName(
            id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            rut VARCHAR(12) UNIQUE NOT NULL,
            nombre VARCHAR(50) NOT NULL,
            apPat VARCHAR(50) NOT NULL,
            apMat VARCHAR(50) NOT NULL,
            telefono VARCHAR(15) NOT NULL,
            direccion VARCHAR(255) NOT NULL,
            mail VARCHAR(50) NOT NULL,
            fechaNacimiento DATE NOT NULL,
            genero VARCHAR(10))";

        $Create = mysqli_query($this->db->getConnection(), $buildTable);

        $this->error->handlerErrorBBDD($Create, $tableName);

        $this->insertDataPaciente($tableName);

        return true;
    }

    public function createTableExamen()
    {
        $tableName = "Examenes";

        $buildTable = "CREATE TABLE IF NOT EXISTS $tableName (
            id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            paciente_id INT,
            diagnostico_codigo VARCHAR(20),
            fecha DATE NULL,
            centro_codigo VARCHAR(20),
            resultado VARCHAR(255),
            fecha_entrega DATE
        )";
        $Create = mysqli_query($this->db->getConnection(), $buildTable);

        $this->error->handlerErrorBBDD($Create, $tableName);

        $this->insertDataExamenes($tableName);

        return true;
    }

    public function createTableTincion()
    {
        $tableName = "Tincion";

        $buildTable = "CREATE TABLE IF NOT EXISTS $tableName (
           id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            examen_id INT,
            confirmacion BOOL NULL,
            observacion VARCHAR(255) NULL,
            fecha DATE NULL,
            hora VARCHAR(20) NULL
        )";
        $Create = mysqli_query($this->db->getConnection(), $buildTable);

        $this->error->handlerErrorBBDD($Create, $tableName);

        $this->insertDataTincion($tableName);

        return true;
    }

    private function insertDefaultDataPerfiles($tableName)
    {

        $defaultData = "INSERT INTO $tableName (rut, nombre, apPat, apMat, clave, procedencia, mail, nivel) VALUES
            ('11111111-1', 'Luis', 'Yanez', 'Carreño', 'LYC11111111-1', 'MM', 'lyanez@gmail.com', 1),
            ('22222222-2', 'Richard', 'Calderon', 'Soto',  'RCS22222222-2', 'MM', 'Richard@gmail.com', 2),
            ('33333333-3', 'Guillermo', 'Araujo', 'Blanco', 'GAB33333333-3', 'MM', 'Guillermo@gmail.com', 3),
            ('44444444-4', 'Andrea', 'Correa', 'Soto',  'ACS44444444-4', 'MM', 'Andrea@gmail.com', 4),
            ('55555555-5', 'Marcelo', 'Salas', 'Reyes','MSR55555555-5', 'MM', 'Marcelo@gmail.com', 5)";

        $InsertData = mysqli_query($this->db->getConnection(), $defaultData);

        $this->error->handlerErrorBBDD($InsertData, $tableName);
    }

    private function insertDataCentroDeTomas($tableName)
    {
        $defaultData = "INSERT INTO $tableName (codigo, nombre) VALUES    
        ('MM', 'MEGAMAN'),
        ('UM', 'ULTRAMAN'),
        ('US', 'ULTRASEVEN')";

        $InsertData = mysqli_query($this->db->getConnection(), $defaultData);

        $this->error->handlerErrorBBDD($InsertData, $tableName);
    }

    private function insertDataDiagnostico($tableName)
    {

        $defaultData = "INSERT INTO $tableName (codigo, descripcion, fecha) VALUES   
            ('A', 'NEGATIVO', '2024-01-25'),
            ('B', 'MUESTRA INADECUADA, VOLVER A TOMAR','2024-01-25' ),
            ('C', 'LA MUESTRA PRESENTA INFECCIÓN','2024-01-25' ),
            ('D', 'POSIBLE ADENOCARCINOMA', '2024-01-25'),
            ('E', 'CÁNCER EPIDERMOIDE', '2024-01-25'),
            ('F', 'MUESTRA ATROFICA','2024-01-25' )";

        $InsertData = mysqli_query($this->db->getConnection(), $defaultData);

        $this->error->handlerErrorBBDD($InsertData, $tableName);
    }

    private function insertDataPaciente($tableName)
    {

        $defaultData = "INSERT INTO $tableName (rut, nombre, apPat, apMat, telefono, direccion, mail, fechaNacimiento, genero) VALUES
            ('11111111-1', 'Juan', 'Perez', 'Gomez', '123456789', 'Calle A #123', 'juan@gmail.com', '1990-05-15', 'Masculino'),
            ('22222222-2', 'Maria', 'Lopez', 'Gutierrez', '987654321', 'Avenida B #456', 'maria@gmail.com', '1985-08-20', 'Femenino'),
            ('33333333-3', 'Pedro', 'Rodriguez', 'Fernandez', '555555555', 'Calle C #789', 'pedro@gmail.com', '2000-02-10', 'Masculino')";

        $InsertData = mysqli_query($this->db->getConnection(), $defaultData);

        $this->error->handlerErrorBBDD($InsertData, $tableName);
    }

    private function insertDataExamenes($tableName)
    {

        $defaultData = "INSERT INTO $tableName (paciente_id, diagnostico_codigo, fecha, centro_codigo, resultado) VALUES
            (1, 'A', '2024-01-20', 'MM', 'Resultado Examen A'),
            (2, 'B', '2024-01-21', 'UM', 'Resultado Examen B'),
            (3, 'C', '2024-01-22', 'US', 'Resultado Examen C')";

        $InsertData = mysqli_query($this->db->getConnection(), $defaultData);

        $this->error->handlerErrorBBDD($InsertData, $tableName);
    }

    private function insertDataTincion($tableName)
    {

        $defaultData = "INSERT INTO $tableName (examen_id, confirmacion, observacion, fecha, hora) VALUES   
            (1, TRUE, 'Observación A', '2024-01-25', '08:30 AM'),
            (2, FALSE, 'Observación B', '2024-01-26', '09:45 AM'),
            (3, TRUE, 'Observación C', '2024-01-27', '10:30 AM');";

        $InsertData = mysqli_query($this->db->getConnection(), $defaultData);

        $this->error->handlerErrorBBDD($InsertData, $tableName);
    }
}
