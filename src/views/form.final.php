<?php include 'partials/header.view.php'; ?>

<main class="py-4">
    <div class="m-2 py-4 bg-gray-100 shadow-md rounded-lg w-2/3 mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800 underline mb-4">Enviar Correo</h2>
        
        <form id="final_form" class="m-2 grid grid-cols-1 gap-4" action="final" method="POST">
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700" for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" placeholder="Correo Electrónico" required class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div class="flex justify-center mt-4">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">Enviar</button>
            </div>
        </form>
    </div>
</main>

<?php include 'partials/footer.view.php'; ?>
