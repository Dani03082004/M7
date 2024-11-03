<?php include 'partials/header.view.php'; ?>

<main class="py-4">
    <div class="m-2 py-4 bg-gray-100 shadow-md rounded-lg w-2/3 mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800 underline mb-4">Formulario Profesores</h2>
        <form id="profesor_form" class="m-2 grid grid-cols-1 md:grid-cols-2 gap-4" action="profesores" method="POST">
            <div id="profesor_camps">
                <?php
                if (isset($_SESSION['contador_profe']) && $_SESSION['contador_profe'] > 0) {
                    for ($i = 1; $i <= $_SESSION['contador_profe']; $i++) {
                        if (isset($_SESSION['profesor' . $i])) {
                            $profesor = $_SESSION['profesor' . $i];
                            ?>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-700" for="nombre">Nombre</label>
                                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="nombre[]" placeholder="nombre" value="<?= htmlspecialchars($profesor['nombre']); ?>" required>
                            </div>
                            <br>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-700" for="apellido">Apellido</label>
                                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="apellido[]" placeholder="apellido" value="<?= htmlspecialchars($profesor['apellido']); ?>" required>
                            </div>
                            <br>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-700" for="edad">Edad</label>
                                <input class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="number" name="edad[]" placeholder="edad" value="<?= htmlspecialchars($profesor['edad']); ?>" required>
                            </div>
                            <hr class="mt-10">
                            <?php
                        }
                    }
                }
                ?>
            </div>

            <div class="flex justify-between items-center mt-4 md:col-span-2">
                <button type="button" onclick="addFieldProf()" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">Añadir más profes</button>
                <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">Siguiente</button>
            </div>
        </form>
    </div>
</main>

<script src="../../public/form.profesores.js"></script>
<?php include 'partials/footer.view.php'; ?>
