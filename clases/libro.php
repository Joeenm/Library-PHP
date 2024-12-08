<?php
class Libro {
    private $codigo;
    private $titulo;
    private $autor;
    private $editorial;
    private $version;
    private $cantidadDisponible;

    public function __construct($codigo, $titulo, $autor, $editorial, $version, $cantidadDisponible) {
        $this->codigo = $codigo;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->version = $version;
        $this->cantidadDisponible = $cantidadDisponible;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getEditorial() {
        return $this->editorial;
    }

    public function getVersion() {
        return $this->version;
    }

    public function getCantidadDisponible() {
        return $this->cantidadDisponible;
    }

    public function prestar() {
        if ($this->cantidadDisponible > 0) {
            $this->cantidadDisponible--;
            return true;
        } else {
            return false;
        }
    }

    public function devolver() {
        $this->cantidadDisponible++;
    }
}
?>