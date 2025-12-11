<?php
$baseUrlDistribucion = '/AGRICOLAD_LP/controllers/DistribucionControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Distribuciones</title>
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
            margin: 0;
            padding: 0;
            background: #e8f5e9;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #2e7d32;
        }

        a.boton-nuevo {
            display: inline-block;
            background: #66bb6a;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            margin-left: 20px;
        }

        a.boton-nuevo:hover {
            background: #57a05b;
        }

        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 15px rgba(0,0,0,0.15);
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background: #a5d6a7;
            color: #1b5e20;
            padding: 12px;
            font-weight: bold;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #dcedc8;
        }

        tr:hover {
            background: #f1f8e9;
        }

        a {
            color: #2e7d32;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .acciones a {
            margin-right: 6px;
        }
    </style>

</head>
<body>

<h1>Listado de Distribuciones</h1>

<a class="boton-nuevo" href="<?= $baseUrlDistribucion ?>?accion=crear">Nueva Distribución</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha Salida</th>
            <th>Fecha Entrega</th>
            <th>Ruta Asignada</th>
            <th>Transportista</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    <?php if (!empty($distribuciones)): ?>
        <?php foreach ($distribuciones as $d): ?>
            <tr>
                <td><?= htmlspecialchars($d['idDistribucion']) ?></td>
                <td><?= htmlspecialchars($d['fechaSalida']) ?></td>
                <td><?= htmlspecialchars($d['fechaEntrega']) ?></td>
                <td><?= htmlspecialchars($d['rutaAsignada']) ?></td>
                <td><?= htmlspecialchars($d['transportista']) ?></td>

                <td class="acciones">
                    <a href="<?= $baseUrlDistribucion ?>?accion=editar&id=<?= $d['idDistribucion'] ?>">Editar</a> |
                    <a href="<?= $baseUrlDistribucion ?>?accion=eliminar&id=<?= $d['idDistribucion'] ?>"
                       onclick="return confirm('¿Seguro de eliminar esta distribución?');">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6" style="text-align:center;">No hay registros de distribución.</td></tr>
    <?php endif; ?>
    </tbody>
</table>

</body>
</html>
