<?php
include_once 'data.php';
include_once 'clases/estudiante.php';
include_once 'formulario.php';

$prestamos = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre_estudiante'];
    $apellido = $_POST['apellido_estudiante'];
    $cedula = $_POST['cedula_estudiante'];
    $correo = $_POST['correo_estudiante'];
    $codigoLibro = $_POST['codigo_libro'];

    foreach ($libros as $libro) {
        if ($libro->getCodigo() == $codigoLibro && $libro->prestar()) {
            $estudiante = new Estudiante($nombre, $apellido, $cedula, $correo);
            $prestamo = new Prestamo($estudiante, $libro);
            $prestamos[] = $prestamo;
            $mensaje = "Préstamo exitoso";
            break;
        } else {
            $mensaje = "No hay disponibilidad del libro.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Biblioteca de Azuero</title>
</head>
<body>
    <h1>Biblioteca del Centro Regional de Azuero</h1>

    <?php if (isset($_GET['mensaje'])): ?>
        <p class="mensaje-exito"><?php echo htmlspecialchars($_GET['mensaje']); ?></p>
    <?php endif; ?>

    <h2>Listado de libros disponibles</h2>
    <table>
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Versión</th>
            <th>Cantidad Disponible</th>
        </tr>
        <?php foreach ($libros as $libro): ?>
            <tr>
                <td><?php echo $libro->getCodigo(); ?></td>
                <td><?php echo $libro->getTitulo(); ?></td>
                <td><?php echo $libro->getAutor(); ?></td>
                <td><?php echo $libro->getEditorial(); ?></td>
                <td><?php echo $libro->getVersion(); ?></td>
                <td><?php echo $libro->getCantidadDisponible(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php if (isset($mensaje)): ?>
        <p class="<?php echo ($mensaje == "Préstamo exitoso") ? 'mensaje-exito' : 'mensaje-error'; ?>">
            <?php echo $mensaje; ?>
        </p>
    <?php endif; ?>

    <h2>Préstamo Realizado</h2>
    <?php if (count($prestamos) > 0): ?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cédula</th>
                <th>Correo</th>
                <th>Libro Prestado</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($prestamos as $prestamo): ?>
                <tr>
                    <td><?php echo $prestamo->getEstudiante()->getNombre(); ?></td>
                    <td><?php echo $prestamo->getEstudiante()->getApellido(); ?></td>
                    <td><?php echo $prestamo->getEstudiante()->getCedula(); ?></td>
                    <td><?php echo $prestamo->getEstudiante()->getCorreo(); ?></td>
                    <td><?php echo $prestamo->getLibro()->getTitulo(); ?></td>
                    <td>
                    <form method="POST" action="devolver.php" class="form-devolver">
                        <input type="hidden" name="codigo_libro" value="<?php echo $prestamo->getLibro()->getCodigo(); ?>">
                        <input type="hidden" name="cedula_estudiante" value="<?php echo $prestamo->getEstudiante()->getCedula(); ?>">
                        <button type="submit" class="boton-devolver">Devolver</button>
                    </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p class="mensaje-info">No se ha realizado ningún préstamo.</p>
    <?php endif; ?>
</body>
</html>