<?php
// Ruta ABSOLUTA al controlador de Notificación
$baseUrlNotif = '/agri/AgricolaD_LP/controllers/NotificacionControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Notificaciones</title>
</head>
<body>
    <h1>Listado de Notificaciones</h1>

    <a href="../../controllers/NotificacionControlador.php?accion=crear">Nueva Notificación</a>
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
                        <a href="../../controllers/NotificacionControlador.php?accion=editar&id=<?= $n['idNotificacion'] ?>">Editar</a> |
                        <a href="../../controllers/NotificacionControlador.php?accion=eliminar&id=<?= $n['idNotificacion'] ?>">Eliminar</a>
                           onclick="return confirm('¿Seguro de eliminar esta notificación?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No hay notificaciones registradas.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
