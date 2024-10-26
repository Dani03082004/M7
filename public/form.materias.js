let contador_materias = 1; // Contador de materias iniciado en 1

function addFieldMateria() {
    if (contador_materias < 5) { // Máximo de 5 materias
        const materias_camps = document.getElementById('materias_camps');
        
        // Crear contenedor para los nuevos campos
        const nuevo_campo = document.createElement('div');
        
        // Generar los nuevos campos para añadir más materias
        nuevo_campo.innerHTML = `
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="nombre_materia">Nombre</label>
                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="nombre_materia[]" placeholder="Nombre" required>
            </div>
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="curso_materia">Curso</label>
                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="curso_materia[]" placeholder="Curso" required>
            </div>
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="duracion_materia">Duración</label>
                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="number" name="duracion_materia[]" placeholder="Duración" required>
            </div>
            <br>
        `;

        // Añadir los nuevos campos al formulario de materias
        materias_camps.appendChild(nuevo_campo);
        contador_materias++;
    } else {
        alert("No se puede añadir más de 5 materias.");
    }
}
