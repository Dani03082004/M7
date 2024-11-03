/* Utilizando JavaScript haremos un botón que nos permitirá añadir profesores*/
// Hasta un máximo de 5 veces --> Máximo 5 profesores

let contador_profe = 1; 

function addFieldProf() {
    if (contador_profe < 5) { 
        const profesor_camps = document.getElementById('profesor_camps');
        const nuevo_campo = document.createElement('div');
        
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
        profesor_camps.appendChild(nuevo_campo);
        contador_profe++;
    } else {
        alert("NO, puedes añadir más de 5 profesores.");
    }
}
