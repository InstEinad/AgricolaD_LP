<?php
// Ruta ABSOLUTA al controlador de Distribución
$baseUrlDistribucion = '/AGRICOLAD_LP/controllers/DistribucionControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Distribuciones</title>
</head>
<body>
    <h1>Listado de Distribuciones</h1>

    <a href="<?= $baseUrlDistribucion ?>?accion=crear">Nueva Distribución</a>
    <br><br>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Salida</th>
                <th>Fecha Entrega</th>
                <th>Ruta Asignada</th>
                <th>Transportista</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($distribuciones)): ?>
            <?php foreach ($distribuciones as $d): ?>
                <tr>
                    <td><?= htmlspecialchars($d['idDistribucion']) ?></td>
                    <td><?= htmlspecialchars($d['fechaSalida']) ?></td>
                    <td><?= htmlspecialchars($d['fechaEntrega']) ?></td>
                    <td><?= htmlspecialchars($d['rutaAsignada']) ?></td>
                    <td><?= htmlspecialchars($d['transportista']) ?></td>
                    <td>
                        <a href="<?= $baseUrlDistribucion ?>?accion=editar&id=<?= $d['idDistribucion'] ?>">Editar</a> |
                        <a href="<?= $baseUrlDistribucion ?>?accion=eliminar&id=<?= $d['idDistribucion'] ?>">Eliminar</a>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">No hay registros de distribución.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
