<?php
// models/Pedido.php
require_once __DIR__ . '/../conexionbd/conexion.php';

class Pedido {
    private $conn;

    public function __construct() {
        $conexion = new Conexion();
        $this->conn = $conexion->iniciar();
    }

    // LISTAR TODOS
    public function obtenerTodos(): array {
        $sql = "SELECT * FROM Pedido";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // OBTENER UNO POR ID
    public function obtenerPorId(int $id): ?array {
        $sql = "SELECT * FROM Pedido WHERE idPedido = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        return $res ?: null;
    }

    // CREAR
    public function crear(array $data): bool {
        $sql = "INSERT INTO Pedido 
                    (fechaPedido, estado, direccionEntrega, total, Distribucion_idDistribucion)
                VALUES 
                    (:fechaPedido, :estado, :direccionEntrega, :total, :Distribucion_idDistribucion)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':fechaPedido'             => $data['fechaPedido'],
            ':estado'                  => $data['estado'],
            ':direccionEntrega'        => $data['direccionEntrega'],
            ':total'                   => $data['total'],
            ':Distribucion_idDistribucion' => $data['Distribucion_idDistribucion'],
        ]);
    }

    // ACTUALIZAR
    public function actualizar(int $id, array $data): bool {
        $sql = "UPDATE Pedido SET
                    fechaPedido = :fechaPedido,
                    estado = :estado,
                    direccionEntrega = :direccionEntrega,
                    total = :total,
                    Distribucion_idDistribucion = :Distribucion_idDistribucion
                WHERE idPedido = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id'                       => $id,
            ':fechaPedido'              => $data['fechaPedido'],
            ':estado'                   => $data['estado'],
            ':direccionEntrega'         => $data['direccionEntrega'],
            ':total'                    => $data['total'],
            ':Distribucion_idDistribucion' => $data['Distribucion_idDistribucion'],
        ]);
    }

    // ELIMINAR
    public function eliminar(int $id): bool {
        $sql = "DELETE FROM Pedido WHERE idPedido = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
