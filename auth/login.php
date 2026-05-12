<?php

include_once './conexion.php';

$name = $_POST['name'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE name === '$name'";
$usuarioQuery = $conexion->query($sql);
$usuario = $usuarioQuery->fetch_assoc();

if (!password_verify($password, $usuario['password'])) {
    header('Location: ./index.php');
    $conexion->close();
}

