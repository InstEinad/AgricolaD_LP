<?php
// Ruta ABSOLUTA al controlador de Pedido
$baseUrlPedido = '/AGRICOLAD_LP/controllers/PedidoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Pedidos</title>
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/estilos.css">
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
                        <button type="button" class="btn-editar-pedido"
                                data-id="<?= $p['idPedido'] ?>"
                                data-fecha-pedido="<?= htmlspecialchars($p['fechaPedido']) ?>"
                                data-estado="<?= htmlspecialchars($p['estado']) ?>"
                                data-direccion-entrega="<?= htmlspecialchars($p['direccionEntrega']) ?>"
                                data-total="<?= htmlspecialchars($p['total']) ?>"
                                data-id-distribucion="<?= htmlspecialchars($p['Distribucion_idDistribucion']) ?>">
                            Editar
                        </button>
                        |
                        <button type="button" class="btn-eliminar-pedido" data-id="<?= $p['idPedido'] ?>" onclick="return confirm('¿Seguro de eliminar este pedido?');">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No hay pedidos registrados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

<!-- Modal editar pedido -->
<div id="modalPedido" class="modal">
    <div class="modal-content">
        <span id="cerrarModalPedido" class="close">&times;</span>
        <h2>Editar Pedido</h2>
        <form id="formEditarPedido">
            <input type="hidden" name="idPedido" id="edit_idPedido">

            <label for="edit_fechaPedido">Fecha de Pedido:</label>
            <input type="date" name="fechaPedido" id="edit_fechaPedido" required>

            <label for="edit_estado">Estado:</label>
            <input type="text" name="estado" id="edit_estado" required>

            <label for="edit_direccionEntrega">Dirección de Entrega:</label>
            <input type="text" name="direccionEntrega" id="edit_direccionEntrega" required>

            <label for="edit_total">Total:</label>
            <input type="number" name="total" id="edit_total" required>

            <label for="edit_Distribucion_idDistribucion">Distribución:</label>
            <select name="Distribucion_idDistribucion" id="edit_Distribucion_idDistribucion" required>
                <?php if (!empty($distribuciones)): ?>
                    <?php foreach ($distribuciones as $dist): ?>
                        <option value="<?= $dist['idDistribucion'] ?>">Distribución #<?= $dist['idDistribucion'] ?> - <?= htmlspecialchars($dist['rutaAsignada']) ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <button type="submit">Guardar cambios</button>
        </form>
    </div>
</div>

<script>
    window.baseUrlPedido = '<?= $baseUrlPedido ?>';
</script>
<script src="/AGRICOLAD_LP/assets/scripts/pedido.js"></script>

</body>
</html>
