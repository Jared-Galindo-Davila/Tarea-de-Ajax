<?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['dni']) && isset($_POST['direccion']) &&
        !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['direccion'])) {
        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        
        $sql = "INSERT INTO Empleados (nombre, apellido, dni, direccion) VALUES ('$nombre', '$apellido', '$dni', '$direccion')";
        
        if ($conn->query($sql) === TRUE) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'error' => 'Error al agregar empleado: ' . $conn->error));
        }
    } else {
        echo json_encode(array('success' => false, 'error' => 'Por favor complete todos los campos.'));
    }
} else {
    echo json_encode(array('success' => false, 'error' => 'Método de solicitud incorrecto.'));
}

$conn->close();
?>
