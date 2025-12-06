<?php
// controllers/PedidoControlador.php
require_once __DIR__ . '/../models/Pedido.php';
require_once __DIR__ . '/../models/Distribucion.php';

class PedidoControlador {

    public function listar() {
        $pedidoModel = new Pedido();
        $pedidos = $pedidoModel->obtenerTodos();
        // cargar distribuciones para el modal/selección
        $distribucionModel = new Distribucion();
        $distribuciones = $distribucionModel->obtenerTodos();
        require __DIR__ . '/../views/pedido/listar.php';
    }

    public function crear() {
        $pedidoModel = new Pedido();
        $distribucionModel = new Distribucion();

        // Necesitamos las distribuciones para el combo
        $distribuciones = $distribucionModel->obtenerTodos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'fechaPedido'              => $_POST['fechaPedido'],
                'estado'                   => $_POST['estado'],
                'direccionEntrega'         => $_POST['direccionEntrega'],
                'total'                    => $_POST['total'],
                'Distribucion_idDistribucion' => $_POST['Distribucion_idDistribucion'],
            ];

            $pedidoModel->crear($data);
            header('Location: /AGRICOLAD_LP/controllers/PedidoControlador.php?accion=listar');
            exit;
        }

        // si es GET, solo mostramos el formulario vacío
        $pedido = null;
        require __DIR__ . '/../views/pedido/form.php';
    }

    public function editar() {
        $pedidoModel = new Pedido();
        $distribucionModel = new Distribucion();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id <= 0) {
            header('Location: PedidoControlador.php?accion=listar');
            exit;
        }

        // Distribuciones para el combo
        $distribuciones = $distribucionModel->obtenerTodos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'fechaPedido'              => $_POST['fechaPedido'],
                'estado'                   => $_POST['estado'],
                'direccionEntrega'         => $_POST['direccionEntrega'],
                'total'                    => $_POST['total'],
                'Distribucion_idDistribucion' => $_POST['Distribucion_idDistribucion'],
            ];

            $pedidoModel->actualizar($id, $data);
            header('Location: /AGRICOLAD_LP/controllers/PedidoControlador.php?accion=listar');
            exit;
        }

        // GET: cargamos el pedido y mostramos el formulario con datos
        $pedido = $pedidoModel->obtenerPorId($id);
        require __DIR__ . '/../views/pedido/form.php';
    }

    public function eliminar() {
        $pedidoModel = new Pedido();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id > 0) {
            $pedidoModel->eliminar($id);
        }

        header('Location: /AGRICOLAD_LP/controllers/PedidoControlador.php?accion=listar');
        exit;
    }
}

/* ====== PEQUEÑO ENRUTADOR ====== */
$accion = $_GET['accion'] ?? 'listar';
$controlador = new PedidoControlador();

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
