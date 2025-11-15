<?php
require_once __DIR__ . '/../clases/Notificacion.php';
$notificacion = new Notificacion();

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

switch ($accion) {
// aquí va el crud, me guié de soporte :v
}