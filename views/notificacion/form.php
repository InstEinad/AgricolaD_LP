<?php
<<<<<<< Updated upstream
$notificacion = $notificacion ?? null;
// Ruta ABSOLUTA al controlador de Notificación
$baseUrlNotif = '/AGRICOLAD_LP/controllers/NotificacionControlador.php';

// Si esta vista se abre directamente sin pasar por el controlador, redirigimos
if (!isset($usuarios) || !isset($pedidos)) {
    header('Location: ' . $baseUrlNotif . '?accion=crear');
    exit;
}
=======
$baseUrlNotif = '/AGRICOLAD_LP/controllers/NotificacionControlador.php';
if (realpath($_SERVER['SCRIPT_FILENAME']) === realpath(__FILE__)) {
    header('Location: ' . $baseUrlNotif . '?accion=crear');
    exit;
}
if (!isset($notificacion) || !is_array($notificacion)) {
    $notificacion = [];
}
if (!isset($usuarios) || !is_array($usuarios)) {
    $usuarios = [];
}
if (!isset($pedidos) || !is_array($pedidos)) {
    $pedidos = [];
}
>>>>>>> Stashed changes
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $notificacion ? 'Editar' : 'Nueva' ?> Notificación</title>
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/estilos.css">
</head>
<body>
<<<<<<< Updated upstream
=======

<!-- MENÚ -->
<nav>
    <ul>
        <li><a href="#">Clientes</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/ClienteControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/ClienteControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Detalles de Pedido</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/DetallePedidoControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/DetallePedidoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Distribución</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/DistribucionControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/DistribucionControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Notificaciones</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/NotificacionControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/NotificacionControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Pedido</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/PedidoControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/PedidoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Producto</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/ProductoControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/ProductoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Reporte</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/ReporteControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/ReporteControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Usuario</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/UsuarioControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/UsuarioControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>
    </ul>
</nav>

<!-- FORMULARIO CENTRADO -->
<div class="centrar-form">
<div class="contenedor">

>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
    <form method="post" action="<?= $baseUrlNotif ?>?accion=<?= $notificacion ? 'editar&id='.$idNotificacion : 'crear' ?>">
=======
    <form method="post" action="<?= $baseUrlNotif ?>?accion=<?= $idNotificacion ? 'editar' : 'crear' ?><?= $idNotificacion ? '&id='.$idNotificacion : '' ?>">
>>>>>>> Stashed changes

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
        <a href="../../controllers/NotificacionControlador.php?accion=listar">Cancelar</a>
    </form>

</body>
</html>
