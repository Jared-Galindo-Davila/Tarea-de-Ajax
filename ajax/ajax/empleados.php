<?php
header('Content-Type: application/json');
include "connection.php";

try {
    $sql = $conexion->query("SELECT * FROM EMPLEADO");
    $fila = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($fila);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
