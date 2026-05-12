<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $titulo = "Editar producto N°$id";
    $action = "edit.php?id=$id";
} else {
    $titulo = "Crear producto";
    $action = "create.php";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <h2><?=$titulo ?></h2>
    <form action="<?=$action ?>" method="POST">
        <label for="name">Nombre:</label>
        <p><input type="text" name="name" required></p>

        <label for="price">Precio:</label>
        <p><input type="number" name="price" required></p>

        <label for="stock">Stock</label>
        <p><input type="number" name="stock" required></p>

        <label for="image">Imagen:</label>
        <p><input type="file" name="image"></p>

        <button type="submit">Añadir</button>
    </form>
</body>
</html>