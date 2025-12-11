<?php
$baseUrlCliente = '/AGRICOLAD_LP/controllers/ClienteControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
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
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/ClienteControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/ClienteControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Detalles de Pedido</a>
            <ul class="submenu">
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/DetallePedidoControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/DetallePedidoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Distribución</a>
            <ul class="submenu">
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/DistribucionControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/DistribucionControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Notificaciones</a>
            <ul class="submenu">
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/NotificacionControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/NotificacionControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Pedido</a>
            <ul class="submenu">
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/PedidoControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/PedidoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Producto</a>
            <ul class="submenu">
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/ProductoControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/ProductoControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Reporte</a>
            <ul class="submenu">
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/ReporteControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/ReporteControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Usuario</a>
            <ul class="submenu">
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/UsuarioControlador.php?accion=listar">Listar</a></li>
                <li><a href="http://localhost/AGRICOLAD_LP/controllers/UsuarioControlador.php?accion=crear">Agregar</a></li>
            </ul>
        </li>

    </ul>
</nav>

    <style>
        body {
            background: #e9f7ef; /* verde pastel claro */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .contenedor {
            width: 90%;
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);

            /* animación suave flotante */
            animation: flotar 4s ease-in-out infinite;
        }

        @keyframes flotar {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-6px); }
            100% { transform: translateY(0px); }
        }

        h1 {
            text-align: center;
            color: #2e7d32;
            margin-bottom: 20px;
        }

        a.boton {
            display: inline-block;
            background: #66bb6a;
            padding: 10px 18px;
            text-decoration: none;
            color: white;
            border-radius: 6px;
            font-weight: bold;
        }

        a.boton:hover {
            background: #57a15c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
        }

        th {
            background: #a5d6a7;
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid #81c784;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #dcedc8;
        }

        tr:hover {
            background: #f1f8e9;
        }

        .acciones a {
            margin-right: 8px;
            color: #2e7d32;
            text-decoration: underline;
        }

        .acciones a:hover {
            color: #1b5e20;
        }
    </style>

</head>
<body>

<div class="contenedor">

    <h1>Listado de Clientes</h1>

    <a href="<?= $baseUrlCliente ?>?accion=crear" class="boton">Nuevo Cliente</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
        <?php if (!empty($clientes)): ?>
            <?php foreach ($clientes as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c['idCliente']) ?></td>
                    <td><?= htmlspecialchars($c['nombre']) ?></td>
                    <td><?= htmlspecialchars($c['direccion']) ?></td>
                    <td><?= htmlspecialchars($c['telefono']) ?></td>
                    <td><?= htmlspecialchars($c['correo']) ?></td>

                    <td class="acciones">
                        <a href="<?= $baseUrlCliente ?>?accion=editar&id=<?= $c['idCliente'] ?>">Editar</a>
                        <a href="<?= $baseUrlCliente ?>?accion=eliminar&id=<?= $c['idCliente'] ?>"
                           onclick="return confirm('¿Seguro de eliminar este cliente?');">
                           Eliminar
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">No hay clientes registrados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>
