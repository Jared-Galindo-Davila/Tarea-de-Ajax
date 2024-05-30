<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $conexion->prepare("SELECT * FROM empleado WHERE id = :id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $empleado = $sql->fetch(PDO::FETCH_OBJ);

    if ($empleado) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Empleado</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        </head>
        <body>
        <div class="container">
            <h1 class="text-center" style="background-color: blue; color: aliceblue; border-radius: 20px;">EDITAR EMPLEADO</h1>
        </div>

        <div class="container">
            <form action="editarEmpleado.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $empleado->nombre; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $empleado->apellido; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $empleado->dni; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $empleado->direccion; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
            <a href="index.php" class="btn btn-secondary mt-3">Cancelar</a>
        </div>
        </body>
        </html>
        <?php
    } else {
        echo "<div class='alert alert-danger' role='alert'>Empleado no encontrado.</div>";
    }
} else {
    echo "<div class='alert alert-danger' role='alert'>ID de empleado no proporcionado.</div>";
}
?>
