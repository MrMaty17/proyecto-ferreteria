<?php
include_once '../auth/conexion.php';
session_start();


$id = isset($_POST['id']) ? intval($_POST['id']) : (isset($_GET['id']) ? intval($_GET['id']) : 0);
$name = isset($_POST['name']) ? trim($_POST['name']) : null;
$price = isset($_POST['price']) ? floatval($_POST['price']) : null;
$image = isset($_POST['image']) ? trim($_POST['image']) : '';
$stock = isset($_POST['stock']) ? intval($_POST['stock']) : null;

if ($id <= 0 || $name === '') {
    $_SESSION['edit'] = 'error';
    header('Location: index.php');
    exit;
}

$stmt = $conexion->prepare("UPDATE products SET name = ?, price = ?, image = ?, stock = ? WHERE id = ?");
$stmt->bind_param('sdsii', $name, $price, $image, $stock, $id);
$stmt->execute();

if ($stmt->error) {
    $_SESSION['edit'] = 'error';
} else {
    $_SESSION['edit'] = 'complete';
}

$stmt->close();
$conexion->close();
header('Location: index.php');
