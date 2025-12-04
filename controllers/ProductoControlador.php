<?php
// controllers/ProductoControlador.php
require_once __DIR__ . '/../models/Producto.php';

class ProductoControlador {

    public function listar() {
        $productoModel = new Producto();
        $productos = $productoModel->obtenerTodos();
        require __DIR__ . '/../views/producto/listar.php';
    }

    public function crear() {
        $productoModel = new Producto();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre'             => $_POST['nombre'],
                'tipo'               => $_POST['tipo'],
                'unidadMedida'       => $_POST['unidadMedida'],
                'precioUnitario'     => $_POST['precioUnitario'],
                'cantidadDisponible' => $_POST['cantidadDisponible'],
                'fechaRegistro'      => $_POST['fechaRegistro'],
                'estado'             => $_POST['estado'],
            ];

            $productoModel->crear($data);
            header('Location: ProductoControlador.php?accion=listar');
            exit;
        }

        // si es GET, solo mostramos el formulario vacío
        $producto = null;
        require __DIR__ . '/../views/producto/form.php';
    }

    public function editar() {
        $productoModel = new Producto();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id <= 0) {
            header('Location: ProductoControlador.php?accion=listar');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre'             => $_POST['nombre'],
                'tipo'               => $_POST['tipo'],
                'unidadMedida'       => $_POST['unidadMedida'],
                'precioUnitario'     => $_POST['precioUnitario'],
                'cantidadDisponible' => $_POST['cantidadDisponible'],
                'fechaRegistro'      => $_POST['fechaRegistro'],
                'estado'             => $_POST['estado'],
            ];

            $productoModel->actualizar($id, $data);
            header('Location: ProductoControlador.php?accion=listar');
            exit;
        }

        // GET: cargamos el producto y mostramos el formulario con datos
        $producto = $productoModel->obtenerPorId($id);
        require __DIR__ . '/../views/producto/form.php';
    }

    public function eliminar() {
        $productoModel = new Producto();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id > 0) {
            $productoModel->eliminar($id);
        }

        header('Location: ProductoControlador.php?accion=listar');
        exit;
    }
}

/* ====== PEQUEÑO ENRUTADOR ====== */
$accion = $_GET['accion'] ?? 'listar';
$controlador = new ProductoControlador();

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
