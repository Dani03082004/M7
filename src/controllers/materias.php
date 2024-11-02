<?php
session_start();

if (!isset($_SESSION['materia'])) {
    $_SESSION['materia'] = []; // Inicializa el array de materias si no existe
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST['nombre_materia'] as $key => $nombre) {
        $_SESSION['materia'][] = [
            'nombre'   => $nombre,
            'curso'    => $_POST['curso_materia'][$key],
            'duracion' => $_POST['duracion_materia'][$key]
        ];
    }

    // Guardar los datos en el archivo solo si se han ingresado menos de 20 materias
    if (count($_SESSION['materia']) <= 20) { 
        $filePath = __DIR__ . '/../models/archivotop.txt';
        $file = fopen($filePath, 'a');

        foreach ($_SESSION['materia'] as $index => $materia) {
            $linea = "Materia " . ($index + 1) . ": Nombre: " . $materia['nombre'] . ", Curso: " . $materia['curso'] . ", Duración: " . $materia['duracion'] . "\n";
            fwrite($file, $linea);
        }

        fclose($file);
        header('Location: final'); // Redirige al formulario final
        exit();
    } else {
        header('Location: alumnos'); // Si se excede el límite, redirige a alumnos
        exit(); 
    }
}

// Mostrar el formulario de materias
require VIEWS . '/form.materias.php';
