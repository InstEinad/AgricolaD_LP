<?php
$baseUrlNotif = '/agri/AgricolaD_LP/controllers/NotificacionControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $notificacion ? 'Editar' : 'Nueva' ?> Notificación</title>

<style>

/* ============================== */
/* ESTILOS DEL MENÚ DE NAVEGACIÓN */
/* ============================== */

nav {
    background: #f5f7fa;
    padding: 12px 20px;
    margin: 30px auto;
    width: max-content;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

nav ul {
    list-style: none;
    display: flex;
    gap: 25px;
    margin: 0;
    padding: 0;
}

nav li {
    position: relative;
}

nav > ul > li > a {
    text-decoration: none;
    padding: 6px 12px;
    display: block;
    border-radius: 8px;
    background: #dfe6f0;
    color: #2c3e50;
    font-weight: 600;
    transition: 0.2s;
}

nav > ul > li > a:hover {
    background: #cfd9e5;
}

.submenu {
    display: none;
    position: absolute;
    z-index: 9999;
    background: #ffffff;
    padding: 10px 0;
    list-style: none;
    top: 38px;
    min-width: 160px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.25);
}

.submenu li a {
    padding: 8px 15px;
    display: block;
    text-decoration: none;
    color: #2c3e50;
    border-radius: 6px;
    background: #f2f5f9;
}

.submenu li a:hover {
    background: #e3e9f0;
}

li:hover .submenu {
    display: block;
}

/* ============================== */
/* ESTILOS GENERALES Y FORMULARIO */
/* ============================== */

body {
    margin: 0;
    padding: 0;
    background: #e8f5e9;
    font-family: Arial, sans-serif;
}

/* Centrado del formulario SIN afectar al menú */
.centrar-form {
    display: flex;
    justify-content: center;
    align-items: center;
    height: calc(100vh - 160px); /* Ajusta según separaciones del menú */
}

.contenedor {
    background: #ffffff;
    padding: 25px 35px;
    width: 420px;
    border-radius: 12px;
    box-shadow: 0 0 18px rgba(0,0,0,0.2);
    animation: flotar 3s ease-in-out infinite alternate;
}

@keyframes flotar {
    0% { transform: translateY(0px); }
    100% { transform: translateY(-6px); }
}

h1 {
    text-align: center;
    color: #2e7d32;
    margin-bottom: 20px;
    font-size: 22px;
}

label {
    font-weight: bold;
    color: #1b5e20;
}

input, select {
    width: 100%;
    padding: 8px;
    margin-top: 4px;
    margin-bottom: 15px;
    border: 1px solid #a5d6a7;
    border-radius: 6px;
    background: #f1f8f1;
}

button {
    width: 100%;
    padding: 10px;
    background: #66bb6a;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 6px;
    cursor: pointer;
}

button:hover {
    background: #57a05b;
}

a {
    display: block;
    margin-top: 12px;
    text-align: center;
    color: #2e7d32;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

</style>

</head>
<body>

<!-- MENÚ -->
<nav>
    <ul>
        <li><a href="#">Clientes</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/ClienteControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/ClienteControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Detalles de Pedido</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/DetallePedidoControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/DetallePedidoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Distribución</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/DistribucionControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/DistribucionControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Notificaciones</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/NotificacionControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/NotificacionControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Pedido</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/PedidoControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/PedidoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Producto</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/ProductoControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/ProductoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Reporte</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/ReporteControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/ReporteControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li><a href="#">Usuario</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/UsuarioControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/UsuarioControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>
    </ul>
</nav>

<!-- FORMULARIO CENTRADO -->
<div class="centrar-form">
<div class="contenedor">

    <?php if (!isset($notificacion) || !is_array($notificacion)) { $notificacion = []; } ?>

    <h1><?= $notificacion ? 'Editar' : 'Nueva' ?> Notificación</h1>

    <?php
        $idNotificacion = $notificacion['idNotificacion'] ?? '';
        $tipo           = $notificacion['tipo']           ?? '';
        $fechaEnvio     = $notificacion['fechaEnvio']     ?? date('Y-m-d');
        $mensaje        = $notificacion['mensaje']        ?? '';
        $idUsuario      = $notificacion['Usuario_idUsuario'] ?? '';
        $idPedido       = $notificacion['Pedido_idPedido']   ?? '';
    ?>

    <form method="post" action="<?= $baseUrlNotif ?>?accion=<?= $idNotificacion ? 'editar&id=' . $idNotificacion : 'crear' ?>">

        <label>Tipo de Notificación:</label>
        <input type="text" name="tipo" value="<?= htmlspecialchars($tipo) ?>" required>

        <label>Fecha de Envío:</label>
        <input type="date" name="fechaEnvio" value="<?= htmlspecialchars($fechaEnvio) ?>" required>

        <label>Mensaje:</label>
        <input type="text" name="mensaje" maxlength="45" value="<?= htmlspecialchars($mensaje) ?>" required>

        <label>Usuario:</label>
        <select name="Usuario_idUsuario" required>
            <option value="">-- Seleccione usuario --</option>
            <?php foreach ($usuarios as $u): ?>
                <option value="<?= $u['idUsuario'] ?>" <?= $idUsuario == $u['idUsuario'] ? 'selected' : '' ?>>
                    ID: <?= $u['idUsuario'] ?> - <?= htmlspecialchars($u['nombre']) ?> (<?= htmlspecialchars($u['correo']) ?>)
                </option>
            <?php endforeach; ?>
        </select>

        <label>Pedido:</label>
        <select name="Pedido_idPedido" required>
            <option value="">-- Seleccione pedido --</option>
            <?php foreach ($pedidos as $p): ?>
                <option value="<?= $p['idPedido'] ?>" <?= $idPedido == $p['idPedido'] ? 'selected' : '' ?>>
                    Pedido ID: <?= $p['idPedido'] ?> - Fecha: <?= htmlspecialchars($p['fechaPedido']) ?> (Estado: <?= htmlspecialchars($p['estado']) ?>)
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Guardar</button>

        <a href="<?= $baseUrlNotif ?>?accion=listar">Cancelar</a>

    </form>

</div>
</div>

</body>
</html>
