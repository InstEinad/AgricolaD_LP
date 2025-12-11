<?php
$baseUrlNotif = '/agri/AgricolaD_LP/controllers/NotificacionControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $notificacion ? 'Editar' : 'Nueva' ?> Notificación</title>
    <style>
    /* CONTENEDOR DE LA BARRA */
    nav {
        background: #f5f7fa;
        padding: 12px 20px;
        margin: 30px auto;          /* separación desde arriba */
        width: max-content;         /* se ajusta al contenido */
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }

    /* LISTA PRINCIPAL */
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

    /* ESTILO PRINCIPAL DE OPCIONES */
    nav > ul > li > a {
        text-decoration: none;
        padding: 6px 12px;
        display: block;
        border-radius: 8px;
        background: #dfe6f0;  /* pastel */
        color: #2c3e50;
        font-weight: 600;
        transition: 0.2s;
    }

    nav > ul > li > a:hover {
        background: #cfd9e5;
    }

    /* SUBMENÚ */
    .submenu {
        display: none;
        position: absolute;
        z-index: 9999;               /* MUY IMPORTANTE: queda encima */
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
        background: #f2f5f9;  /* pastel */
    }

    .submenu li a:hover {
        background: #e3e9f0; /* pastel más oscuro */
    }

    li:hover .submenu {
        display: block;
    }
</style>

<nav>
    <ul>

        <li>
            <a href="#">Clientes</a>
            <ul class="submenu">
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/ClienteControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/ClienteControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Detalles de Pedido</a>
            <ul class="submenu">
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/DetallePedidoControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/DetallePedidoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Distribución</a>
            <ul class="submenu">
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/DistribucionControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/DistribucionControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Notificaciones</a>
            <ul class="submenu">
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/NotificacionControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/NotificacionControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Pedido</a>
            <ul class="submenu">
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/PedidoControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/PedidoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Producto</a>
            <ul class="submenu">
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/ProductoControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/ProductoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Reporte</a>
            <ul class="submenu">
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/ReporteControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/ReporteControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Usuario</a>
            <ul class="submenu">
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/UsuarioControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/agri/AgricolaD_LP/controllers/UsuarioControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

    </ul>
</nav>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #e8f5e9;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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

<div class="contenedor">

    <h1><?= $notificacion ? 'Editar' : 'Nueva' ?> Notificación</h1>

    <?php
    $idNotificacion = $notificacion['idNotificacion'] ?? '';
    $tipo           = $notificacion['tipo']           ?? '';
    $fechaEnvio     = $notificacion['fechaEnvio']     ?? date('Y-m-d');
    $mensaje        = $notificacion['mensaje']        ?? '';
    $idUsuario      = $notificacion['Usuario_idUsuario'] ?? '';
    $idPedido       = $notificacion['Pedido_idPedido']   ?? '';
    ?>

    <form method="post">

        <label>Tipo de Notificación:</label>
        <input type="text" name="tipo" value="<?= htmlspecialchars($tipo) ?>" required>

        <label>Fecha de Envío:</label>
        <input type="date" name="fechaEnvio" value="<?= htmlspecialchars($fechaEnvio) ?>" required>

        <label>Mensaje:</label>
        <input type="text" name="mensaje" maxlength="45" value="<?= htmlspecialchars($mensaje) ?>" required>

        <label>Usuario:</label>
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

        <label>Pedido:</label>
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

        <button type="submit">Guardar</button>

        <a href="<?= $baseUrlNotif ?>?accion=listar">Cancelar</a>

    </form>
</div>

</body>
</html>
