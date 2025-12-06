<?php
$pedido = $pedido ?? null;
// Ruta ABSOLUTA al controlador de Pedido
$baseUrlPedido = '/AGRICOLAD_LP/controllers/PedidoControlador.php';

// Si esta vista se abre directamente (sin pasar por el controlador), redirigimos
if (!isset($distribuciones)) {
    header('Location: ' . $baseUrlPedido . '?accion=crear');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $pedido ? 'Editar' : 'Nuevo' ?> Pedido</title>
</head>
<body>
    <h1><?= $pedido ? 'Editar' : 'Nuevo' ?> Pedido</h1>

    <?php
    // Valores para cargar si estamos editando
    $idPedido        = $pedido['idPedido']              ?? '';
    $fechaPedido     = $pedido['fechaPedido']           ?? date('Y-m-d');
    $estado          = $pedido['estado']                ?? '';
    $direccionEntrega= $pedido['direccionEntrega']      ?? '';
    $total           = $pedido['total']                 ?? 0;
    $idDistribucion  = $pedido['Distribucion_idDistribucion'] ?? '';
    ?>

    <form method="post" action="<?= $baseUrlPedido ?>?accion=<?= $pedido ? 'editar&id='.$idPedido : 'crear' ?>">

        <label>Fecha de Pedido:</label><br>
        <input type="date" name="fechaPedido" value="<?= htmlspecialchars($fechaPedido) ?>" required><br><br>

        <label>Estado:</label><br>
        <input type="text" name="estado" value="<?= htmlspecialchars($estado) ?>" required><br><br>

        <label>Dirección de Entrega:</label><br>
        <input type="text" name="direccionEntrega" value="<?= htmlspecialchars($direccionEntrega) ?>" required><br><br>

        <label>Total:</label><br>
        <input type="number" name="total" value="<?= htmlspecialchars($total) ?>" required><br><br>

        <label>Distribución:</label><br>
        <?php
        $countDistrib = !empty($distribuciones) ? count($distribuciones) : 0;
        ?>
        <p style="font-size:0.9em;color:#333;margin:0 0 6px 0">Opciones disponibles: <?= $countDistrib ?></p>
        <select name="Distribucion_idDistribucion" required>
            <option value="">-- Seleccione distribución --</option>
            <?php if (!empty($distribuciones)): ?>
                <?php foreach ($distribuciones as $d): ?>
                    <option value="<?= $d['idDistribucion'] ?>"
                        <?= ($idDistribucion == $d['idDistribucion']) ? 'selected' : '' ?>>
                        ID: <?= $d['idDistribucion'] ?> - Ruta: <?= htmlspecialchars($d['rutaAsignada']) ?> (Salida: <?= htmlspecialchars($d['fechaSalida']) ?>)
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <br><br>

        <button type="submit">Guardar</button>
        <a href="<?= $baseUrlPedido ?>?accion=listar">Cancelar</a>
    </form>

</body>
</html>
