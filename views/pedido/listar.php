<?php
$baseUrlPedido = '/agri/AgricolaD_LP/controllers/PedidoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Pedidos</title>

    <style>
    /* ========================== */
    /* ======= NAV BAR ========= */
    /* ========================== */

    nav {
        background: #f5f7fa;
        padding: 12px 20px;
        margin: 20px auto;
        width: max-content;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        text-align: center;
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

    /* ========================== */
    /* ======= CONTENIDO ======= */
    /* ========================== */

    body {
        margin: 0;
        padding: 0;
        background: #e8f5e9;
        font-family: Arial, sans-serif;
    }

    /* contenedor centrado */
    .contenedor-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .contenedor {
        background: #ffffff;
        padding: 25px 35px;
        width: 90%;
        max-width: 1000px;
        border-radius: 12px;
        box-shadow: 0 0 18px rgba(0,0,0,0.2);
        animation: flotar 3s ease-in-out infinite alternate;
    }

    @keyframes flotar {
        0% { transform: translateY(0); }
        100% { transform: translateY(-6px); }
    }

    h1 {
        text-align: center;
        color: #2e7d32;
        margin-bottom: 25px;
        font-size: 24px;
    }

    a.boton {
        display: inline-block;
        background: #66bb6a;
        color: white;
        padding: 10px 18px;
        border-radius: 6px;
        text-decoration: none;
        margin-bottom: 20px;
    }

    a.boton:hover {
        background: #57a05b;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #f1f8f1;
    }

    th {
        background: #c8e6c9;
        padding: 10px;
        border: 1px solid #a5d6a7;
        text-align: left;
    }

    td {
        padding: 10px;
        border: 1px solid #c8e6c9;
    }

    a {
        color: #2e7d32;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>

<!-- NAV SIEMPRE ARRIBA Y CENTRADO -->
<nav>
    <ul>
        <li>
            <a href="#">Clientes</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/ClienteControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/ClienteControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Detalles de Pedido</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/DetallePedidoControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/DetallePedidoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Distribución</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/DistribucionControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/DistribucionControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Notificaciones</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/NotificacionControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/NotificacionControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Pedido</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/PedidoControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/PedidoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Producto</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/ProductoControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/ProductoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Reporte</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/ReporteControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/ReporteControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Usuario</a>
            <ul class="submenu">
                <li><a href="/agri/AgricolaD_LP/controllers/UsuarioControlador.php?accion=listar">Listar</a></li>
                <li><a href="/agri/AgricolaD_LP/controllers/UsuarioControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>
    </ul>
</nav>

<!-- CONTENEDOR CENTRADO -->
<div class="contenedor-wrapper">
    <div class="contenedor">

        <h1>Listado de Pedidos</h1>

        <a class="boton" href="<?= $baseUrlPedido ?>?accion=crear">Nuevo Pedido</a>

        <table>
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
                            <a href="<?= $baseUrlPedido ?>?accion=editar&id=<?= $p['idPedido'] ?>">Editar</a> |
                            <a href="<?= $baseUrlPedido ?>?accion=eliminar&id=<?= $p['idPedido'] ?>"
                               onclick="return confirm('¿Seguro de eliminar este pedido?');">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php else: ?>
                <tr><td colspan="7">No hay pedidos registrados.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>

</body>
</html>
