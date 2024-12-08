<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Solicitar Préstamo</title>
</head>
<body>
    <h2>Solicitar préstamo de libro</h2>
    <form method="POST" action="index.php" class="form-horizontal">
        <div class="form-group">
            <label for="nombre_estudiante">Nombre:</label>
            <input type="text" id="nombre_estudiante" name="nombre_estudiante" required>
        </div>

        <div class="form-group">
            <label for="apellido_estudiante">Apellido:</label>
            <input type="text" id="apellido_estudiante" name="apellido_estudiante" required>
        </div>

        <div class="form-group">
            <label for="cedula_estudiante">Cédula:</label>
            <input type="text" id="cedula_estudiante" name="cedula_estudiante" required>
        </div>

        <div class="form-group">
            <label for="correo_estudiante">Correo Electrónico:</label>
            <input type="email" id="correo_estudiante" name="correo_estudiante" required>
        </div>

        <div class="form-group">
            <label for="codigo_libro">Nombre del Libro:</label>
            <select id="codigo_libro" name="codigo_libro" required>
                <?php foreach ($libros as $libro): ?>
                    <option value="<?php echo $libro->getCodigo(); ?>"><?php echo $libro->getTitulo(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">Solicitar Préstamo</button>
    </form>
</body>
</html>