<!-- views/producto/listar.php -->
<?php
// Ruta ABSOLUTA al controlador
$baseUrl = '/AGRICOLAD_LP/controllers/ProductoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/estilos.css">
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
                        <button type="button" class="btn-editar-producto"
                                data-id-producto="<?= $p['idProducto'] ?>"
                                data-nombre="<?= htmlspecialchars($p['nombre']) ?>"
                                data-tipo="<?= htmlspecialchars($p['tipo']) ?>"
                                data-unidad-medida="<?= htmlspecialchars($p['unidadMedida']) ?>"
                                data-precio-unitario="<?= htmlspecialchars($p['precioUnitario']) ?>"
                                data-cantidad-disponible="<?= htmlspecialchars($p['cantidadDisponible']) ?>"
                                data-fecha-registro="<?= htmlspecialchars($p['fechaRegistro']) ?>"
                                data-estado="<?= htmlspecialchars($p['estado']) ?>">
                            Editar
                        </button>
                        |
                        <button type="button" class="btn-eliminar-producto" data-id="<?= $p['idProducto'] ?>">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="9">No hay productos registrados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

        <!-- Modal editar producto (estilo cliente) -->
        <div id="modalProducto" class="modal">
            <div class="modal-content">
                <span id="cerrarModalProducto" class="close">&times;</span>
                <h2>Editar Producto</h2>
                <form id="formEditarProducto">
                    <input type="hidden" name="idProducto" id="edit_idProducto">

                    <label for="edit_nombre">Nombre:</label>
                    <input type="text" name="nombre" id="edit_nombre" required>

                    <label for="edit_tipo">Tipo:</label>
                    <input type="text" name="tipo" id="edit_tipo" required>

                    <label for="edit_unidadMedida">Unidad de Medida:</label>
                    <input type="text" name="unidadMedida" id="edit_unidadMedida" required>

                    <label for="edit_precioUnitario">Precio Unitario:</label>
                    <input type="number" step="0.01" name="precioUnitario" id="edit_precioUnitario" required>

                    <label for="edit_cantidadDisponible">Cantidad Disponible:</label>
                    <input type="number" name="cantidadDisponible" id="edit_cantidadDisponible" required>

                    <label for="edit_fechaRegistro">Fecha Registro:</label>
                    <input type="date" name="fechaRegistro" id="edit_fechaRegistro" required>

                    <label for="edit_estado">Estado:</label>
                    <input type="text" name="estado" id="edit_estado" required>

                    <button type="submit">Guardar cambios</button>
                </form>
            </div>
        </div>

        <script>
            window.baseUrlProducto = '<?= $baseUrl ?>';
        </script>
        <script src="/AGRICOLAD_LP/assets/scripts/productos.js"></script>
</body>
</html>
