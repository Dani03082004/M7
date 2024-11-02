<?php

session_start();

if (!isset($_SESSION['contador_alum'])) {
    $_SESSION['contador_alum'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuevosAlumnos = [];

    foreach ($_POST['nombre_alumno'] as $key => $nombre) {
        $_SESSION['contador_alum']++;
        $_SESSION['alumno' . $_SESSION['contador_alum']] = [
            'nombre'   => $nombre,
            'apellido' => $_POST['apellido_alumno'][$key],
            'edad'     => $_POST['edad_alumno'][$key]
        ];
        $nuevosAlumnos[] = $_SESSION['alumno' . $_SESSION['contador_alum']];
    }

    // Guardar los datos en el archivo solo si se han ingresado menos de 5 alumnos
    if ($_SESSION['contador_alum'] <= 20) {
        $filePath = __DIR__ . '/../models/archivotop.txt';
        $file = fopen($filePath, 'a');

        foreach ($nuevosAlumnos as $index => $alumno) {
            $linea = "Alumno " . ($_SESSION['contador_alum'] - count($nuevosAlumnos) + $index + 1) . ": Nombre: " . $alumno['nombre'] . ", Apellido: " . $alumno['apellido'] . ", Edad: " . $alumno['edad'] . "\n";
            fwrite($file, $linea);
        }

        fclose($file);
        header('Location:materias'); 
        exit();
    }else{
        header('Location:profesores');
        exit(); 
    }
}

require VIEWS.'/form.alumnos.php';
