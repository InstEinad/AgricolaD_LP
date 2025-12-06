<?php
require_once __DIR__ . '/../conexionbd/conexion.php';

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $correo = $_POST['correo'] ?? null;
    $clave  = $_POST['clave'] ?? null;

        try {
            $conexion = new Conexion();
            $conn = $conexion->iniciar();

            $sql = "SELECT idUsuario, nombre, rol, clave FROM usuario 
                    WHERE correo = :correo";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();

            $r = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($r && password_verify($clave, $r['clave'])) {
           
                header("Location: bienvenido.html");
                exit;
            } else {
                $mensaje = "Usuario o clave incorrecta";
            }

            $conexion->terminar();

        } catch (Exception $e) {
            $mensaje = "Error en el login: " . $e->getMessage();
        }
}
echo $mensaje;
?>