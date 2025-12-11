<?php
<<<<<<< Updated upstream
$usuario = $usuario ?? null;
$baseUrlUsuario = '/agri/AgricolaD_LP/controllers/UsuarioControlador.php';
=======
$baseUrlUsuario = '/AGRICOLAD_LP/controllers/UsuarioControlador.php';
if (realpath($_SERVER['SCRIPT_FILENAME']) === realpath(__FILE__)) {
    header('Location: ' . $baseUrlUsuario . '?accion=crear');
    exit;
}
if (!isset($usuario) || !is_array($usuario)) {
    $usuario = [];
}
if (!isset($clientes) || !is_array($clientes)) {
    $clientes = [];
}
>>>>>>> Stashed changes
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $usuario ? 'Editar Usuario' : 'Nuevo Usuario' ?></title>
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
            background: #e9f7ef; 
            font-family: Arial, sans-serif;
        }

        .contenedor {
            width: 90%;
            max-width: 450px;
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

>>>>>>> Stashed changes
</head>
<body>

<h1><?= $usuario ? 'Editar Usuario' : 'Nuevo Usuario' ?></h1>

<?php
$idUsuario   = $usuario['idUsuario']       ?? '';
$nombre      = $usuario['nombre']          ?? '';
$correo      = $usuario['correo']          ?? '';
$rol         = $usuario['rol']             ?? '';
$idCliente   = $usuario['Cliente_idCliente'] ?? '';
?>

<<<<<<< Updated upstream
<form method="post" action="/AGRICOLAD_LP/controllers/UsuarioControlador.php?accion=<?= $usuario ? 'editar&id='.$idUsuario : 'crear' ?>">
=======
<form method="post" action="<?= $baseUrlUsuario ?>?accion=<?= $idUsuario ? 'editar' : 'crear' ?><?= $idUsuario ? '&id='.$idUsuario : '' ?>">
>>>>>>> Stashed changes

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required><br><br>

    <label>Correo:</label><br>
    <input type="email" name="correo" value="<?= htmlspecialchars($correo) ?>" required><br><br>

    <label>Rol:</label><br>
    <input type="text" name="rol" value="<?= htmlspecialchars($rol) ?>" required><br><br>

    <label>Contraseña (solo si desea cambiarla):</label><br>
    <input type="password" name="clave"><br><br>

    <label>Cliente asociado:</label><br>
    <select name="Cliente_idCliente" required>
        <option value="">-- Seleccione un cliente --</option>

        <?php foreach ($clientes as $c): ?>
            <option value="<?= $c['idCliente'] ?>"
                <?= ($idCliente == $c['idCliente']) ? 'selected' : '' ?>>
                ID <?= $c['idCliente'] ?> - <?= htmlspecialchars($c['nombre']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <button type="submit">Guardar</button>
    <a href="../../controllers/UsuarioControlador.php?accion=listar">Cancelar</a>
</form>

</body>
</html>
