<?php
// controllers/ClienteControlador.php
require_once __DIR__ . '/../models/Cliente.php';

class ClienteControlador {

    public function listar() {
        $clienteModel = new Cliente();
        $clientes = $clienteModel->obtenerTodos();
        require __DIR__ . '/../views/cliente/listar.php';
    }

    public function crear() {
        $clienteModel = new Cliente();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre'    => $_POST['nombre'],
                'direccion' => $_POST['direccion'],
                'telefono'  => $_POST['telefono'],
                'correo'    => $_POST['correo'],
            ];

            $clienteModel->crear($data);
            header('Location: /AGRICOLAD_LP/controllers/ClienteControlador.php?accion=listar');
            exit;
        }

        // si es GET, solo mostramos el formulario vacío
        $cliente = null;
        require __DIR__ . '/../views/cliente/form.php';
    }

    public function editar() {
        $clienteModel = new Cliente();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id <= 0) {
            header('Location: ClienteControlador.php?accion=listar');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre'    => $_POST['nombre'],
                'direccion' => $_POST['direccion'],
                'telefono'  => $_POST['telefono'],
                'correo'    => $_POST['correo'],
            ];

            $clienteModel->actualizar($id, $data);
            header('Location: /AGRICOLAD_LP/controllers/ClienteControlador.php?accion=listar');
            exit;
        }

        // GET: cargamos el cliente y mostramos el formulario con datos
        $cliente = $clienteModel->obtenerPorId($id);
        require __DIR__ . '/../views/cliente/form.php';
    }

    public function eliminar() {
        $clienteModel = new Cliente();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id > 0) {
            $clienteModel->eliminar($id);
        }

        header('Location: /AGRICOLAD_LP/controllers/ClienteControlador.php?accion=listar');
        exit;
    }
}

/* ====== PEQUEÑO ENRUTADOR ====== */
$accion = $_GET['accion'] ?? 'listar';
$controlador = new ClienteControlador();

switch ($accion) {
    case 'listar':
        $controlador->listar();
        break;
    case 'crear':
        $controlador->crear();
        break;
    case 'editar':
        $controlador->editar();
        break;
    case 'eliminar':
        $controlador->eliminar();
        break;
    default:
        $controlador->listar();
        break;
}
