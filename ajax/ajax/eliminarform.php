<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = $conexion->prepare("DELETE FROM LIBRO WHERE id = :id");
    $sql->bindParam(':id', $id);

    if ($sql->execute()) {
        header("Location: Index.php");
        exit();                                                                            
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error al eliminar el libro.</div>";
    }
} else {
    echo "<div class='alert alert-danger' role='alert'>ID de libro no proporcionado o método de solicitud incorrecto.</div>";
}
?>
