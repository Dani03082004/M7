<?php include 'partials/header.view.php'; ?>

<main class="py-4">
    <div class="m-2 py-4 bg-gray-100 shadow-md rounded-lg w-2/3 mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800 underline mb-4">Formulario Profesores</h2>
        <form class="m-2 grid grid-cols-1 md:grid-cols-2 gap-4" action="profesores" method="POST">
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700" for="nombre">Nombre</label>
            <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($nombre); ?>"required>
        </div>
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="apellido">Apellido</label>
                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="apellido" placeholder="Apellido" required>
            </div>
            <br>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="edad">Edad</label>
                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="number" name="edad" placeholder="Edad" required>
            </div>
            <div class="flex justify-between items-center mt-4 md:col-span-2">
                <button type="button" onclick="addField('profesores')" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">Añadir más profes</button>
                <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">Siguiente</button>
            </div>
        </form>
    </div>
</main>

<?php include 'partials/footer.view.php'; ?>
