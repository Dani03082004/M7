let contador_profe = 1; // Contador de profesores lo iniciamos a 1

function addFieldProf() {
    if (contador_profe < 5) { // Máximo de 5 profesores
        const profesor_camps = document.getElementById('profesor_camps');
        
        // Creamos contenedor para los nuevos campos
        const nuevo_campo = document.createElement('div');
        
        // Generar los nuevos campos del botón Añadir más
        nuevo_campo.innerHTML = `
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="nombre">Nombre</label>
                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="nombre[]" placeholder="nombre" required>
            </div>
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="apellido">Apellido</label>
                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="apellido[]" placeholder="apellido" required>
            </div>
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="edad">Edad</label>
                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="number" name="edad[]" placeholder="edad" required>
            </div>
            <br>
        `;

        // Añadir el nuevos campos al formulario
        profesor_camps.appendChild(nuevo_campo);
        contador_profe++;
    } else {
        alert("No se puede tener más de 5 profesores.");
    }
}
