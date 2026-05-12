<?php
include_once '../auth/conexion.php';
session_start();

$name = isset($_POST['name']) ? $_POST['name'] : null;
$price = isset($_POST['price']) ? $_POST['price'] : null;
$image = isset($_POST['image']) ? $_POST['image'] : null;
$stock = isset($_POST['stock']) ? $_POST['stock'] : null;

$sql = "INSERT INTO products (name, price, image, stock) VALUES ('$name', $price, '$image', $stock)";
$conexion->query($sql);

if ($conexion->error){
    $_SESSION['create'] = 'error';
    $conexion->close();
}

$_SESSION['create'] = 'complete';
header('Location: index.php');
