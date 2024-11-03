/* Utilizando JavaScript hacemos una función que utilizaremos en un botón */ 
//--- Ese botón nos servirá para ir añadiendo alumnos, hasta un máximo de 5 veces ----///

let contador_alum = 1; 

function addFieldAlum() {
    if (contador_alum < 5) { 
        const alumnos_camps = document.getElementById('alumnos_camps');
        
        // Creamos un nuevo contenedor 
        const nuevo_campo = document.createElement('div');
        
        // Cuando le damos al botón de Añadir más se generarán estos campos
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

        // Añadimos los campos al formulario de alumnos
        alumnos_camps.appendChild(nuevo_campo);
        contador_alum++;
    } else {
        // Si escribes más de 5 alumnos te saldrá una alerta
        alert("Sintiendolo mucho, muchisimo no puedes añadir más de 5 alumnos.");
    }
}



