<?php
// Ruta ABSOLUTA al controlador de Notificación
$baseUrlNotif = '/agri/AgricolaD_LP/controllers/NotificacionControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $notificacion ? 'Editar' : 'Nueva' ?> Notificación</title>
</head>
<body>
    <h1><?= $notificacion ? 'Editar' : 'Nueva' ?> Notificación</h1>

    <?php
    // Valores para cargar si estamos editando
    $idNotificacion = $notificacion['idNotificacion'] ?? '';
    $tipo           = $notificacion['tipo']           ?? '';
    $fechaEnvio     = $notificacion['fechaEnvio']     ?? date('Y-m-d');
    $mensaje        = $notificacion['mensaje']        ?? '';
    $idUsuario      = $notificacion['Usuario_idUsuario'] ?? '';
    $idPedido       = $notificacion['Pedido_idPedido']   ?? '';
    ?>

    <form method="post">

        <label>Tipo de Notificación:</label><br>
        <input type="text" name="tipo" value="<?= htmlspecialchars($tipo) ?>" required><br><br>

        <label>Fecha de Envío:</label><br>
        <input type="date" name="fechaEnvio" value="<?= htmlspecialchars($fechaEnvio) ?>" required><br><br>

        <label>Mensaje:</label><br>
        <input type="text" name="mensaje" maxlength="45" value="<?= htmlspecialchars($mensaje) ?>" required><br><br>

        <label>Usuario:</label><br>
        <select name="Usuario_idUsuario" required>
            <option value="">-- Seleccione usuario --</option>
            <?php if (!empty($usuarios)): ?>
                <?php foreach ($usuarios as $u): ?>
                    <option value="<?= $u['idUsuario'] ?>"
                        <?= ($idUsuario == $u['idUsuario']) ? 'selected' : '' ?>>
                        ID: <?= $u['idUsuario'] ?> - <?= htmlspecialchars($u['nombre']) ?> (<?= htmlspecialchars($u['correo']) ?>)
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <br><br>

        <label>Pedido:</label><br>
        <select name="Pedido_idPedido" required>
            <option value="">-- Seleccione pedido --</option>
            <?php if (!empty($pedidos)): ?>
                <?php foreach ($pedidos as $p): ?>
                    <option value="<?= $p['idPedido'] ?>"
                        <?= ($idPedido == $p['idPedido']) ? 'selected' : '' ?>>
                        Pedido ID: <?= $p['idPedido'] ?> - Fecha: <?= htmlspecialchars($p['fechaPedido']) ?> (Estado: <?= htmlspecialchars($p['estado']) ?>)
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <br><br>

        <button type="submit">Guardar</button>
        <a href="<?= $baseUrlNotif ?>?accion=listar">Cancelar</a>

    </form>

</body>
</html>
