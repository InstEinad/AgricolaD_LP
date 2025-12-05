<?php
// models/DetallePedido.php
require_once __DIR__ . '/../conexionbd/conexion.php';

class DetallePedido {
    private $conn;

    public function __construct() {
        $conexion = new Conexion();
        $this->conn = $conexion->iniciar();
    }

    // LISTAR TODOS
    public function obtenerTodos(): array {
        $sql = "SELECT * FROM DetallePedido";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // OBTENER UNO POR ID
    public function obtenerPorId(int $id): ?array {
        $sql = "SELECT * FROM DetallePedido WHERE idDetallePedido = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        return $res ?: null;
    }

    // CREAR
    public function crear(array $data): bool {
        $sql = "INSERT INTO DetallePedido 
                    (cantidad, precioUnitario, subtotal, Producto_idProducto, Pedido_idPedido)
                VALUES 
                    (:cantidad, :precioUnitario, :subtotal, :Producto_idProducto, :Pedido_idPedido)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':cantidad'          => $data['cantidad'],
            ':precioUnitario'    => $data['precioUnitario'],
            ':subtotal'          => $data['subtotal'],
            ':Producto_idProducto' => $data['Producto_idProducto'],
            ':Pedido_idPedido'   => $data['Pedido_idPedido'],
        ]);
    }

    // ACTUALIZAR
    public function actualizar(int $id, array $data): bool {
        $sql = "UPDATE DetallePedido SET
                    cantidad = :cantidad,
                    precioUnitario = :precioUnitario,
                    subtotal = :subtotal,
                    Producto_idProducto = :Producto_idProducto,
                    Pedido_idPedido = :Pedido_idPedido
                WHERE idDetallePedido = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id'                 => $id,
            ':cantidad'           => $data['cantidad'],
            ':precioUnitario'     => $data['precioUnitario'],
            ':subtotal'           => $data['subtotal'],
            ':Producto_idProducto'=> $data['Producto_idProducto'],
            ':Pedido_idPedido'    => $data['Pedido_idPedido'],
        ]);
    }

    // ELIMINAR
    public function eliminar(int $id): bool {
        $sql = "DELETE FROM DetallePedido WHERE idDetallePedido = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
