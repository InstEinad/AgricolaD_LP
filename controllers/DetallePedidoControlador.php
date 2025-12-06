<?php
// controllers/DetallePedidoControlador.php
require_once __DIR__ . '/../models/DetallePedido.php';
require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../models/Pedido.php';

class DetallePedidoControlador {

    public function listar() {
        $detalleModel = new DetallePedido();
        $detalles = $detalleModel->obtenerTodos();
        require __DIR__ . '/../views/detallepedido/listar.php';
    }

    public function crear() {
        $detalleModel = new DetallePedido();
        $productoModel = new Producto();
        $pedidoModel = new Pedido();

        // Para los combos
        $productos = $productoModel->obtenerTodos();
        $pedidos = $pedidoModel->obtenerTodos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $cantidad       = (int) $_POST['cantidad'];
            $precioUnitario = (float) $_POST['precioUnitario'];
            $subtotal       = $cantidad * $precioUnitario; // se calcula automáticamente

            $data = [
                'cantidad'             => $cantidad,
                'precioUnitario'       => $precioUnitario,
                'subtotal'             => $subtotal,
                'Producto_idProducto'  => $_POST['Producto_idProducto'],
                'Pedido_idPedido'      => $_POST['Pedido_idPedido'],
            ];

            $detalleModel->crear($data);
            header('Location: /AGRICOLAD_LP/controllers/DetallePedidoControlador.php?accion=listar');
            exit;
        }

        // si es GET, solo mostramos el formulario vacío
        $detalle = null;
        require __DIR__ . '/../views/detallepedido/form.php';
    }

    public function editar() {
        $detalleModel = new DetallePedido();
        $productoModel = new Producto();
        $pedidoModel = new Pedido();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id <= 0) {
            header('Location: DetallePedidoControlador.php?accion=listar');
            exit;
        }

        // Para los combos
        $productos = $productoModel->obtenerTodos();
        $pedidos   = $pedidoModel->obtenerTodos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cantidad       = (int) $_POST['cantidad'];
            $precioUnitario = (float) $_POST['precioUnitario'];
            $subtotal       = $cantidad * $precioUnitario;

            $data = [
                'cantidad'             => $cantidad,
                'precioUnitario'       => $precioUnitario,
                'subtotal'             => $subtotal,
                'Producto_idProducto'  => $_POST['Producto_idProducto'],
                'Pedido_idPedido'      => $_POST['Pedido_idPedido'],
            ];

            $detalleModel->actualizar($id, $data);
            header('Location: /AGRICOLAD_LP/controllers/DetallePedidoControlador.php?accion=listar');
            exit;
        }

        // GET: cargamos el detalle y mostramos el formulario con datos
        $detalle = $detalleModel->obtenerPorId($id);
        require __DIR__ . '/../views/detallepedido/form.php';
    }

    public function eliminar() {
        $detalleModel = new DetallePedido();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id > 0) {
            $detalleModel->eliminar($id);
        }

        header('Location: /AGRICOLAD_LP/controllers/DetallePedidoControlador.php?accion=listar');
        exit;
    }
}

/* ====== PEQUEÑO ENRUTADOR ====== */
$accion = $_GET['accion'] ?? 'listar';
$controlador = new DetallePedidoControlador();

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
