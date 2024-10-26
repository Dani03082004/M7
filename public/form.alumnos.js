let contador_alum = 1; // Contador de alumnos iniciado en 1

function addFieldAlum() {
    if (contador_alum < 5) { // Máximo de 5 alumnos
        const alumnos_camps = document.getElementById('alumnos_camps');
        
        // Crear contenedor para los nuevos campos
        const nuevo_campo = document.createElement('div');
        
        // Generar los nuevos campos del botón "Añadir más alumnos"
        nuevo_campo.innerHTML = `
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="nombre">Nombre</label>
                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="nombre_alumno[]" placeholder="nombre" required>
            </div>
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="apellido">Apellido</label>
                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="apellido_alumno[]" placeholder="apellido" required>
            </div>
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="edad">Edad</label>
                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="number" name="edad_alumno[]" placeholder="edad" required>
            </div>
            <br>
        `;

        // Añadir los nuevos campos al formulario de alumnos
        alumnos_camps.appendChild(nuevo_campo);
        contador_alum++;
    } else {
        alert("No se puede añadir más de 5 alumnos.");
    }
}



