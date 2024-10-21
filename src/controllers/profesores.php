<?php

session_start();

$_SESSION['contador_profe'] = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    foreach ($_POST['nombre'] as $key => $nombre) {
        $_SESSION['contador_profe']++;
        $_SESSION['profesor' . $_SESSION['contador_profe']] = [
            'nombre'   => $nombre,
            'apellido' => $_POST['apellido'][$key],
            'edad'     => $_POST['edad'][$key]
        ];
        var_dump($_SESSION['contador_profe']);
    }

    if ($_SESSION['contador_profe'] <= 5) {
        $filePath = __DIR__ . '/../models/archivotop.txt';
        $file = fopen($filePath, 'a');

        for ($i = 1; $i <= 5; $i++) {
            $profesor = $_SESSION['profesor' . $i];
            $linea = "Profesor $i: Nombre: " . $profesor['nombre'] . ", Apellido: " . $profesor['apellido'] . ", Edad: " . $profesor['edad'] . "\n";
            fwrite($file, $linea);
        }

        fclose($file);
        //header('Location:alumnos');
    } else {
        //header('Location:profesores');
    }
}

require VIEWS.'/form.profesores.php';

