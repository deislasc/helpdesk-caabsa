<?php
// Configuración de la base de datos
$dbhost = 'localhost';
$dbuser = 'osticket';
$dbpass = 'P455w0rd_2024$';
$dbname = 'osticket';

// Crear conexión
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener el número de ticket de la URL
$ticketNumber = isset($_GET['number']) ? $_GET['number'] : '';

// Preparar y ejecutar la consulta para obtener solo el estado del ticket
$query = "SELECT ts.name AS status
          FROM ost_ticket_status ts
          JOIN ost_ticket t ON t.status_id = ts.id
          WHERE t.number = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $ticketNumber);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontraron resultados y enviar respuesta
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row["status"];
} else {
    echo "No results";
}

// Cerrar la conexión
$conn->close();
?>

