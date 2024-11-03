/* Hacemos un botón utilizando Javascript para añadir más materias */
// Nos servirá para ir añadiendo materias hasta un máximo de 5 veces

let contador_materias = 1; 

function addFieldMateria() {
    if (contador_materias < 5) { 
        const materias_camps = document.getElementById('materias_camps');
        const nuevo_campo = document.createElement('div');
        
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
        materias_camps.appendChild(nuevo_campo);
        contador_materias++;
    } else {
        alert("Tristemente, sintiendolo mucho no puedes añadir más de 5 materias.");
    }
}
