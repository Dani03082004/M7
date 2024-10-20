// form.profesores.js

let count = document.querySelectorAll('.field-group').length; // Contador inicial de grupos de campos

function addFieldProfJS() {
    let newFields = document.getElementById('newFields');
    let fieldGroup = `
        <div class="field-group" id="field-group-${count}">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre[${count}]" placeholder="nombre" required>

            <label for="apellido">Apellido</label>
            <input type="text" name="apellido[${count}]" placeholder="apellido" required>

            <label for="edad">Edad</label>
            <input type="number" name="edad[${count}]" placeholder="edad" required>
        </div>
        <br>
    `;
    newFields.insertAdjacentHTML('beforeend', fieldGroup);
    count++;
}
