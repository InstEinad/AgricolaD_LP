<?php
// Ruta ABSOLUTA al controlador de Cliente
$baseUrlCliente = '/agri/AgricolaD_LP/controllers/ClienteControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
</head>
<body>
    <h1>Listado de Clientes</h1>

    <a href="<?= $baseUrlCliente ?>?accion=crear">Nuevo Cliente</a>
    <br><br>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($clientes)): ?>
            <?php foreach ($clientes as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c['idCliente']) ?></td>
                    <td><?= htmlspecialchars($c['nombre']) ?></td>
                    <td><?= htmlspecialchars($c['direccion']) ?></td>
                    <td><?= htmlspecialchars($c['telefono']) ?></td>
                    <td><?= htmlspecialchars($c['correo']) ?></td>
                    <td>
                        <a href="<?= $baseUrlCliente ?>?accion=editar&id=<?= $c['idCliente'] ?>">Editar</a> |
                        <a href="<?= $baseUrlCliente ?>?accion=eliminar&id=<?= $c['idCliente'] ?>"
                           onclick="return confirm('¿Seguro de eliminar este cliente?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">No hay clientes registrados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
