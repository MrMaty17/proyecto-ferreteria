<?php
include '../layouts/header.php';
include_once '../auth/conexion.php';
session_start();

$sql = "SELECT * FROM products";
$result = $conexion->query($sql);

?>
<main>
    <div class="flex justify-center items-center">
        <button class="px-3 py-1 mx-auto rounded bg-green-600 hover:bg-green-600 my-4 cursor-pointer"><a class="text-xl text-white" href="formCreateUpdate.php">Crear Producto</a></button>
    </div>
    <?php
    $create = isset($_SESSION['create']) ? $_SESSION['create'] : null;
    if ($create == 'complete') :
    ?>
        <p class="text-sm text-green-400 text-center">El producto se creo correctamente</p>
    <?php elseif ($create == 'error') : ?>
        <p class="text-sm text-red-400 text-center">El producto no se creo</p>
    <?php
    endif;
    unset($_SESSION['create']);
    ?>
    <?php if ($result->num_rows > 0): ?>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagen</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modificar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Eliminar</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php while ($fila = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-xl text-black"><?= $fila['id'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-xl text-black"><?= $fila['name'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-xl text-black"><?= $fila['price'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-xl text-black"><?= $fila['stock'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-xl text-black"><img src="../assets/image/<?= !empty($fila['image']) ? $fila['image'] : 'no_foto.jpg' ?>" alt="Imagen" class="w-28 h-28 object-cover"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-xl text-black"><a href="formCreateUpdate.php?id=<?= $fila['id'] ?>"><button class="rounded bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 cursor-pointer">Modificar</button></a></td>
                            <td class="px-6 py-4 whitespace-nowrap text-xl text-black"><button class="rounded bg-red-400 hover:bg-red-500 text-white px-3 py-1 cursor-pointer" onclick="openWindow('delete.php?id=<?= $fila['id'] ?>')">Eliminar</button></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div id="ventana" class="hidden flex justify-center items-center z-30 bg-slate-600">
            <button class="justify-end items-end text-end rounded-xl border-gray-700 text-black" onclick="closeWindow()">X</button>
            <p class="text-xl">¿Estás seguro de que quieres eliminar este producto?</p>
            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 rounded" onclick="closeWindow()"><a class="text-xl text-white" id="deleteConfirm" href="">SI, ESTOY SEGURO</a></button>
        </div>
    <?php else: ?>
        <div class="flex justify-center items-center">
            <p class="text-2xl">No hay productos</p>
        </div>
    <?php endif; ?>
</main>
<script>
    const openWindow = (url) => {
        let ventana = document.querySelector('#ventana');
        let confirmButton = document.querySelector('#deleteConfirm');

        ventana.classList.delete('hidden');
        confirmButton.href = url;
    }

    const closeWindow = () => {
        let ventana = document.querySelector('#ventana');

        ventana.classList.add('hidden');
    }


</script>

<?php include '../layouts/footer.php'; ?>