<?php

// Función Router
    function router(array $routes):string {
        $url=parse_url($_SERVER['REQUEST_URI'])['path'];
        $path=explode('/',$url);
        $uri=array_filter($path,function($item){
            return $item!=='';
        });
    $uri=array_values($uri);
    if (empty($uri[0])){
        $uri[0]='home';
    }
    if (in_array($uri[0],$routes,true)){
        return $uri[0];
    }
    http_response_code(404);
}

// Función para añadir nuevos profesores
function addFieldProf($index, $profesor = null) {
    $nombre = isset($profesor['nombre']) ? htmlspecialchars($profesor['nombre']) : '';
    $apellido = isset($profesor['apellido']) ? htmlspecialchars($profesor['apellido']) : '';
    $edad = isset($profesor['edad']) ? htmlspecialchars($profesor['edad']) : '';

    return '
        <div class="field-group" id="field-group-' . $index . '">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre[' . $index . ']" placeholder="nombre" value="' . $nombre . '" required>

            <label for="apellido">Apellido</label>
            <input type="text" name="apellido[' . $index . ']" placeholder="apellido" value="' . $apellido . '" required>

            <label for="edad">Edad</label>
            <input type="number" name="edad[' . $index . ']" placeholder="edad" value="' . $edad . '" required>
        </div>
        <br>
    ';
}

// Función para añadir nuevos alumnos
function addFieldAlum($index, $alumno = null) {
    $nombre = isset($alumno['nombre']) ? $alumno['nombre'] : '';
    $apellido = isset($alumno['apellido']) ? $alumno['apellido'] : '';
    $edad = isset($alumno['edad']) ? $alumno['edad'] : '';

    return '
        <div class="field-group" id="field-group-' . $index . '">
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="nombre_' . $index . '">Nombre</label>
                <input type="text" name="nombre_alumno[]" id="nombre_' . $index . '" placeholder="nombre" value="' . $nombre . '" required class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="apellido_' . $index . '">Apellido</label>
                <input type="text" name="apellido_alumno[]" id="apellido_' . $index . '" placeholder="apellido" value="' . $apellido . '" required class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="edad_' . $index . '">Edad</label>
                <input type="number" name="edad_alumno[]" id="edad_' . $index . '" placeholder="edad" value="' . $edad . '" required class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <br>
    ';
}

// Función para añadir nuevas materias
function addFieldMateria($index, $materia = null) {
    $nombre = isset($materia['nombre']) ? $materia['nombre'] : '';
    $curso = isset($materia['curso']) ? $materia['curso'] : '';
    $duracion = isset($materia['duracion']) ? $materia['duracion'] : '';

    return '
        <div class="field-group" id="field-group-' . $index . '">
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="nombre_materia_' . $index . '">Nombre</label>
                <input type="text" name="nombre_materia[]" id="nombre_materia_' . $index . '" placeholder="nombre" value="' . $nombre . '" required class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="curso_materia_' . $index . '">Curso</label>
                <input type="text" name="curso_materia[]" id="curso_materia_' . $index . '" placeholder="curso" value="' . $curso . '" required class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="duracion_materia_' . $index . '">Duración</label>
                <input type="number" name="duracion_materia[]" id="duracion_materia_' . $index . '" placeholder="duración" value="' . $duracion . '" required class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <br>
    ';
}

// Función para mostrar los datos correspondientes
function dd(){
    foreach (func_get_args() as $arg){
        echo "<pre>";
        var_dump($arg);
        "</pre>";
    }
    die;
}

// Función para enviar Mail
function sendMail(
    string $fileAttachment,
    string $mailMessage = "Supermensaje TOP.",
    string $subject     = "Archivo TOP - M12",
    string $toAddress   = "danibaneza25@gmail.com",
    string $fromMail    = "danibaneza25@gmail.com"
): bool {
    $fileAttachment = trim($fileAttachment);
    
    if (!file_exists($fileAttachment)) {
        var_dump("El archivo adjunto no se encuentra.");
        return false;
    }

    $from          = $fromMail;
    $pathInfo      = pathinfo($fileAttachment);
    $attachmentName = "attachment_" . date("YmdHms") . (isset($pathInfo['extension']) ? "." . $pathInfo['extension'] : "");
    $attachment     = chunk_split(base64_encode(file_get_contents($fileAttachment)));
    $boundary       = "PHP-mixed-" . md5(time());
    $boundWithPre   = "\n--" . $boundary;

    $headers  = "From: $from\n";
    $headers .= "Reply-To: $from\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"";

    $message  = $boundWithPre;
    $message .= "\nContent-Type: text/plain; charset=UTF-8\n";
    $message .= "\n$mailMessage";
    $message .= $boundWithPre;
    $message .= "\nContent-Type: application/octet-stream; name=\"" . $attachmentName . "\"";
    $message .= "\nContent-Transfer-Encoding: base64\n";
    $message .= "\nContent-Disposition: attachment; filename=\"" . $attachmentName . "\"\n";
    $message .= $attachment;
    $message .= $boundWithPre . "--";

    if (mail($toAddress, $subject, $message, $headers)) {
        return true;
    } else {
        var_dump("Falló el envío del correo."); 
        return false;
    }
}
