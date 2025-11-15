<?php
require_once __DIR__ . '/../clases/DetallePedido.php';
$detapedi = new DetallePedido();

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

switch ($accion) {
// aquí va el crud, me guié de soporte :v
}