<?php
include_once '../layouts/header.php';
include_once '../auth/conexion.php';
session_start();

$sql = "SELECT * FROM products";
$result = $conexion->query($sql);

?>
<main>
    <div class="flex justify-center items-center">
        <button class="px-3 py-1 mx-auto rounded bg-green-600 hover:bg-green-600 mt-4 cursor-pointer"><a class="text-xl text-white" href="formCreateUpdate.php">Crear Producto</a></button>
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $fila['id'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $fila['name'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $fila['price'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $fila['stock'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><img src="../assets/image/<?php $fila['image'] !== null ? $fila['image'] : 'no_foto.jpg'?>" alt="Imagen" class="w-16 h-16 object-cover"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><a href="formCreateUpdate.php?id=<?= $fila['id'] ?>"><button class="rounded bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 cursor-pointer">Modificar</button></a></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><button class="rounded bg-red-400 hover:bg-red-500 text-white px-3 py-1 cursor-pointer" onclick="window.location.href='delete.php?id=<?= $fila['id'] ?>'">Eliminar</button></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="flex justify-center items-center">
            <p class="text-2xl">No hay productos</p>
        </div>
    <?php endif; ?>
</main>