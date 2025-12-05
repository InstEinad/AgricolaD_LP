<?php
$detalle = $detalle ?? null;
// Ruta ABSOLUTA al controlador de DetallePedido
$baseUrlDetalle = '/agri/AgricolaD_LP/controllers/DetallePedidoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $detalle ? 'Editar' : 'Nuevo' ?> Detalle de Pedido</title>
</head>
<body>
    <h1><?= $detalle ? 'Editar' : 'Nuevo' ?> Detalle de Pedido</h1>

    <?php
    // Valores para cargar si estamos editando
    $idDetallePedido = $detalle['idDetallePedido'] ?? '';
    $cantidad        = $detalle['cantidad']        ?? 1;
    $precioUnitario  = $detalle['precioUnitario']  ?? 0.00;
    $subtotal        = $detalle['subtotal']        ?? 0.00;
    $idProducto      = $detalle['Producto_idProducto'] ?? '';
    $idPedido        = $detalle['Pedido_idPedido']     ?? '';
    ?>

    <form method="post" action="../../controllers/DetallePedidoControlador.php?accion=<?= $detalle ? 'editar&id='.$idDetallePedido : 'crear' ?>">
        
        <label>Cantidad:</label><br>
        <input type="number" name="cantidad" min="1" value="<?= htmlspecialchars($cantidad) ?>" required><br><br>

        <label>Precio Unitario:</label><br>
        <input type="number" step="0.01" name="precioUnitario" value="<?= htmlspecialchars($precioUnitario) ?>" required><br><br>

        <!-- Mostramos subtotal solo como lectura si quieres -->
        <label>Subtotal (se calcula automáticamente al guardar):</label><br>
        <input type="text" value="<?= htmlspecialchars($subtotal) ?>" disabled><br><br>

        <label>Producto:</label><br>
        <select name="Producto_idProducto" required>
            <option value="">-- Seleccione producto --</option>
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $p): ?>
                    <option value="<?= $p['idProducto'] ?>"
                        <?= ($idProducto == $p['idProducto']) ? 'selected' : '' ?>>
                        ID: <?= $p['idProducto'] ?> - <?= htmlspecialchars($p['nombre']) ?> (<?= htmlspecialchars($p['tipo']) ?>)
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <br><br>

        <label>Pedido:</label><br>
        <select name="Pedido_idPedido" required>
            <option value="">-- Seleccione pedido --</option>
            <?php if (!empty($pedidos)): ?>
                <?php foreach ($pedidos as $pe): ?>
                    <option value="<?= $pe['idPedido'] ?>"
                        <?= ($idPedido == $pe['idPedido']) ? 'selected' : '' ?>>
                        Pedido ID: <?= $pe['idPedido'] ?> - Fecha: <?= htmlspecialchars($pe['fechaPedido']) ?> (Estado: <?= htmlspecialchars($pe['estado']) ?>)
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <br><br>

        <button type="submit">Guardar</button>
        <a href="../../controllers/DetallePedidoControlador.php?accion=listar">Cancelar</a>

    </form>

</body>
</html>
