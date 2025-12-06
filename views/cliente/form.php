<?php
$cliente = $cliente ?? null;
// Ruta ABSOLUTA al controlador de Cliente
$baseUrlCliente = '/AGRICOLAD_LP/controllers/ClienteControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $cliente ? 'Editar' : 'Nuevo' ?> Cliente</title>
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/estilos.css">
</head>
<body>
    <h1><?= $cliente ? 'Editar' : 'Nuevo' ?> Cliente</h1>

    <?php
    // Valores para cargar si estamos editando
    $idCliente  = $cliente['idCliente'] ?? '';
    $nombre     = $cliente['nombre']    ?? '';
    $direccion  = $cliente['direccion'] ?? '';
    $telefono   = $cliente['telefono']  ?? '';
    $correo     = $cliente['correo']    ?? '';
    ?>

    <form method="post" action="<?= $baseUrlCliente ?>?accion=<?= $cliente ? 'editar&id='.$idCliente : 'crear' ?>">

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required><br><br>

        <label>Dirección:</label><br>
        <input type="text" name="direccion" value="<?= htmlspecialchars($direccion) ?>" required><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" value="<?= htmlspecialchars($telefono) ?>" required><br><br>

        <label>Correo:</label><br>
        <input type="email" name="correo" value="<?= htmlspecialchars($correo) ?>" required><br><br>

        <button type="submit">Guardar</button>
        <a href="/AGRICOLAD_LP/login/bienvenido.html">
            <button type="button">Volver</button>
        </a>

    </form>

</body>
</html>
