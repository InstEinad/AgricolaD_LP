<?php
$distribucion = $distribucion ?? null;
// Ruta ABSOLUTA al controlador de Distribución
$baseUrlDistribucion = '/AGRICOLAD_LP/controllers/DistribucionControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $distribucion ? 'Editar' : 'Nueva' ?> Distribución</title>
</head>
<body>
    <h1><?= $distribucion ? 'Editar' : 'Nueva' ?> Distribución</h1>

    <?php
    // Valores para cargar si estamos editando
    $idDistribucion = $distribucion['idDistribucion'] ?? '';
    $fechaSalida    = $distribucion['fechaSalida']    ?? date('Y-m-d');
    $fechaEntrega   = $distribucion['fechaEntrega']   ?? date('Y-m-d');
    $rutaAsignada   = $distribucion['rutaAsignada']   ?? '';
    $transportista  = $distribucion['transportista']  ?? '';
    ?>

    <form method="post" action="<?= $baseUrlDistribucion ?>?accion=<?= $distribucion ? 'editar&id='.$idDistribucion : 'crear' ?>">

        <label>Fecha de Salida:</label><br>
        <input type="date" name="fechaSalida" value="<?= htmlspecialchars($fechaSalida) ?>" required><br><br>

        <label>Fecha de Entrega:</label><br>
        <input type="date" name="fechaEntrega" value="<?= htmlspecialchars($fechaEntrega) ?>" required><br><br>

        <label>Ruta Asignada:</label><br>
        <input type="text" name="rutaAsignada" value="<?= htmlspecialchars($rutaAsignada) ?>" required><br><br>

        <label>Transportista:</label><br>
        <input type="text" name="transportista" value="<?= htmlspecialchars($transportista) ?>" required><br><br>

        <button type="submit">Guardar</button>
        <a href="<?= $baseUrlDistribucion ?>?accion=listar">Cancelar</a>

    </form>

</body>
</html>
