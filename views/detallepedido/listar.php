<?php
// Ruta ABSOLUTA al controlador de DetallePedido
$baseUrlDetalle = '/agri/AgricolaD_LP/controllers/DetallePedidoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Detalles de Pedido</title>
</head>
<body>
    <h1>Listado de Detalles de Pedido</h1>

    <a href="<?= $baseUrlDetalle ?>?accion=crear">Nuevo Detalle</a>
    <br><br>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID Detalle</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
                <th>ID Producto</th>
                <th>ID Pedido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($detalles)): ?>
            <?php foreach ($detalles as $d): ?>
                <tr>
                    <td><?= htmlspecialchars($d['idDetallePedido']) ?></td>
                    <td><?= htmlspecialchars($d['cantidad']) ?></td>
                    <td><?= htmlspecialchars($d['precioUnitario']) ?></td>
                    <td><?= htmlspecialchars($d['subtotal']) ?></td>
                    <td><?= htmlspecialchars($d['Producto_idProducto']) ?></td>
                    <td><?= htmlspecialchars($d['Pedido_idPedido']) ?></td>
                    <td>
                        <a href="<?= $baseUrlDetalle ?>?accion=editar&id=<?= $d['idDetallePedido'] ?>">Editar</a> |
                        <a href="<?= $baseUrlDetalle ?>?accion=eliminar&id=<?= $d['idDetallePedido'] ?>"
                           onclick="return confirm('¿Seguro de eliminar este detalle de pedido?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No hay detalles de pedido registrados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
