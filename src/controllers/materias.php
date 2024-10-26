<?php
session_start();

$_SESSION['contador_materia'] = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuevasMaterias = [];

    foreach ($_POST['nombre_materia'] as $key => $nombre) {
        $_SESSION['contador_materia']++;
        $_SESSION['materia' . $_SESSION['contador_materia']] = [
            'nombre'   => $nombre,
            'curso'    => $_POST['curso_materia'][$key],
            'duracion' => $_POST['duracion_materia'][$key]
        ];
        $nuevasMaterias[] = $_SESSION['materia' . $_SESSION['contador_materia']];
    }

    // Guardar los datos en el archivo solo si se han ingresado menos de 5 materias
    if ($_SESSION['contador_materia'] <= 5) {
        $filePath = __DIR__ . '/../models/archivotop.txt';
        $file = fopen($filePath, 'a');

        foreach ($nuevasMaterias as $index => $materia) {
            $linea = "Materia " . ($_SESSION['contador_materia'] - count($nuevasMaterias) + $index + 1) . ": Nombre: " . $materia['nombre'] . ", Curso: " . $materia['curso'] . ", Duración: " . $materia['duracion'] . "\n";
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
