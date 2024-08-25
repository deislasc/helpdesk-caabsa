<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir el archivo de configuración
require 'config.php';  // Asegúrate de que config.php esté en el mismo directorio que help_topic.php

header('Content-Type: application/json');

// Verificar que la solicitud sea GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Método no permitido
    echo json_encode(["message" => "Only GET method is allowed"]);
    exit;
}

try {
    // Preparar y ejecutar la consulta para obtener los help_topic
    $stmt = $pdo->prepare("SELECT topic_id, topic FROM ost_help_topic");
    $stmt->execute();
    
    // Obtener los resultados
    $helpTopics = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verificar si se encontraron resultados y enviar respuesta
    if ($helpTopics) {
        echo json_encode($helpTopics);
    } else {
        echo json_encode(["message" => "No results"]);
    }
} catch (PDOException $e) {
    http_response_code(500); // Error interno del servidor
    echo json_encode(["message" => "Error: " . $e->getMessage()]);
}
?>
