<?php
// get_ticket_by_subject.php

// Configurar la conexión a la base de datos
$host = 'localhost'; // Ajusta estos valores a tu entorno
$username = 'osticket';
$password = 'P455w0rd_2024$';
$database = 'osticket';

// Conectar a la base de datos
$mysqli = new mysqli($host, $username, $password, $database);

// Verifica la conexión
if ($mysqli->connect_error) {
    die('Error de Conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Obtener el subject enviado por el cliente, asegúrate de sanitizar esta entrada
$subject = $mysqli->real_escape_string($_GET['subject']);

// Preparar la consulta SQL
$sql = "SELECT ot.number, otc.subject FROM ost_ticket ot INNER JOIN ost_ticket__cdata otc ON ot.ticket_id = otc.ticket_id WHERE otc.subject = ?";

// Preparar la declaración preparada
if ($stmt = $mysqli->prepare($sql)) {
    // Vincular los parámetros y ejecutar
    $stmt->bind_param("s", $subject);
    $stmt->execute();
    
    // Obtener los resultados
    $result = $stmt->get_result();

    // Verificar si se encontró algún ticket
    if ($result->num_rows > 0) {
        // Suponiendo que el subject es único, se obtendrá un solo resultado
        $ticket = $result->fetch_assoc();
        // Devolver los datos en formato JSON
        echo json_encode($ticket);
    } else {
        echo json_encode(array("error" => "No se encontró un ticket con ese asunto."));
    }
    
    // Cerrar la declaración preparada
    $stmt->close();
} else {
    echo json_encode(array("error" => "Error al preparar la consulta."));
}

// Cerrar la conexión
$mysqli->close();
?>
