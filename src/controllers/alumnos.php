<?php

// Iniciamos la session
session_start();

// Iniciamos el contador a 0
if (!isset($_SESSION['contador_alum'])) {
    $_SESSION['contador_alum'] = 0;
}

// Esta condición se ejecutará si le damos al botón de Siguiente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuevoDatosAlum = [];

    foreach ($_POST['nombre_alumno'] as $key => $nombre) {
        $_SESSION['contador_alum']++;
        $_SESSION['alumno' . $_SESSION['contador_alum']] = [
                'nombre'   => $nombre,
                'apellido' => $_POST['apellido_alumno'][$key],
                'edad'     => $_POST['edad_alumno'][$key]
        ];
        $nuevoDatosAlum[] = $_SESSION['alumno' . $_SESSION['contador_alum']]; 
    }

    // Los datos del array se escribiran en un archivo si se han escrito menos de 20 alumnos
    if ($_SESSION['contador_alum'] <= 20) {
        $filePath = __DIR__ . '/../models/archivotop.txt';
        $file = fopen($filePath, 'a');

        foreach ($nuevoDatosAlum as $index => $alumno) {
            $linea = "Alumno " . ($_SESSION['contador_alum'] - count($nuevoDatosAlum) + $index + 1) . ": Nombre: " . $alumno['nombre'] . ", Apellido: " . $alumno['apellido'] . ", Edad: " . $alumno['edad'] . "\n";
            fwrite($file, $linea);
        }

        fclose($file);
        header('Location:materias'); 
        exit();
    } else {
        header('Location:profesores'); 
        exit(); 
    }
}

require VIEWS . '/form.alumnos.php';
