<!-- views/producto/listar.php -->
<?php
// Ruta ABSOLUTA al controlador
$baseUrl = '/agri/AgricolaD_LP/controllers/ProductoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
</head>
<body>
    <h1>Listado de Productos</h1>

    <a href="<?= $baseUrl ?>?accion=crear">Nuevo Producto</a>
    <br><br>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Unidad Medida</th>
                <th>Precio Unit.</th>
                <th>Cant. Disp.</th>
                <th>Fecha Registro</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['idProducto']) ?></td>
                    <td><?= htmlspecialchars($p['nombre']) ?></td>
                    <td><?= htmlspecialchars($p['tipo']) ?></td>
                    <td><?= htmlspecialchars($p['unidadMedida']) ?></td>
                    <td><?= htmlspecialchars($p['precioUnitario']) ?></td>
                    <td><?= htmlspecialchars($p['cantidadDisponible']) ?></td>
                    <td><?= htmlspecialchars($p['fechaRegistro']) ?></td>
                    <td><?= htmlspecialchars($p['estado']) ?></td>
                    <td>
                        <a href="<?= $baseUrl ?>?accion=editar&id=<?= $p['idProducto'] ?>">Editar</a> |
                        <a href="<?= $baseUrl ?>?accion=eliminar&id=<?= $p['idProducto'] ?>"
                           onclick="return confirm('¿Seguro de eliminar este producto?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="9">No hay productos registrados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
