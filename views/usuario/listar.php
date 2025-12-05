<?php
$baseUrlUsuario = '/agri/AgricolaD_LP/controllers/UsuarioControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
</head>
<body>

<h1>Usuarios</h1>

<a href="<?= $baseUrlUsuario ?>?accion=crear">Nuevo Usuario</a>
<br><br>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>ID Cliente</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    <?php if (!empty($usuarios)): ?>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['idUsuario'] ?></td>
                <td><?= htmlspecialchars($u['nombre']) ?></td>
                <td><?= htmlspecialchars($u['correo']) ?></td>
                <td><?= htmlspecialchars($u['rol']) ?></td>
                <td><?= htmlspecialchars($u['Cliente_idCliente']) ?></td>

                <td>
                    <a href="<?= $baseUrlUsuario ?>?accion=editar&id=<?= $u['idUsuario'] ?>">Editar</a> |
                    <a href="<?= $baseUrlUsuario ?>?accion=eliminar&id=<?= $u['idUsuario'] ?>"
                       onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6">No hay usuarios registrados.</td></tr>
    <?php endif; ?>
    </tbody>

</table>

</body>
</html>
