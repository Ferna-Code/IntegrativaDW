<?php
require_once __DIR__ . '/../Database.php';
class UsuarioModel
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
    private $nivel;
    private $procedencia;
    

    public function getId() {
        return $this->id;
    }

    public function getrut() {
        return $this->rut;
    }

    public function getnombre() {
        return $this->nombre;
    }

    public function getappat() {
        return $this->apPat;
    }

    public function getapmat() {
        return $this->apMat;
    }

    public function getTelefono() {
        return $this->telefono;
    }  
    public function getNivel() {
            return $this->nivel;
    }

    public function getfechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getGenero() {
        return $this->genero;
    } public function getprocedencia() {
        return $this->procedencia;
    }


    // Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setrut($rut) {
        $this->pasrut = $rut;
    }

    public function setnombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setapPat($apPat) {
        $this->apPat = $apPat;
    }

    public function setapMat($apMat) {
        $this->apMat = $apMat;
    }
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    
    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function setfechaNacimiento($fechaNacimiento) {
    return $this->fechaNacimiento=$fechaNacimiento;
    }

    public function setGenero($genero) {
    return $this->genero=$genero;
    }
    public function setprocedencia($procedencia) {
        return $this->procedencia=$procedencia;
        }
        
   
}
