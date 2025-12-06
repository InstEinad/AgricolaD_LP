<?php
// Ruta ABSOLUTA al controlador de DetallePedido
$baseUrlDetalle = '/AGRICOLAD_LP/controllers/DetallePedidoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Detalles de Pedido</title>
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/modal.css">
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
                        <button type="button" class="btn-editar-detallepedido"
                                data-id="<?= $d['idDetallePedido'] ?>"
                                data-cantidad="<?= htmlspecialchars($d['cantidad']) ?>"
                                data-precio-unitario="<?= htmlspecialchars($d['precioUnitario']) ?>"
                                data-subtotal="<?= htmlspecialchars($d['subtotal']) ?>"
                                data-id-producto="<?= htmlspecialchars($d['Producto_idProducto']) ?>"
                                data-id-pedido="<?= htmlspecialchars($d['Pedido_idPedido']) ?>">
                            Editar
                        </button>
                        |
                        <button type="button" class="btn-eliminar-detallepedido" data-id="<?= $d['idDetallePedido'] ?>">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No hay detalles de pedido registrados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- Modal editar DetallePedido -->
    <div id="modalDetallePedido" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Editar Detalle de Pedido</h2>
            <form id="formEditarDetallePedido">
                <input type="hidden" id="edit_id" name="id">

                <label for="edit_cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="edit_cantidad" required>

                <label for="edit_precioUnitario">Precio Unitario:</label>
                <input type="number" step="0.01" name="precioUnitario" id="edit_precioUnitario" required>

                <label for="edit_subtotal">Subtotal:</label>
                <input type="number" step="0.01" name="subtotal" id="edit_subtotal" readonly>

                <label for="edit_Producto_idProducto">Producto:</label>
                <select name="Producto_idProducto" id="edit_Producto_idProducto" required>
                    <?php if (!empty($productos)): ?>
                        <?php foreach ($productos as $prod): ?>
                            <option value="<?= $prod['idProducto'] ?>"><?= htmlspecialchars($prod['nombre']) ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                <label for="edit_Pedido_idPedido">Pedido:</label>
                <select name="Pedido_idPedido" id="edit_Pedido_idPedido" required>
                    <?php if (!empty($pedidos)): ?>
                        <?php foreach ($pedidos as $ped): ?>
                            <option value="<?= $ped['idPedido'] ?>">Pedido #<?= $ped['idPedido'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                <button type="submit">Guardar cambios</button>
            </form>
        </div>
    </div>

    <script>
        window.baseUrlDetallePedido = '<?= $baseUrlDetalle ?>';
    </script>
    <script src="/AGRICOLAD_LP/assets/scripts/detallepedido.js"></script>

</body>
</html>
