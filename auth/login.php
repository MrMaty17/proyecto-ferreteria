<?php

include_once '/conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$password = $_POST['password'] ?? '';

if ($name === '' || $password === '') {
    header('Location: ../index.php?error=1');
    exit;
}

$stmt = $conexion->prepare('SELECT * FROM user WHERE name = ? LIMIT 1');
if (!$stmt) {
    error_log('Login prepare failed: ' . $conexion->error);
    header('Location: ../index.php?error=1');
    exit;
}

$stmt->bind_param('s', $name);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result ? $result->fetch_assoc() : null;
$stmt->close();

if (!$usuario || !password_verify($password, $usuario['password'])) {
    header('Location: ../index.php?error=1');
    exit;
}

session_regenerate_id(true);
$_SESSION['user'] = [
    'id' => $usuario['id'],
    'name' => $usuario['name'],
    'rol' => $usuario['rol'],
];

if ($usuario['rol'] === 'admin') {
    header('Location: ../admin/index.php');
    exit;
}

header('Location: ../super-user/index.php');
exit;
