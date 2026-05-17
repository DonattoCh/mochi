<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "mochico_db";

$conexion = new mysqli($servidor, $usuario, $password, $baseDatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$whatsapp = $_POST['whatsapp'];
$correo = $_POST['correo'];

$sql = "INSERT INTO pedidos (nombre, whatsapp, correo) VALUES (?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("sss", $nombre, $whatsapp, $correo);

if ($stmt->execute()) {
    header("Location: index.html");
    exit();
} else {
    echo "Error al registrar el pedido.";
}

$stmt->close();
$conexion->close();

?>