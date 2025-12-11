<?php
$baseUrl = '/agri/AgricolaD_LP/controllers/ProductoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $producto ? 'Editar' : 'Nuevo' ?> Producto</title>
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
            background: #d8f3dc;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #1b4332;
        }

        /* Contenedor general para centrar */
        .form-container {
            width: 400px;
            margin: 40px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);

            /* Animación suave tipo flotación */
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%   { transform: translateY(0px); }
            50%  { transform: translateY(-8px); }
            100% { transform: translateY(0px); }
        }

        label {
            font-weight: bold;
            color: #1b4332;
        }

        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #95d5b2;
            border-radius: 5px;
            margin-top: 4px;
        }

        button {
            background: #52b788;
            border: none;
            padding: 10px 15px;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background: #40916c;
        }

        a {
            display: block;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            color: #1b4332;
            font-weight: bold;
        }

        a:hover {
            color: #40916c;
        }
    </style>
</head>
<body>

<h1><?= $producto ? 'Editar' : 'Nuevo' ?> Producto</h1>

<?php
$idProducto         = $producto['idProducto']        ?? '';
$nombre             = $producto['nombre']            ?? '';
$tipo               = $producto['tipo']              ?? '';
$unidadMedida       = $producto['unidadMedida']      ?? '';
$precioUnitario     = $producto['precioUnitario']    ?? '';
$cantidadDisponible = $producto['cantidadDisponible']?? '';
$fechaRegistro      = $producto['fechaRegistro']     ?? date('Y-m-d');
$estado             = $producto['estado']            ?? 'Disponible';
?>

<div class="form-container">
    <form method="post">

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required><br><br>

        <label>Tipo:</label>
        <input type="text" name="tipo" value="<?= htmlspecialchars($tipo) ?>" required><br><br>

        <label>Unidad de Medida:</label>
        <input type="text" name="unidadMedida" value="<?= htmlspecialchars($unidadMedida) ?>" required><br><br>

        <label>Precio Unitario:</label>
        <input type="number" step="0.01" name="precioUnitario" value="<?= htmlspecialchars($precioUnitario) ?>" required><br><br>

        <label>Cantidad Disponible:</label>
        <input type="number" name="cantidadDisponible" value="<?= htmlspecialchars($cantidadDisponible) ?>" required><br><br>

        <label>Fecha de Registro:</label>
        <input type="date" name="fechaRegistro" value="<?= htmlspecialchars($fechaRegistro) ?>" required><br><br>

        <label>Estado:</label>
        <input type="text" name="estado" value="<?= htmlspecialchars($estado) ?>" required><br><br>

        <button type="submit">Guardar</button>
        <a href="<?= $baseUrl ?>?accion=listar">Cancelar</a>

    </form>
</div>

</body>
</html>
