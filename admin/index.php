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
    $create = $_SESSION['create'] ?? null;
    $edit = $_SESSION['edit'] ?? null;
    $delete = $_SESSION['delete'] ?? null;
    if ($edit === 'edit') :
    ?>
        <p class="text-sm text-green-400 text-center">El producto se editó correctamente</p>
    <?php elseif ($create === 'complete') : ?>
        <p class="text-sm text-green-400 text-center">El producto se creó correctamente</p>
    <?php elseif ($delete === 'delete') : ?>
        <p class="text-sm text-green-400 text-center">El producto se borró correctamente</p>
    <?php elseif ($edit === 'error' || $create === 'error' || $delete === 'error') : ?>
        <p class="text-sm text-red-400 text-center">El producto no se creó</p>
    <?php
    endif;
    unset($_SESSION['create']);
    unset($_SESSION['edit']);
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
                            <td class="px-6 py-4 whitespace-nowrap text-xl text-black"><?= number_format($fila['price'], 2, ',', '.') ?> $</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xl text-black"><?= $fila['stock'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-xl text-black"><img src="../assets/image/<?= !empty($fila['image']) ? $fila['image'] : 'no_foto.jpg' ?>" alt="Imagen" class="w-28 h-28 object-cover"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-xl text-black"><a href="formCreateUpdate.php?id=<?= $fila['id'] ?>"><button class="rounded bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 cursor-pointer">Modificar</button></a></td>
                            <td class="px-6 py-4 whitespace-nowrap text-xl text-black"><button class="rounded bg-red-400 hover:bg-red-500 text-white px-3 py-1 cursor-pointer" onclick="openWindow('delete.php?id=<?= $fila['id'] ?>')">Eliminar</button></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div id="ventana" class="hidden fixed inset-0 z-40 flex items-center justify-center bg-black/50 p-4">
            <div class="w-full max-w-md rounded-3xl bg-white p-6 shadow-2xl border border-slate-200">
                <div class="flex items-start justify-between gap-4 mb-5">
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-900">Confirmar eliminación</h2>
                        <p class="mt-2 text-sm text-slate-600">¿Estás seguro de que deseas eliminar este producto? Esta acción no se puede deshacer.</p>
                    </div>
                    <button class="text-slate-400 hover:text-slate-700 text-2xl leading-none" onclick="closeWindow()" aria-label="Cerrar">×</button>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                    <button class="w-full rounded-2xl bg-slate-200 px-4 py-2 text-slate-800 hover:bg-slate-300" onclick="closeWindow()">Cancelar</button>
                    <a id="deleteConfirm" href="delete.php?id=<?= $fila['id'] ?>" class="w-full rounded-2xl bg-red-600 px-4 py-2 text-center text-white hover:bg-red-700">Sí, eliminar</a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="flex justify-center items-center">
            <p class="text-2xl">No hay productos</p>
        </div>
    <?php endif; ?>
</main>
<script>
    const openWindow = (url) => {
        const ventana = document.querySelector('#ventana');
        const confirmButton = document.querySelector('#deleteConfirm');

        ventana.classList.remove('hidden');
        confirmButton.href = url;
    }

    const closeWindow = () => {
        const ventana = document.querySelector('#ventana');
        ventana.classList.add('hidden');
    }
</script>

<?php include '../layouts/footer.php'; ?>