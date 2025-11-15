<?php
require_once __DIR__ . '/../clases/Cliente.php';
$cliente = new Cliente();

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

switch ($accion) {
// aquí va el crud, me guié de soporte :v
}