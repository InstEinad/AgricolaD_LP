<?php
<<<<<<< Updated upstream
// Ruta ABSOLUTA al controlador de Notificación
=======
>>>>>>> Stashed changes
$baseUrlNotif = '/AGRICOLAD_LP/controllers/NotificacionControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Notificaciones</title>
<<<<<<< Updated upstream
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/estilos.css">
=======
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
                <li><a href="/AGRICOLAD_LP/controllers/ClienteControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/ClienteControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Detalles de Pedido</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/DetallePedidoControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/DetallePedidoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Distribución</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/DistribucionControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/DistribucionControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Notificaciones</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/NotificacionControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/NotificacionControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Pedido</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/PedidoControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/PedidoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Producto</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/ProductoControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/ProductoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Reporte</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/ReporteControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/ReporteControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Usuario</a>
            <ul class="submenu">
                <li><a href="/AGRICOLAD_LP/controllers/UsuarioControlador.php?accion=listar">Listar</a></li>
                <li><a href="/AGRICOLAD_LP/controllers/UsuarioControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

    </ul>
</nav>

    <style>
        body {
            margin: 0;
            padding: 40px;
            background: #e8f5e9;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #2e7d32;
            margin-bottom: 25px;
        }

        .btn-nuevo {
            display: block;
            width: 200px;
            margin: 0 auto 25px auto;
            padding: 10px;
            text-align: center;
            background: #66bb6a;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn-nuevo:hover {
            background: #57a05b;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0,0,0,0.15);
        }

        th {
            background: #a5d6a7;
            color: #1b5e20;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #c8e6c9;
        }

        tr:hover {
            background: #f1f8f1;
        }

        a {
            color: #2e7d32;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .acciones a {
            margin-right: 8px;
        }
    </style>

>>>>>>> Stashed changes
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
