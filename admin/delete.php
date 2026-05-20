<?php
include_once '../auth/conexion.php';
session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id = $id";
    $conexion->query($sql);
    if ($conexion->error){
        $_SESSION['delete'] = 'error';
        $conexion->close();
    }
    $_SESSION['delete'] = 'delete';
}
header('Location: index.php');