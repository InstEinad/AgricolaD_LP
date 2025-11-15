<?php
require_once __DIR__ . '/../clases/Usuario.php';
$usuario = new Usuario();

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

switch ($accion) {
// aquí va el crud, me guié de soporte :v

}