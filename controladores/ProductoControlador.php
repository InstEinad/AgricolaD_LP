<?php
require_once __DIR__ . '/../clases/Producto.php';
$producto = new Producto();

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

switch ($accion) {
// aquí va el crud, me guié de soporte :v
}