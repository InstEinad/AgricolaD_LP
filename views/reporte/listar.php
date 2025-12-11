<?php
$baseUrlReporte = '/AGRICOLAD_LP/controllers/ReporteControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Reportes</title>
<<<<<<< Updated upstream
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/modal.css">
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
            background: #e9f7ef; /* verde pastel */
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #2e7d32;
            margin-top: 25px;
        }

        .nuevo {
            display: inline-block;
            margin: 20px;
            padding: 10px 18px;
            background: #66bb6a;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .nuevo:hover {
            background: #57a15c;
        }

        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 18px rgba(0,0,0,0.15);
        }

        thead {
            background: #a5d6a7;
            color: #1b5e20;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #c8e6c9;
            text-align: center;
        }

        tr:hover {
            background: #f1f8f5;
        }

        a {
            color: #2e7d32;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            color: #1b5e20;
        }
    </style>
>>>>>>> Stashed changes
</head>
<body>

<h1>Reportes</h1>

<a href="<?= $baseUrlReporte ?>?accion=crear">Nuevo Reporte</a>
<br><br>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo Reporte</th>
            <th>Fecha Generación</th>
            <th>Rango Fecha</th>
            <th>ID Usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    <?php if (!empty($reportes)): ?>
        <?php foreach ($reportes as $r): ?>
            <tr>
                <td><?= $r['idReporte'] ?></td>
                <td><?= htmlspecialchars($r['tipoReporte']) ?></td>
                <td><?= htmlspecialchars($r['fechaGeneracion']) ?></td>
                <td><?= htmlspecialchars($r['rangoFecha']) ?></td>
                <td><?= htmlspecialchars($r['Usuario_idUsuario']) ?></td>

                <td>
                    <button type="button" class="btn-editar-reporte"
                            data-id="<?= $r['idReporte'] ?>"
                            data-tipo-reporte="<?= htmlspecialchars($r['tipoReporte']) ?>"
                            data-fecha-generacion="<?= htmlspecialchars($r['fechaGeneracion']) ?>"
                            data-rango-fecha="<?= htmlspecialchars($r['rangoFecha']) ?>"
                            data-id-usuario="<?= htmlspecialchars($r['Usuario_idUsuario']) ?>">
                        Editar
                    </button>
                    |
                    <button type="button" class="btn-eliminar-reporte" data-id="<?= $r['idReporte'] ?>" onclick="return confirm('Eliminar reporte?')">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6">No hay reportes registrados.</td></tr>
    <?php endif; ?>
    </tbody>

</table>

<!-- Modal editar Reporte -->
<div id="modalReporte" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Editar Reporte</h2>
        <form id="formEditarReporte">
            <input type="hidden" id="edit_id" name="id">

            <label for="edit_tipoReporte">Tipo Reporte:</label>
            <input type="text" name="tipoReporte" id="edit_tipoReporte" required>

            <label for="edit_fechaGeneracion">Fecha Generación:</label>
            <input type="date" name="fechaGeneracion" id="edit_fechaGeneracion" required>

            <label for="edit_rangoFecha">Rango Fecha:</label>
            <input type="text" name="rangoFecha" id="edit_rangoFecha" required>

            <label for="edit_Usuario_idUsuario">Usuario:</label>
            <select name="Usuario_idUsuario" id="edit_Usuario_idUsuario" required>
                <?php if (!empty($usuarios)): ?>
                    <?php foreach ($usuarios as $u): ?>
                        <option value="<?= $u['idUsuario'] ?>"><?= htmlspecialchars($u['nombre']) ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <button type="submit">Guardar cambios</button>
        </form>
    </div>
</div>

<script>
    window.baseUrlReporte = '<?= $baseUrlReporte ?>';
</script>
<script src="/AGRICOLAD_LP/assets/scripts/reporte.js"></script>

</body>
</html>
