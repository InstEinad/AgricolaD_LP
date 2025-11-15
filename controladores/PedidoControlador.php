<?php
require_once __DIR__ . '/../clases/Pedido.php';
$pedido = new Pedido();

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

switch ($accion) {
// aquí va el crud, me guié de soporte :v
}