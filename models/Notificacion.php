<?php
// models/Notificacion.php
require_once __DIR__ . '/../conexionbd/conexion.php';

class Notificacion {
    private $conn;

    public function __construct() {
        $conexion = new Conexion();
        $this->conn = $conexion->iniciar();
    }

    // LISTAR TODOS
    public function obtenerTodos(): array {
        $sql = "SELECT * FROM Notificacion";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // OBTENER UNO POR ID
    public function obtenerPorId(int $id): ?array {
        $sql = "SELECT * FROM Notificacion WHERE idNotificacion = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        return $res ?: null;
    }

    // CREAR
    public function crear(array $data): bool {
        $sql = "INSERT INTO Notificacion 
                    (tipo, fechaEnvio, mensaje, Usuario_idUsuario, Pedido_idPedido)
                VALUES 
                    (:tipo, :fechaEnvio, :mensaje, :Usuario_idUsuario, :Pedido_idPedido)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':tipo'            => $data['tipo'],
            ':fechaEnvio'      => $data['fechaEnvio'],
            ':mensaje'         => $data['mensaje'],
            ':Usuario_idUsuario' => $data['Usuario_idUsuario'],
            ':Pedido_idPedido' => $data['Pedido_idPedido'],
        ]);
    }

    // ACTUALIZAR
    public function actualizar(int $id, array $data): bool {
        $sql = "UPDATE Notificacion SET
                    tipo = :tipo,
                    fechaEnvio = :fechaEnvio,
                    mensaje = :mensaje,
                    Usuario_idUsuario = :Usuario_idUsuario,
                    Pedido_idPedido = :Pedido_idPedido
                WHERE idNotificacion = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id'               => $id,
            ':tipo'             => $data['tipo'],
            ':fechaEnvio'       => $data['fechaEnvio'],
            ':mensaje'          => $data['mensaje'],
            ':Usuario_idUsuario'=> $data['Usuario_idUsuario'],
            ':Pedido_idPedido'  => $data['Pedido_idPedido'],
        ]);
    }

    // ELIMINAR
    public function eliminar(int $id): bool {
        $sql = "DELETE FROM Notificacion WHERE idNotificacion = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
