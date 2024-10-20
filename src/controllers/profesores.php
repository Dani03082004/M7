<?php

require VIEWS.'/../views/form.profesores.php';
session_start();

if (!isset($_SESSION['profesores'])) {
    $_SESSION['profesores'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombres = $_POST['nombre'] ?? [];
    $apellidos = $_POST['apellido'] ?? [];
    $edades = $_POST['edad'] ?? [];

    foreach ($nombres as $index => $nombre) {
        if (!empty($nombre) && !empty($apellidos[$index]) && !empty($edades[$index])) {
            $_SESSION['profesores'][] = [
                'nombre' => $nombre,
                'apellido' => $apellidos[$index],
                'edad' => $edades[$index]
            ];
        }
    }

    if (count($_SESSION['profesores']) >= 5) {
        header('Location: form.alumnos.php');
        exit;
    }
}

$i = count($_SESSION['profesores']);