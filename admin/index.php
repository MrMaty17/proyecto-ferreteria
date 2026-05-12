<?php 
include_once '../layouts/header.php'; 
include_once '../auth/conexion.php';
session_start();

$sql = "SELECT * FROM products";
$result = $conexion->query($sql);

?>
<main>
    <button><a href="formCreateUpdate.php">+</a></button>
    <?php 
        $create = isset($_SESSION['create']) ? $_SESSION['create'] : null;
        if ($create == 'complete') :
    ?>
        <p>El producto se creo correctamente</p>
    <?php elseif ($create == 'error') : ?>
        <p>El producto no se creo</p>
    <?php 
        endif;
        unset($_SESSION['create']);
    ?>
    <?php if ($result->num_rows > 0): ?>
    <table>
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
                    <td><a href="formCreateUpdate.php?id=<?= $fila['id'] ?>"><button>Modificar</button></a></td>
                    <td><button id="delete.php?id=<?= $fila['id'] ?>">Eliminar</button></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <div>
                <p>No hay productos</p>
            </div>
        </table>
    <?php endif; ?>
</main>
<?php include_once '../layouts/footer.php'; ?>