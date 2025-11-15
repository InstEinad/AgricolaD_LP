<?php
require_once __DIR__ . '/../clases/Reporte.php';
$reporte = new Reporte();

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

switch ($accion) {
// aquí va el crud, me guié de soporte :v
}