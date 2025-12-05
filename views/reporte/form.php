<?php
$reporte = $reporte ?? null;
$baseUrlReporte = '/agri/AgricolaD_LP/controllers/ReporteControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $reporte ? 'Editar Reporte' : 'Nuevo Reporte' ?></title>
</head>
<body>

<h1><?= $reporte ? 'Editar Reporte' : 'Nuevo Reporte' ?></h1>

<?php
$idReporte   = $reporte['idReporte']        ?? '';
$tipo        = $reporte['tipoReporte']     ?? '';
$fecha       = $reporte['fechaGeneracion'] ?? date('Y-m-d');
$rango       = $reporte['rangoFecha']      ?? '';
$idUsuario   = $reporte['Usuario_idUsuario'] ?? '';
?>

<form method="post" action="../../controllers/ReporteControlador.php?accion=<?= $reporte ? 'editar&id='.$idReporte : 'crear' ?>">

    <label>Tipo de Reporte:</label><br>
    <input type="text" name="tipoReporte" value="<?= htmlspecialchars($tipo) ?>" required><br><br>

    <label>Fecha de Generación:</label><br>
    <input type="date" name="fechaGeneracion" value="<?= htmlspecialchars($fecha) ?>" required><br><br>

    <label>Rango de Fecha:</label><br>
    <input type="text" name="rangoFecha" value="<?= htmlspecialchars($rango) ?>" required><br><br>

    <label>Usuario:</label><br>
    <select name="Usuario_idUsuario" required>
        <option value="">-- Seleccione usuario --</option>

        <?php foreach ($usuarios as $u): ?>
            <option value="<?= $u['idUsuario'] ?>"
                <?= ($idUsuario == $u['idUsuario']) ? 'selected' : '' ?>>
                ID <?= $u['idUsuario'] ?> - <?= htmlspecialchars($u['nombre']) ?> (<?= htmlspecialchars($u['correo']) ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <button type="submit">Guardar</button>
    <a href="../../controllers/ReporteControlador.php?accion=listar">Cancelar</a>

</form>

</body>
</html>
