<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';  // Asegúrate de que config.php esté en el mismo directorio que getUser.php

header('Content-Type: application/json');

// Mapeo de los valores de área a los nombres de las áreas
$area_map = [
    1 => "Administración de Proyectos y Tecnólogia",
    2 => "Administración y Comunidad",
    3 => "Atracción de Talento",
    4 => "Contabilidad",
    5 => "Comercial",
    6 => "Comunicación Interna",
    7 => "Coordinación de Finanzas",
    8 => "Desarrollo Organizacional",
    9 => "Diseño",
    10 => "Fiscal",
    11 => "Fondeo",
    12 => "Jurídico Corporativo / Contencioso",
    13 => "OAE",
    14 => "Planeación Financiera",
    15 => "Compensaciones y Procesos",
    16 => "Relaciones Laborales",
    17 => "Tesorería",
    18 => "Presidencia",
    19 => "Administración de Riesgos",
    20 => "Capacitación y Desarrollo",
    21 => "Administración",
    22 => "Cumplimiento",
    23 => "Dirección",
    24 => "Editorial",
    25 => "Finanzas",
    26 => "Mantenimiento",
    27 => "Operaciones",
    28 => "Producción",
    29 => "Proyectos",
    30 => "Riesgos",
    31 => "Sistemas",
    32 => "Jurídico",
    33 => "Analisis Financiero",
    34 => "Gestión de Contrato",
    35 => "Cobranza",
    36 => "Estrategia Digital",
    37 => "Fondo de inversión",
    38 => "Fundación Caabsa",
    39 => "Concesiones",
    40 => "Seguros",
    41 => "Compras",
    42 => "Recursos Humanos",
    43 => "Coordinación de Inmuebles",
    44 => "Auditoria",
    45 => "Valores",
    46 => "Monitoreo",
    47 => "Community Manager"
];

// Verifica si el parámetro email está presente en la URL
if (!isset($_GET['email'])) {
    echo json_encode(['error' => 'Email is required']);
    exit;
}

// Obtiene el email de la URL
$email = $_GET['email'];

// Prepara la consulta SQL
$stmt = $pdo->prepare('SELECT u.id, u.name, u.created, e.address as email, 
                              o.name as organization_name,
                              c.area 
                       FROM ost_user u
                       JOIN ost_user_email e ON u.id = e.user_id
                       LEFT JOIN ost_organization o ON u.org_id = o.id
                       LEFT JOIN ost_user__cdata c ON u.id = c.user_id
                       WHERE e.address = ?');
$stmt->execute([$email]);

// Obtiene el resultado de la consulta
$user = $stmt->fetch();

// Verifica si el usuario fue encontrado
if ($user) {
    // Añade el nombre del área basado en el mapeo y elimina el id del área
    $user['area_name'] = isset($user['area']) ? $area_map[$user['area']] : null;
    unset($user['area']);
    echo json_encode($user);
} else {
    echo json_encode(['error' => 'User not found']);
}
?>
