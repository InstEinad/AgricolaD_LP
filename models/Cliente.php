<?php
// models/Cliente.php
require_once __DIR__ . '/../conexionbd/conexion.php';

class Cliente {
    private $conn;

    public function __construct() {
        $conexion = new Conexion();
        $this->conn = $conexion->iniciar();
    }

    // LISTAR TODOS
    public function obtenerTodos(): array {
        $sql = "SELECT * FROM Cliente";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // OBTENER UNO POR ID
    public function obtenerPorId(int $id): ?array {
        $sql = "SELECT * FROM Cliente WHERE idCliente = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        return $res ?: null;
    }

    // CREAR
    public function crear(array $data): bool {
        $sql = "INSERT INTO Cliente (nombre, direccion, telefono, correo)
                VALUES (:nombre, :direccion, :telefono, :correo)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':nombre'    => $data['nombre'],
            ':direccion' => $data['direccion'],
            ':telefono'  => $data['telefono'],
            ':correo'    => $data['correo'],
        ]);
    }

    // ACTUALIZAR
    public function actualizar(int $id, array $data): bool {
        $sql = "UPDATE Cliente SET
                    nombre = :nombre,
                    direccion = :direccion,
                    telefono = :telefono,
                    correo = :correo
                WHERE idCliente = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id'        => $id,
            ':nombre'    => $data['nombre'],
            ':direccion' => $data['direccion'],
            ':telefono'  => $data['telefono'],
            ':correo'    => $data['correo'],
        ]);
    }

    // ELIMINAR
    public function eliminar(int $id): bool {
        $sql = "DELETE FROM Cliente WHERE idCliente = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
