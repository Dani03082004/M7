<?php

// Iniciamos la session
session_start();

// Iniciamos el contador de profe a 0
if (!isset($_SESSION['contador_profe'])) {
    $_SESSION['contador_profe'] = 0;
}

// Esta condición se ejecutará si le damos al botón de Siguiente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Los datos que pongamos se guardarán en una array
    $nuevosDatos = [];
    
    foreach ($_POST['nombre'] as $key => $nombre) {
        $_SESSION['contador_profe']++;
        $_SESSION['profesor' . $_SESSION['contador_profe']] = [
            'nombre'   => $nombre,
            'apellido' => $_POST['apellido'][$key],
            'edad'     => $_POST['edad'][$key]
        ];
        $nuevosDatos[] = $_SESSION['profesor' . $_SESSION['contador_profe']]; 
    }

    // Que después esa array irá a un archivo
    // Donde posteriormente esos datos se escribirán en un archivo
    if ($_SESSION['contador_profe'] <= 20) {
        $filePath = __DIR__ . '/../models/archivotop.txt';
        $file = fopen($filePath, 'a');

        foreach ($nuevosDatos as $index => $profesor) {
            $linea = "Profesor " . ($_SESSION['contador_profe'] - count($nuevosDatos) + $index + 1) . ": Nombre: " . $profesor['nombre'] . ", Apellido: " . $profesor['apellido'] . ", Edad: " . $profesor['edad'] . "\n";
            fwrite($file, $linea);
        }

        fclose($file);
        header('Location:alumnos');
        exit();
    } 
}

require VIEWS.'/form.profesores.php';

