<?php
include_once 'clases/libro.php';
include_once 'clases/prestamo.php';

$libros = [
    new Libro(1, 'Crónicas de Narnia', 'C.S. Lewis', 'Editorial Fantasía', '1ra', 3),
    new Libro(2, 'La Sombra del Viento', 'Carlos Ruiz Zafón', 'Editorial Misterio', '2da', 5),
    new Libro(3, 'Los Juegos del Hambre', 'Suzanne Collins', 'Editorial Ficción', '1ra', 0),
    new Libro(4, 'El Hobbit', 'J.R.R. Tolkien', 'Editorial JRR', '3ra', 2),
    new Libro(5, 'La Torre Oscura', 'Stephen King', 'Editorial Terror', '1ra', 1)
];

$prestamos = [];
?>
