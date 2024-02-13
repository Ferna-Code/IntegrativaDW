<?php
class PacienteModel
{
    private $id;
    private $rut;
    private $nombre;
    private $apPat;
    private $apMat;
    private $telefono;
    private $direccion;
    private $mail;
    private $fechaNacimiento;
    private $genero;
    private $centro_codigo;
    private $fechaExamen;

    // Getters

    public function getId()
    {
        return $this->id;
    }

    public function getRut()
    {
        return $this->rut;
    }

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
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function getCentro_Codigo()
    {
        return $this->centro_codigo;
    }
    public function getFechaExamen()
    {
        return $this->fechaExamen;
    }

    //setters 

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
    public function SetFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }
    public function SetGenero($genero)
    {
        $this->genero = $genero;
    }
}
