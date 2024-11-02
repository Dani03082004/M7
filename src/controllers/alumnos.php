<?php
session_start();

if (!isset($_SESSION['alumno'])) {
    $_SESSION['alumno'] = []; // Inicializa el array de alumnos si no existe
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST['nombre_alumno'] as $key => $nombre) {
        $_SESSION['alumno'][] = [
            'nombre'   => $nombre,
            'apellido' => $_POST['apellido_alumno'][$key],
            'edad'     => $_POST['edad_alumno'][$key]
        ];
    }

    // Guardar los datos en el archivo solo si se han ingresado menos de 20 alumnos
    if (count($_SESSION['alumno']) <= 20) {
        $filePath = __DIR__ . '/../models/archivotop.txt';
        $file = fopen($filePath, 'a');

        foreach ($_SESSION['alumno'] as $index => $alumno) {
            $linea = "Alumno " . ($index + 1) . ": Nombre: " . $alumno['nombre'] . ", Apellido: " . $alumno['apellido'] . ", Edad: " . $alumno['edad'] . "\n";
            fwrite($file, $linea);
        }

        fclose($file);
        header('Location: materias'); 
        exit();
    } else {
        header('Location: profesores');
        exit(); 
    }
}

// Mostrar el formulario de alumnos
require VIEWS . '/form.alumnos.php';
