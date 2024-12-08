<?php
include_once 'data.php';
include_once 'clases/estudiante.php';
include_once 'formulario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigoLibro = $_POST['codigo_libro'];
    $cedulaEstudiante = $_POST['cedula_estudiante'];

    foreach ($libros as $libro) {
        if ($libro->getCodigo() == $codigoLibro) {
            $libro->devolver();
            $mensaje = "El libro ha sido devuelto exitosamente.";
            break;
        }
    }
}

header("Location: index.php?mensaje=" . urlencode($mensaje));
exit();
?>