<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validar el correo electrónico
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Llamar a la función sendMail
        $fileAttachment = __DIR__ . '/../models/archivotop.txt'; // Cambia la ruta según tu estructura
        if (sendMail($fileAttachment, "Aquí están los datos de los alumnos.", "Datos de Alumnos", $email)) {
            var_dump("Se ha enviado correctamente el correo.");
        } else {
            var_dump("No se pudo enviar el correo. Inténtalo de nuevo más tarde.");
        }
    } else {
        var_dump("Correo electrónico no válido.");
    }
}

// Mostrar el formulario aunque se haya enviado el correo
require VIEWS . '/form.final.php';
