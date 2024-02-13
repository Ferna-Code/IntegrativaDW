<?php

class AdminModel
{    
    private $nombre;
    private $usuario;
    private $clave;
    private $procedencia;
    private $nivel;
    private $rut;
    private $apPat;
    private $apMat;
    private $mail;


    public function getNombre() {
        return $this->nombre;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getClave() {
        return $this->clave;
    }

    public function getProcedencia() {
        return $this->procedencia;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function getRut() {
        return $this->rut;
    }
    public function getapPat() {
        return $this->apPat;
    }
    public function getapMat() {
        return $this->apMat;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getClaveAutomatica() {
        return $this->clave;
    }

    // Setters

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function setProcedencia($procedencia) {
        $this->procedencia = $procedencia;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function setRut($rut) {
        $this->rut = $rut;
    }
    public function setapPat($apPat) {
        $this->apPat = $apPat;
    }
    public function setapMat($apMat) {
        $this->apMat = $apMat;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }
    public function setClaveAutomatica($clave) {
        $this->clave = $clave;
    }
}

