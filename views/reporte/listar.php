<?php
$baseUrlReporte = '/agri/AgricolaD_LP/controllers/ReporteControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Reportes</title>
</head>
<body>

<h1>Reportes</h1>

<a href="<?= $baseUrlReporte ?>?accion=crear">Nuevo Reporte</a>
<br><br>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo Reporte</th>
            <th>Fecha Generación</th>
            <th>Rango Fecha</th>
            <th>ID Usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    <?php if (!empty($reportes)): ?>
        <?php foreach ($reportes as $r): ?>
            <tr>
                <td><?= $r['idReporte'] ?></td>
                <td><?= htmlspecialchars($r['tipoReporte']) ?></td>
                <td><?= htmlspecialchars($r['fechaGeneracion']) ?></td>
                <td><?= htmlspecialchars($r['rangoFecha']) ?></td>
                <td><?= htmlspecialchars($r['Usuario_idUsuario']) ?></td>

                <td>
                    <a href="<?= $baseUrlReporte ?>?accion=editar&id=<?= $r['idReporte'] ?>">Editar</a> |
                    <a href="<?= $baseUrlReporte ?>?accion=eliminar&id=<?= $r['idReporte'] ?>"
                        onclick="return confirm('Eliminar reporte?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6">No hay reportes registrados.</td></tr>
    <?php endif; ?>
    </tbody>

</table>

</body>
</html>
