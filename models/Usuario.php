<?php
// models/Usuario.php
require_once __DIR__ . '/../conexionbd/conexion.php';

class Usuario {
    private $conn;

    public function __construct() {
        $conexion = new Conexion();
        $this->conn = $conexion->iniciar();
    }

    // LISTAR TODOS
    public function obtenerTodos(): array {
        $sql = "SELECT * FROM Usuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // OBTENER UNO POR ID
    public function obtenerPorId(int $id): ?array {
        $sql = "SELECT * FROM Usuario WHERE idUsuario = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        return $res ?: null;
    }

    // CREAR
    public function crear(array $data): bool {
        $sql = "INSERT INTO Usuario 
                    (nombre, correo, contraseña, rol, Cliente_idCliente)
                VALUES 
                    (:nombre, :correo, :clave, :rol, :cliente)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':nombre'  => $data['nombre'],
            ':correo'  => $data['correo'],
            ':clave'   => $data['clave'], // guardado como hash
            ':rol'     => $data['rol'],
            ':cliente' => $data['Cliente_idCliente'],
        ]);
    }

    // ACTUALIZAR
public function actualizar(int $id, array $data): bool {
    $sql = "UPDATE Usuario 
            SET nombre = :nombre,
                correo = :correo,
                rol = :rol,
                Cliente_idCliente = :cliente
            WHERE idUsuario = :id";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([
        ':id'      => $id,
        ':nombre'  => $data['nombre'],
        ':correo'  => $data['correo'],
        ':rol'     => $data['rol'],
        ':cliente' => $data['Cliente_idCliente'],
    ]);
}
    // ACTUALIZAR CLAVE OPCIONAL
    public function actualizarClave(int $id, string $clave): bool {
        $sql = "UPDATE Usuario SET clave = :clave WHERE idUsuario = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id, ':clave' => $clave]);
    }

    // ELIMINAR
    public function eliminar(int $id): bool {
        $sql = "DELETE FROM Usuario WHERE idUsuario = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>