<?php
<<<<<<< Updated upstream
// Ruta ABSOLUTA al controlador de Pedido
=======
>>>>>>> Stashed changes
$baseUrlPedido = '/AGRICOLAD_LP/controllers/PedidoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Pedidos</title>
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
            padding: 0;
            background: #e8f5e9;
            font-family: Arial, sans-serif;
        }

        .contenedor {
            margin: 40px auto;
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
>>>>>>> Stashed changes
</head>
<body>
    <h1>Listado de Pedidos</h1>

    <a href="<?= $baseUrlPedido ?>?accion=crear">Nuevo Pedido</a>
    <br><br>

    <table border="1" cellpadding="5">
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
                        <button type="button" class="btn-editar-pedido"
                                data-id="<?= $p['idPedido'] ?>"
                                data-fecha-pedido="<?= htmlspecialchars($p['fechaPedido']) ?>"
                                data-estado="<?= htmlspecialchars($p['estado']) ?>"
                                data-direccion-entrega="<?= htmlspecialchars($p['direccionEntrega']) ?>"
                                data-total="<?= htmlspecialchars($p['total']) ?>"
                                data-id-distribucion="<?= htmlspecialchars($p['Distribucion_idDistribucion']) ?>">
                            Editar
                        </button>
                        |
                        <button type="button" class="btn-eliminar-pedido" data-id="<?= $p['idPedido'] ?>" onclick="return confirm('¿Seguro de eliminar este pedido?');">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No hay pedidos registrados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

<!-- Modal editar pedido -->
<div id="modalPedido" class="modal">
    <div class="modal-content">
        <span id="cerrarModalPedido" class="close">&times;</span>
        <h2>Editar Pedido</h2>
        <form id="formEditarPedido">
            <input type="hidden" name="idPedido" id="edit_idPedido">

            <label for="edit_fechaPedido">Fecha de Pedido:</label>
            <input type="date" name="fechaPedido" id="edit_fechaPedido" required>

            <label for="edit_estado">Estado:</label>
            <input type="text" name="estado" id="edit_estado" required>

            <label for="edit_direccionEntrega">Dirección de Entrega:</label>
            <input type="text" name="direccionEntrega" id="edit_direccionEntrega" required>

            <label for="edit_total">Total:</label>
            <input type="number" name="total" id="edit_total" required>

            <label for="edit_Distribucion_idDistribucion">Distribución:</label>
            <select name="Distribucion_idDistribucion" id="edit_Distribucion_idDistribucion" required>
                <?php if (!empty($distribuciones)): ?>
                    <?php foreach ($distribuciones as $dist): ?>
                        <option value="<?= $dist['idDistribucion'] ?>">Distribución #<?= $dist['idDistribucion'] ?> - <?= htmlspecialchars($dist['rutaAsignada']) ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <button type="submit">Guardar cambios</button>
        </form>
    </div>
</div>

<script>
    window.baseUrlPedido = '<?= $baseUrlPedido ?>';
</script>
<script src="/AGRICOLAD_LP/assets/scripts/pedido.js"></script>

</body>
</html>
