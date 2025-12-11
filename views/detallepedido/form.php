<?php
$baseUrlDetalle = '/agri/AgricolaD_LP/controllers/DetallePedidoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $detalle ? 'Editar' : 'Nuevo' ?> Detalle de Pedido</title>
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
            background: #e9f7ef;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .contenedor {
            width: 90%;
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(0,0,0,0.15);
            animation: flotar 4s ease-in-out infinite;
        }

        @keyframes flotar {
            0% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
            100% { transform: translateY(0); }
        }

        h1 {
            text-align: center;
            color: #2e7d32;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #2e7d32;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #c8e6c9;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 15px;
        }

        input:focus, select:focus {
            border-color: #81c784;
            outline: none;
        }

        .boton {
            padding: 10px 18px;
            border: none;
            background: #66bb6a;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .boton:hover {
            background: #57a15c;
        }

        .cancelar {
            margin-left: 10px;
            text-decoration: none;
            color: #2e7d32;
            font-weight: bold;
        }

        .cancelar:hover {
            color: #1b5e20;
        }
    </style>

</head>
<body>

<div class="contenedor">

    <h1><?= $detalle ? 'Editar' : 'Nuevo' ?> Detalle de Pedido</h1>

    <?php
    $idDetallePedido = $detalle['idDetallePedido'] ?? '';
    $cantidad        = $detalle['cantidad']        ?? 1;
    $precioUnitario  = $detalle['precioUnitario']  ?? 0.00;
    $subtotal        = $detalle['subtotal']        ?? 0.00;
    $idProducto      = $detalle['Producto_idProducto'] ?? '';
    $idPedido        = $detalle['Pedido_idPedido']     ?? '';
    ?>

    <form method="post">

        <label>Cantidad</label>
        <input type="number" name="cantidad" min="1" value="<?= htmlspecialchars($cantidad) ?>" required>

        <label>Precio Unitario</label>
        <input type="number" step="0.01" name="precioUnitario" value="<?= htmlspecialchars($precioUnitario) ?>" required>

        <label>Subtotal (auto-cálculo)</label>
        <input type="text" value="<?= htmlspecialchars($subtotal) ?>" disabled>

        <label>Producto</label>
        <select name="Producto_idProducto" required>
            <option value="">-- Seleccione producto --</option>
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $p): ?>
                    <option value="<?= $p['idProducto'] ?>" <?= ($idProducto == $p['idProducto']) ? 'selected' : '' ?>>
                        ID <?= $p['idProducto'] ?> - <?= htmlspecialchars($p['nombre']) ?> (<?= htmlspecialchars($p['tipo']) ?>)
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>

        <label>Pedido</label>
        <select name="Pedido_idPedido" required>
            <option value="">-- Seleccione pedido --</option>
            <?php if (!empty($pedidos)): ?>
                <?php foreach ($pedidos as $pe): ?>
                    <option value="<?= $pe['idPedido'] ?>" <?= ($idPedido == $pe['idPedido']) ? 'selected' : '' ?>>
                        Pedido <?= $pe['idPedido'] ?> - Fecha <?= htmlspecialchars($pe['fechaPedido']) ?> (<?= htmlspecialchars($pe['estado']) ?>)
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>

        <button type="submit" class="boton">Guardar</button>
        <a href="<?= $baseUrlDetalle ?>?accion=listar" class="cancelar">Cancelar</a>

    </form>

</div>

</body>
</html>
