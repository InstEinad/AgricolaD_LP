<?php
require_once __DIR__ . '/../conexionbd/conexion.php';


$conexion = new Conexion();
$conn = $conexion->iniciar();

$sql = "SELECT idCliente, nombre FROM Cliente";
$stmt = $conn->prepare($sql);
$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];
    $Cliente_idCliente = $_POST['Cliente_idCliente'];

    try {
        $sql = "INSERT INTO Usuario(nombre, correo, clave, rol, Cliente_idCliente)
                VALUES (:nombre, :correo, :clave, :rol, :idCliente)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':clave', $clave);
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':idCliente', $Cliente_idCliente);

       if ($stmt->execute()){
            echo "El registro del usuario fue exitoso";
        }else{
            echo "Error al registrar";
        } 

        
    } catch (PDOException $e) {
        echo  $e->getMessage();
    }
}
?>

<h2>Registrar nuevo usuario</h2>


<form action="" method="POST">

    Nombre: <br>
    <input type="text" name="nombre" required><br><br>

    Correo: <br>
    <input type="email" name="correo" required><br><br>

    Contraseña: <br>
    <input type="password" name="clave" required><br><br>

    Rol: <br>
    <select name="rol" required>
        <option value="">-- Seleccione un rol --</option>
        <option value="admin">Admin</option>
        <option value="usuario">Usuario</option>
    </select><br><br>

    Cliente asociado: <br>
    <select name="Cliente_idCliente" required>
        <option value="">-- Seleccione cliente --</option>
        <?php foreach ($clientes as $c): ?>
            <option value="<?= $c['idCliente'] ?>">
                <?= htmlspecialchars($c['nombre']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Registrar</button>

</form>