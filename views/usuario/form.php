<?php
$baseUrlUsuario = '/agri/AgricolaD_LP/controllers/UsuarioControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $usuario ? 'Editar Usuario' : 'Nuevo Usuario' ?></title>
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

<form method="post">

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
    <a href="<?= $baseUrlUsuario ?>?accion=listar">Cancelar</a>

</form>

</body>
</html>
