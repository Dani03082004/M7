<?php

require VIEWS.'/form.alumnos.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['contador_alumnos'])) {
        $_SESSION['contador_alumnos'] = 0;
    }

    foreach ($_POST['nombre'] as $key => $nombre) {
        $_SESSION['contador_alumnos']++;
        $_SESSION['alumnos_' . $_SESSION['contador_alumnos']] = [
            'nombre'   => $nombre,
            'apellido' => $_POST['apellido'][$key],
            'edad'     => $_POST['edad'][$key]
        ];
    }

    if ($_SESSION['contador_alumnos'] >= 5) {
        $filePath = __DIR__ . '/../models/archivotop.txt';
        $file = fopen($filePath, 'a');

        for ($i = 1; $i <= 5; $i++) {
            $alumnos = $_SESSION['alumnos_' . $i];
            $linea = "alumnos $i: Nombre: " . $alumnos['nombre'] . ", Apellido: " . $alumnos['apellido'] . ", Edad: " . $alumnos['edad'] . "\n";
            fwrite($file, $linea);
        }

        fclose($file);
        header('Location:alumnos');
        exit();
    } else {
        header('Location:profesores');
        exit();
    }
}
