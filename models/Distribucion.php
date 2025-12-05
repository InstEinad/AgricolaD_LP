<?php
// models/Distribucion.php
require_once __DIR__ . '/../conexionbd/conexion.php';

class Distribucion {
    private $conn;

    public function __construct() {
        $conexion = new Conexion();
        $this->conn = $conexion->iniciar();
    }

    // LISTAR TODOS
    public function obtenerTodos(): array {
        $sql = "SELECT * FROM Distribucion";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // OBTENER UNO POR ID
    public function obtenerPorId(int $id): ?array {
        $sql = "SELECT * FROM Distribucion WHERE idDistribucion = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        return $res ?: null;
    }

    // CREAR
    public function crear(array $data): bool {
        $sql = "INSERT INTO Distribucion (fechaSalida, fechaEntrega, rutaAsignada, transportista)
                VALUES (:fechaSalida, :fechaEntrega, :rutaAsignada, :transportista)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':fechaSalida'   => $data['fechaSalida'],
            ':fechaEntrega'  => $data['fechaEntrega'],
            ':rutaAsignada'  => $data['rutaAsignada'],
            ':transportista' => $data['transportista'],
        ]);
    }

    // ACTUALIZAR
    public function actualizar(int $id, array $data): bool {
        $sql = "UPDATE Distribucion SET
                    fechaSalida = :fechaSalida,
                    fechaEntrega = :fechaEntrega,
                    rutaAsignada = :rutaAsignada,
                    transportista = :transportista
                WHERE idDistribucion = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id'            => $id,
            ':fechaSalida'   => $data['fechaSalida'],
            ':fechaEntrega'  => $data['fechaEntrega'],
            ':rutaAsignada'  => $data['rutaAsignada'],
            ':transportista' => $data['transportista'],
        ]);
    }

    // ELIMINAR
    public function eliminar(int $id): bool {
        $sql = "DELETE FROM Distribucion WHERE idDistribucion = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
