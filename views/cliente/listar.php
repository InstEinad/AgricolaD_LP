<?php
// Ruta ABSOLUTA al controlador de Cliente
$baseUrlCliente = '/agri/AgricolaD_LP/controllers/ClienteControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/modal.css">
</head>
<body>
    <h1>Listado de Clientes</h1>

    <a href="/AGRICOLAD_LP/controllers/ClienteControlador.php?accion=crear">Nuevo Cliente</a>
    <br><br>

    <table border="1" cellpadding="5">
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
            <td>
                <button type="button" class="btn-editar-cliente"
                        data-id="<?= $c['idCliente'] ?>"
                        data-nombre="<?= htmlspecialchars($c['nombre']) ?>"
                        data-direccion="<?= htmlspecialchars($c['direccion']) ?>"
                        data-telefono="<?= htmlspecialchars($c['telefono']) ?>"
                        data-correo="<?= htmlspecialchars($c['correo']) ?>">
                    Editar
                </button>

                <button type="button" class="btn-eliminar-cliente"
                        data-id="<?= $c['idCliente'] ?>">
                    Eliminar
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr><td colspan="6">No hay clientes registrados.</td></tr>
<?php endif; ?>
</tbody>
    </table>
    <!-- Modal editar cliente -->
<div id="modalCliente" class="modal">
  <div class="modal-content">
    <span id="cerrarModalCliente" class="close">&times;</span>
    <h2>Editar Cliente</h2>
    <form id="formEditarCliente">
      <input type="hidden" name="idCliente" id="edit_idCliente">

      <label for="edit_nombre">Nombre:</label>
      <input type="text" name="nombre" id="edit_nombre" required>

      <label for="edit_direccion">Dirección:</label>
      <input type="text" name="direccion" id="edit_direccion" required>

      <label for="edit_telefono">Teléfono:</label>
      <input type="text" name="telefono" id="edit_telefono" required>

      <label for="edit_correo">Correo:</label>
      <input type="email" name="correo" id="edit_correo" required>

      <button type="submit">Guardar cambios</button>
    </form>
  </div>
</div>
<script src="/AGRICOLAD_LP/assets/scripts/clientes.js"></script>
</body>
</html>
