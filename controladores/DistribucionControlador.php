<?php
require_once __DIR__ . '/../clases/Distribucion.php';
$distribucion = new Distribucion();

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

switch ($accion) {
// aquí va el crud, me guié de soporte :v
}