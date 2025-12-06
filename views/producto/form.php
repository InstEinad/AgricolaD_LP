<?php
$producto = $producto ?? null;
$baseUrl = '/AGRICOLAD_LP/controllers/ProductoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $producto ? 'Editar' : 'Nuevo' ?> Producto</title>
</head>
<body>
    <h1><?= $producto ? 'Editar' : 'Nuevo' ?> Producto</h1>

    <?php
    // Valores para cargar si estamos editando
    $idProducto         = $producto['idProducto']        ?? '';
    $nombre             = $producto['nombre']            ?? '';
    $tipo               = $producto['tipo']              ?? '';
    $unidadMedida       = $producto['unidadMedida']      ?? '';
    $precioUnitario     = $producto['precioUnitario']    ?? '';
    $cantidadDisponible = $producto['cantidadDisponible']?? '';
    $fechaRegistro      = $producto['fechaRegistro']     ?? date('Y-m-d');
    $estado             = $producto['estado']            ?? 'Disponible';
    ?>

    <form method="post" action="<?= $baseUrl ?>?accion=<?= $producto ? 'editar&id='.$idProducto : 'crear' ?>">

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required><br><br>

        <label>Tipo:</label><br>
        <input type="text" name="tipo" value="<?= htmlspecialchars($tipo) ?>" required><br><br>

        <label>Unidad de Medida:</label><br>
        <input type="text" name="unidadMedida" value="<?= htmlspecialchars($unidadMedida) ?>" required><br><br>

        <label>Precio Unitario:</label><br>
        <input type="number" step="0.01" name="precioUnitario" value="<?= htmlspecialchars($precioUnitario) ?>" required><br><br>

        <label>Cantidad Disponible:</label><br>
        <input type="number" name="cantidadDisponible" value="<?= htmlspecialchars($cantidadDisponible) ?>" required><br><br>

        <label>Fecha de Registro:</label><br>
        <input type="date" name="fechaRegistro" value="<?= htmlspecialchars($fechaRegistro) ?>" required><br><br>

        <label>Estado:</label><br>
        <input type="text" name="estado" value="<?= htmlspecialchars($estado) ?>" required><br><br>

        <button type="submit">Guardar</button>
        <a href="<?= $baseUrl ?>?accion=listar">Cancelar</a>

    </form>

</body>
</html>
