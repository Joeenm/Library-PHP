<?php
class Estudiante {
    private $nombre;
    private $apellido;
    private $cedula;
    private $correo;

    public function __construct($nombre, $apellido, $cedula, $correo) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->correo = $correo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getCorreo() {
        return $this->correo;
    }
}
?>