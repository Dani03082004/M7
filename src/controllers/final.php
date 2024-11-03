<?php

// Iniciamos la session
session_start();

// Esta condición se ejecutará si le damos al botón de Siguiente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    
    // Se cumplirá esta condición si llama correctamente a la función sendMail
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $fileAttachment = __DIR__ . '/../models/archivotop.txt'; 
        if (sendMail($fileAttachment, "Datos", "Datos", $email)) {
            var_dump("El supuesto correo se ha enviado correctamente a su destinatario.");
        } else {
            var_dump("El correo no se ha enviado");
        }
    } else {
        var_dump("Correo electrónico inválido.");
    }
}

// Llamamos a la vista del formulario final
require VIEWS . '/form.final.php';
