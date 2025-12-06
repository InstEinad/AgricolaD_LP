<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

require_once __DIR__ . '/../conexionbd/conexion.php';

$conexion = new Conexion();
$conn = $conexion->iniciar();

// Inicializar variables
$mensaje = '';
$tipoMensaje = '';
$clientes = [];

// Obtener lista de clientes para el select
try {
    $sql = "SELECT idCliente, nombre FROM Cliente";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $mensaje = "❌ Error al cargar clientes: " . $e->getMessage();
    $tipoMensaje = 'error';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $clave = $_POST['clave'] ?? '';
    $rol = $_POST['rol'] ?? '';
    $Cliente_idCliente = $_POST['Cliente_idCliente'] ?? '';

    // Validar campos requeridos
    if (empty($nombre) || empty($correo) || empty($clave) || empty($rol) || empty($Cliente_idCliente)) {
        $mensaje = "❌ Todos los campos son requeridos.";
        $tipoMensaje = 'error';
    } else {
        try {
            // Verificar si el correo ya existe
            $sqlCheck = "SELECT idUsuario FROM Usuario WHERE correo = :correo";
            $stmtCheck = $conn->prepare($sqlCheck);
            $stmtCheck->bindParam(':correo', $correo);
            $stmtCheck->execute();
            
            if ($stmtCheck->rowCount() > 0) {
                $mensaje = "❌ El correo electrónico ya está registrado.";
                $tipoMensaje = 'error';
            } else {
                // Hash de la contraseña
                $clave_hash = password_hash($clave, PASSWORD_DEFAULT);
                
                $sql = "INSERT INTO Usuario (nombre, correo, `contraseña`, rol, Cliente_idCliente)
                        VALUES (:nombre, :correo, :contrasena, :rol, :idCliente)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':correo', $correo);
                $stmt->bindParam(':contrasena', $clave_hash);
                $stmt->bindParam(':rol', $rol);
                $stmt->bindParam(':idCliente', $Cliente_idCliente);

                if ($stmt->execute()) {
                    // Redireccionar a login.html después de registro exitoso
                    header('Location: login.html');
                    exit();
                } else {
                    $mensaje = "❌ Error al registrar el usuario.";
                    $tipoMensaje = 'error';
                }
            }
        } catch (PDOException $e) {
            $mensaje = "❌ Error en la base de datos: " . $e->getMessage();
            $tipoMensaje = 'error';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario - AgrícolaD</title>
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/estilos.css">
</head>
<body class="pagina-registro">
    <!-- Logo simple en la esquina superior izquierda -->
    <div class="simple-header">
        <div class="logo">
            <h1>🌱 AgrícolaD</h1>
        </div>
    </div>

    <div class="registro-container">
        <div class="registro-header">
            <h2>📝 Registrar Nuevo Usuario</h2>
            <p>Complete el formulario para crear una nueva cuenta en el sistema</p>
        </div>

        <?php if (!empty($mensaje)): ?>
            <div class="mensaje <?= $tipoMensaje ?>">
                <?= $mensaje ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="registro-form">
            <div class="campo-grupo">
                <label for="nombre">Nombre completo<span class="requerido">*</span></label>
                <input type="text" id="nombre" name="nombre" 
                       value="<?= isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '' ?>" 
                       placeholder="Ej: Juan Pérez" required>
            </div>

            <div class="campo-grupo">
                <label for="correo">Correo electrónico<span class="requerido">*</span></label>
                <input type="email" id="correo" name="correo" 
                       value="<?= isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : '' ?>" 
                       placeholder="usuario@ejemplo.com" required>
            </div>

            <div class="campo-grupo">
                <label for="clave">Contraseña<span class="requerido">*</span></label>
                <input type="password" id="clave" name="clave" 
                       placeholder="Mínimo 6 caracteres" required minlength="6">
                <div class="password-hint">Use una contraseña segura</div>
            </div>

            <div class="campo-grupo">
                <label for="rol">Rol<span class="requerido">*</span></label>
                <select id="rol" name="rol" required>
                    <option value="">-- Seleccione un rol --</option>
                    <option value="admin" <?= isset($_POST['rol']) && $_POST['rol'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
                    <option value="usuario" <?= isset($_POST['rol']) && $_POST['rol'] == 'usuario' ? 'selected' : '' ?>>Usuario</option>
                </select>
            </div>

            <div class="campo-grupo">
                <label for="Cliente_idCliente">Cliente asociado<span class="requerido">*</span></label>
                <select id="Cliente_idCliente" name="Cliente_idCliente" required>
                    <option value="">-- Seleccione cliente --</option>
                    <?php if (!empty($clientes)): ?>
                        <?php foreach ($clientes as $c): ?>
                            <option value="<?= $c['idCliente'] ?>" 
                                <?= isset($_POST['Cliente_idCliente']) && $_POST['Cliente_idCliente'] == $c['idCliente'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($c['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No hay clientes disponibles</option>
                    <?php endif; ?>
                </select>
            </div>

            <button type="submit" class="btn-registro">
                <span>📝 Registrar Usuario</span>
            </button>
        </form>

        <div class="login-link">
            ¿Ya tiene una cuenta? <a href="login.html">Iniciar sesión</a>
        </div>
    </div>
</body>
</html>