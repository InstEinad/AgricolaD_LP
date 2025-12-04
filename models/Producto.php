<?php
// models/Producto.php
require_once __DIR__ . '/../conexionbd/conexion.php';

class Producto {
    private $conn;

    public function __construct() {
        $conexion = new Conexion();
        $this->conn = $conexion->iniciar();
    }

    // LISTAR TODOS
    public function obtenerTodos(): array {
        $sql = "SELECT * FROM Producto";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // OBTENER UNO
    public function obtenerPorId(int $id): ?array {
        $sql = "SELECT * FROM Producto WHERE idProducto = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        return $res ?: null;
    }

    // CREAR
    public function crear(array $data): bool {
        $sql = "INSERT INTO Producto 
                (nombre, tipo, unidadMedida, precioUnitario, cantidadDisponible, fechaRegistro, estado)
                VALUES 
                (:nombre, :tipo, :unidadMedida, :precioUnitario, :cantidadDisponible, :fechaRegistro, :estado)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':nombre'             => $data['nombre'],
            ':tipo'               => $data['tipo'],
            ':unidadMedida'       => $data['unidadMedida'],
            ':precioUnitario'     => $data['precioUnitario'],
            ':cantidadDisponible' => $data['cantidadDisponible'],
            ':fechaRegistro'      => $data['fechaRegistro'],
            ':estado'             => $data['estado'],
        ]);
    }

    // ACTUALIZAR
    public function actualizar(int $id, array $data): bool {
        $sql = "UPDATE Producto SET
                    nombre = :nombre,
                    tipo = :tipo,
                    unidadMedida = :unidadMedida,
                    precioUnitario = :precioUnitario,
                    cantidadDisponible = :cantidadDisponible,
                    fechaRegistro = :fechaRegistro,
                    estado = :estado
                WHERE idProducto = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id'                 => $id,
            ':nombre'             => $data['nombre'],
            ':tipo'               => $data['tipo'],
            ':unidadMedida'       => $data['unidadMedida'],
            ':precioUnitario'     => $data['precioUnitario'],
            ':cantidadDisponible' => $data['cantidadDisponible'],
            ':fechaRegistro'      => $data['fechaRegistro'],
            ':estado'             => $data['estado'],
        ]);
    }

    // ELIMINAR
    public function eliminar(int $id): bool {
        $sql = "DELETE FROM Producto WHERE idProducto = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
