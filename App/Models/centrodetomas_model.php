<?php 
class centroModel{
    private $codigo;
    private $nombre;
    private $fechaInicial;
    private $fechaFin;

    public function getNombre() {
        return $this->nombre;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getfechaInicial() {
        return $this->fechaInicial;
    }

    public function getfechaFin() {
        return $this->fechaFin;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setFechaInicial($fechaInicial) {
        $this->fechaInicial= $fechaInicial;
    }

    public function setFechaFinal($fechaFin) {
        $this->fechaFin= $fechaFin;
    }
}


?>