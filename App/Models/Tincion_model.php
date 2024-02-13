<?php

class TincionModel
{    
    private $id;
    private $examenId;
    private $confirmacion;
    private $observacion;
    private $fecha;
    private $hora;

    public function getId() {
        return $this->id;
    }

    public function getExamenId() {
        return $this->examenId;
    }

    public function getConfirmacion() {
        return $this->confirmacion;
    }

    public function getObservacion() {
        return $this->observacion;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    // Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setExamenId($examenId) {
        $this->examenId = $examenId;
    }

    public function setConfirmacion($confirmacion) {
        $this->confirmacion = $confirmacion;
    }

    public function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

}

