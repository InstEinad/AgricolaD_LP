<?php
// models/Reporte.php
require_once __DIR__ . '/../conexionbd/conexion.php';

class Reporte {
    private $conn;

    public function __construct() {
        $conexion = new Conexion();
        $this->conn = $conexion->iniciar();
    }

    // LISTAR TODOS
    public function obtenerTodos(): array {
        $sql = "SELECT * FROM Reporte";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // OBTENER UNO
    public function obtenerPorId(int $id): ?array {
        $sql = "SELECT * FROM Reporte WHERE idReporte = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        return $res ?: null;
    }

    // CREAR
    public function crear(array $data): bool {
        $sql = "INSERT INTO Reporte 
                    (tipoReporte, fechaGeneracion, rangoFecha, Usuario_idUsuario)
                VALUES 
                    (:tipo, :fecha, :rango, :usuario)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':tipo'    => $data['tipoReporte'],
            ':fecha'   => $data['fechaGeneracion'],
            ':rango'   => $data['rangoFecha'],
            ':usuario' => $data['Usuario_idUsuario'],
        ]);
    }

    // ACTUALIZAR
    public function actualizar(int $id, array $data): bool {
        $sql = "UPDATE Reporte SET
                    tipoReporte = :tipo,
                    fechaGeneracion = :fecha,
                    rangoFecha = :rango,
                    Usuario_idUsuario = :usuario
                WHERE idReporte = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id'      => $id,
            ':tipo'    => $data['tipoReporte'],
            ':fecha'   => $data['fechaGeneracion'],
            ':rango'   => $data['rangoFecha'],
            ':usuario' => $data['Usuario_idUsuario'],
        ]);
    }

    // ELIMINAR
    public function eliminar(int $id): bool {
        $sql = "DELETE FROM Reporte WHERE idReporte = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
