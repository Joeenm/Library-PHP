<?php
class Prestamo {
    private $estudiante;
    private $libro;

    public function __construct($estudiante, $libro) {
        $this->estudiante = $estudiante;
        $this->libro = $libro;
    }

    public function getEstudiante() {
        return $this->estudiante;
    }

    public function getLibro() {
        return $this->libro;
    }
}
?>