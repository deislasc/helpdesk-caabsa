<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir el archivo de configuración
require 'config.php';  // Asegúrate de que config.php esté en el mismo directorio que get_organizations.php

header('Content-Type: application/json');

// Verificar que la solicitud sea GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Método no permitido
    echo json_encode(["message" => "Only GET method is allowed"]);
    exit;
}

try {
    // Preparar y ejecutar la consulta para obtener las organizaciones
    $stmt = $pdo->prepare("SELECT id, name, created FROM ost_organization");
    $stmt->execute();
    
    // Obtener los resultados
    $organizations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verificar si se encontraron resultados y enviar respuesta
    if ($organizations) {
        echo json_encode($organizations);
    } else {
        echo json_encode(["message" => "No results"]);
    }
} catch (PDOException $e) {
    http_response_code(500); // Error interno del servidor
    echo json_encode(["message" => "Error: " . $e->getMessage()]);
}
?>
