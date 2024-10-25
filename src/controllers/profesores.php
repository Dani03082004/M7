<?php

session_start();

$_SESSION['contador_profe'] = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    if ($_SESSION['contador_profe'] <= 5) {
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

