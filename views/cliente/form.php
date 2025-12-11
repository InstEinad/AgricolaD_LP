<?php
<<<<<<< Updated upstream
$cliente = $cliente ?? null;
// Ruta ABSOLUTA al controlador de Cliente
$baseUrlCliente = '/AGRICOLAD_LP/controllers/ClienteControlador.php';
=======
$baseUrlCliente = '/AGRICOLAD_LP/controllers/ClienteControlador.php';
if (realpath($_SERVER['SCRIPT_FILENAME']) === realpath(__FILE__)) {
    header('Location: ' . $baseUrlCliente . '?accion=crear');
    exit;
}
if (!isset($cliente) || !is_array($cliente)) {
    $cliente = [];
}
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
    <form method="post" action="<?= $baseUrlCliente ?>?accion=<?= $cliente ? 'editar&id='.$idCliente : 'crear' ?>">
=======
    <form method="post" action="<?= $baseUrlCliente ?>?accion=<?= $idCliente ? 'editar' : 'crear' ?><?= $idCliente ? '&id='.$idCliente : '' ?>">
>>>>>>> Stashed changes

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
