<?php
// Ruta ABSOLUTA al controlador de Notificación
$baseUrlNotif = '/AGRICOLAD_LP/controllers/NotificacionControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Notificaciones</title>
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/estilos.css">
</head>
<body>
    <h1>Listado de Notificaciones</h1>

    <a href="<?= $baseUrlNotif ?>?accion=crear">Nueva Notificación</a>
    <br><br>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Fecha Envío</th>
                <th>Mensaje</th>
                <th>ID Usuario</th>
                <th>ID Pedido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($notificaciones)): ?>
            <?php foreach ($notificaciones as $n): ?>
                <tr>
                    <td><?= htmlspecialchars($n['idNotificacion']) ?></td>
                    <td><?= htmlspecialchars($n['tipo']) ?></td>
                    <td><?= htmlspecialchars($n['fechaEnvio']) ?></td>
                    <td><?= htmlspecialchars($n['mensaje']) ?></td>
                    <td><?= htmlspecialchars($n['Usuario_idUsuario']) ?></td>
                    <td><?= htmlspecialchars($n['Pedido_idPedido']) ?></td>
                    <td>
                        <button type="button" class="btn-editar-notificacion"
                                data-id="<?= $n['idNotificacion'] ?>"
                                data-tipo="<?= htmlspecialchars($n['tipo']) ?>"
                                data-fecha-envio="<?= htmlspecialchars($n['fechaEnvio']) ?>"
                                data-mensaje="<?= htmlspecialchars($n['mensaje']) ?>"
                                data-id-usuario="<?= htmlspecialchars($n['Usuario_idUsuario']) ?>"
                                data-id-pedido="<?= htmlspecialchars($n['Pedido_idPedido']) ?>">
                            Editar
                        </button>
                        |
                        <button type="button" class="btn-eliminar-notificacion" data-id="<?= $n['idNotificacion'] ?>" onclick="return confirm('¿Seguro de eliminar esta notificación?');">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No hay notificaciones registradas.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- Modal editar Notificación -->
    <div id="modalNotificacion" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Editar Notificación</h2>
            <form id="formEditarNotificacion">
                <input type="hidden" id="edit_id" name="id">

                <label for="edit_tipo">Tipo:</label>
                <input type="text" name="tipo" id="edit_tipo" required>

                <label for="edit_fechaEnvio">Fecha Envío:</label>
                <input type="date" name="fechaEnvio" id="edit_fechaEnvio" required>

                <label for="edit_mensaje">Mensaje:</label>
                <input type="text" name="mensaje" id="edit_mensaje" required>

                <label for="edit_Usuario_idUsuario">Usuario:</label>
                <select name="Usuario_idUsuario" id="edit_Usuario_idUsuario" required>
                    <?php if (!empty($usuarios)): ?>
                        <?php foreach ($usuarios as $u): ?>
                            <option value="<?= $u['idUsuario'] ?>"><?= htmlspecialchars($u['nombre']) ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                <label for="edit_Pedido_idPedido">Pedido:</label>
                <select name="Pedido_idPedido" id="edit_Pedido_idPedido" required>
                    <?php if (!empty($pedidos)): ?>
                        <?php foreach ($pedidos as $p): ?>
                            <option value="<?= $p['idPedido'] ?>">Pedido #<?= $p['idPedido'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                <button type="submit">Guardar cambios</button>
            </form>
        </div>
    </div>

    <script>
        window.baseUrlNotificacion = '<?= $baseUrlNotif ?>';
    </script>
    <script src="/AGRICOLAD_LP/assets/scripts/notificacion.js"></script>

</body>
</html>
