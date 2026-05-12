<?php 
include_once '../layouts/header.php'; 
include_once '../auth/conexion.php';
session_start();

$sql = "SELECT * FROM products";
$result = $conexion->query($sql);

?>
<main>
    <div class="flex-1">
        <button class="px-3 py-1 w-full mx-2 rounded bg-green-500 hover:bg-green-600 cursor-pointer"><a class="text-xl text-white" href="formCreateUpdate.php">+</a></button>
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
    <table class="flex justify-center items-center border-gray-400 border-2">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
            <?php while ($fila = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $fila['id'] ?></td>
                    <td><?= $fila['name'] ?></td>
                    <td><?= $fila['price'] ?></td>
                    <td><?= $fila['stock'] ?></td>
                    <td><?= $fila['image'] ?></td>
                    <td><a href="formCreateUpdate.php?id=<?= $fila['id']?>"><button class="rounded bg-blue-400 hover:bg-blue-500 text-white cursor-pointer">Modificar</button></a></td>
                    <td><button class="rounded bg-red-400 hover:bg-red-500 text-white cursor-pointer" id="delete.php?id=<?= $fila['id']?>">Eliminar</button></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="flex justify-center items-center">
                <p class="text-2xl">No hay productos</p>
            </div>
        </table>
    <?php endif; ?>
</main>
 