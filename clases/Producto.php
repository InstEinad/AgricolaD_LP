<?php
require_once __DIR__ . '/../conexionbd/conexion.php';
class Producto {
    private $conn;

    public function __construct() {
        $conexion = new Conexion();
        $this->conn = $conexion->iniciar();
    }}

// faltan las funciones del crud