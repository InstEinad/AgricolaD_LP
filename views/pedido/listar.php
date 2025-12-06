<?php
// Ruta ABSOLUTA al controlador de Pedido
$baseUrlPedido = '/AGRICOLAD_LP/controllers/PedidoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Pedidos</title>
</head>
<body>
    <h1>Listado de Pedidos</h1>

    <a href="<?= $baseUrlPedido ?>?accion=crear">Nuevo Pedido</a>
    <br><br>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Pedido</th>
                <th>Estado</th>
                <th>Dirección Entrega</th>
                <th>Total</th>
                <th>ID Distribución</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($pedidos)): ?>
            <?php foreach ($pedidos as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['idPedido']) ?></td>
                    <td><?= htmlspecialchars($p['fechaPedido']) ?></td>
                    <td><?= htmlspecialchars($p['estado']) ?></td>
                    <td><?= htmlspecialchars($p['direccionEntrega']) ?></td>
                    <td><?= htmlspecialchars($p['total']) ?></td>
                    <td><?= htmlspecialchars($p['Distribucion_idDistribucion']) ?></td>
                    <td>
                        <a href="<?= $baseUrlPedido ?>?accion=editar&id=<?= $p['idPedido'] ?>">Editar</a> |
                        <a href="<?= $baseUrlPedido ?>?accion=eliminar&id=<?= $p['idPedido'] ?>" onclick="return confirm('¿Seguro de eliminar este pedido?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No hay pedidos registrados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
