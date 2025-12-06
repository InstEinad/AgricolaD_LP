<?php
$baseUrlUsuario = '/AGRICOLAD_LP/controllers/UsuarioControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/modal.css">
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/estilos.css">
</head>
<body>

<h1>Usuarios</h1>

<a href="/AGRICOLAD_LP/controllers/UsuarioControlador.php?accion=crear">Nuevo Usuario</a>

<br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Rol</th>
        <th>ID Cliente</th>
        <th>Acciones</th>
    </tr>

    <?php if (!empty($usuarios)): ?>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['idUsuario'] ?></td>
                <td><?= htmlspecialchars($u['nombre']) ?></td>
                <td><?= htmlspecialchars($u['correo']) ?></td>
                <td><?= htmlspecialchars($u['rol']) ?></td>
                <td><?= $u['Cliente_idCliente'] ?></td>
                <td>
                    <button
                        type="submit"
                        class="btn-editar-usuario"
                        data-id="<?= $u['idUsuario'] ?>"
                        data-nombre="<?= htmlspecialchars($u['nombre']) ?>"
                        data-correo="<?= htmlspecialchars($u['correo']) ?>"
                        data-rol="<?= htmlspecialchars($u['rol']) ?>"
                        data-cliente="<?= htmlspecialchars($u['Cliente_idCliente']) ?>"
                    >
                        Editar
                    </button>

                    <button
                        type="button"
                        class="btn-eliminar-usuario"
                        data-id="<?= $u['idUsuario'] ?>"
                    >
                        Eliminar
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">No hay usuarios registrados.</td>
        </tr>
    <?php endif; ?>
</table>

<!-- Modal para editar usuario -->
<div id="modalUsuario" class="modal">
    <div class="modal-content">
        <span id="cerrarModalUsuario" class="close">&times;</span>
        <h2>Editar Usuario</h2>

        <form id="formEditarUsuario" class="form-usuario-modal">
            <input type="hidden" name="idUsuario" id="edit_idUsuario">

            <div class="form-row">
                <label for="edit_nombre_usuario">Nombre:</label>
                <input type="text" name="nombre" id="edit_nombre_usuario" required>
            </div>

            <div class="form-row">
                <label for="edit_correo_usuario">Correo:</label>
                <input type="email" name="correo" id="edit_correo_usuario" required>
            </div>

            <div class="form-row">
                <label for="edit_rol_usuario">Rol:</label>
                <input type="text" name="rol" id="edit_rol_usuario" required>
            </div>

            <div class="form-row">
                <label for="edit_cliente_usuario">Cliente asociado (ID):</label>
                <input type="number" name="Cliente_idCliente" id="edit_cliente_usuario" required>
            </div>

            <div class="form-row form-actions">
                <button type="button" id="btnGuardarUsuarioModal">Guardar cambios</button>
            </div>
        </form>
    </div>
</div>

<script src="/AGRICOLAD_LP/assets/scripts/usuarios.js"></script>

</body>
</html>
