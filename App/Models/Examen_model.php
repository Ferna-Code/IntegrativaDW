<?php
class ExamenModel
{
    //Diomar
    private $id;
    private $pacienteId;
    private $diagnosticoCodigo;
    private $fecha;
    private $centroCodigo;
    private $resultado;
    private $fechaEntrega;

    //Fernando
    private $nombre;
    private $apMat;
    private $mail;
    private $rut;
    private $apPat;
    private $telefono;
    private $centroToma;
    private $direccion;


    // Getters

    public function getId()
    {
        return $this->id;
    }

    public function getPacienteId()
    {
        return $this->pacienteId;
    }

    public function getDiagnosticoCodigo()
    {
        return $this->diagnosticoCodigo;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getCentroCodigo()
    {
        return $this->centroCodigo;
    }

    public function getResultado()
    {
        return $this->resultado;
    }

    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    // Setters


    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPacienteId($pacienteId)
    {
        $this->pacienteId = $pacienteId;
    }

    public function setDiagnosticoCodigo($diagnosticoCodigo)
    {
        $this->diagnosticoCodigo = $diagnosticoCodigo;
    }

    public function setCentroCodigo($centroCodigo)
    {
        $this->centroCodigo = $centroCodigo;
    }

    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;
    }

    //Fernando

    public function getNombre()
    {
        return $this->nombre;
    }


    public function getApPat()
    {
        return $this->apPat;
    }


    public function getApMat()
    {
        return $this->apMat;
    }


    public function getTelefono()
    {
        return $this->telefono;
    }


    public function getDireccion()
    {
        return $this->direccion;
    }


    public function getMail()
    {
        return $this->mail;
    }


    public function getRut()
    {
        return $this->rut;
    }


    public function getCentroToma()
    {
        return $this->centroToma;
    }


    public function SetRut($rut)
    {
        $this->rut = $rut;
    }
    public function SetNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function SetApPat($apPat)
    {
        $this->apPat = $apPat;
    }
    public function SetApMat($apMat)
    {
        $this->apMat = $apMat;
    }
    public function SetTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function SetDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function SetMail($mail)
    {
        $this->mail = $mail;
    }
    public function SetFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function SetCentroToma($centroToma)
    {
        $this->centroToma = $centroToma;
    }

}
