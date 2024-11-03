<?php

// Iniciamos la session
session_start();

// Iniciamos el contador a 0
if (!isset($_SESSION['contador_materia'])) {
    $_SESSION['contador_materia'] = 0;
}

// Esta condición se ejecutará si le damos al botón de Siguiente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuevosDatosMateria = [];
    foreach ($_POST['nombre_materia'] as $key => $nombre) {
        $_SESSION['contador_materia']++;
        $_SESSION['materia'. $_SESSION['contador_materia']] = [
            'nombre'   => $nombre,
            'curso'    => $_POST['curso_materia'][$key],
            'duracion' => $_POST['duracion_materia'][$key]
        ];
        $nuevosDatosMateria[] = $_SESSION['materia' . $_SESSION['contador_materia']]; 
    }

    // Donde se guardaran los datos en el archivo solo si se han puesto menos de 20 materias
    if ($_SESSION['contador_materia'] <= 20) { 
        $filePath = __DIR__ . '/../models/archivotop.txt';
        $file = fopen($filePath, 'a');

        foreach ($nuevosDatosMateria as $index => $materia) {
            $linea = "Materia " . ($_SESSION['contador_materia'] - count($nuevosDatosMateria) + $index + 1) . ": Nombre: " . $materia['nombre'] . ", Curso: " . $materia['curso'] . ", Duración: " . $materia['duracion'] . "\n";
            fwrite($file, $linea);
        }

        fclose($file);
        header('Location:final'); 
        exit();
    } else {
        header('Location:alumnos'); 
        exit(); 
    }
}

require VIEWS . '/form.materias.php';
