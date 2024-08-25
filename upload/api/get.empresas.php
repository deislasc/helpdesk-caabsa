<?php
header('Content-Type: application/json');
$host = 'localhost'; // Por ejemplo, 'localhost'
$usuario = 'osticket_read'; // Tu usuario de MySQL
$contrasena = 'C44b542024$'; // Tu contraseña de MySQL
$baseDeDatos = 'caabsa'; // El nombre de tu base de datos

// Crear conexión
$conexion = new mysqli($host, $usuario, $contrasena, $baseDeDatos);

// Verificar conexión
if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}

$sql = "SELECT id_empresa, nombre FROM empresas";
$resultado = $conexion->query($sql);

$empresas = [];

if ($resultado->num_rows > 0) {
    // Salida de datos de cada fila
    while($fila = $resultado->fetch_assoc()) {
        $empresas[] = $fila;
    }
    echo json_encode($empresas);
} else {
    echo json_encode([]);
}

$conexion->close();
?>

