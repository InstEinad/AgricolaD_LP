<?php
// controllers/DistribucionControlador.php
require_once __DIR__ . '/../models/Distribucion.php';

class DistribucionControlador {

    public function listar() {
        $distribucionModel = new Distribucion();
        $distribuciones = $distribucionModel->obtenerTodos();
        require __DIR__ . '/../views/distribucion/listar.php';
    }

    public function crear() {
        $distribucionModel = new Distribucion();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'fechaSalida'   => $_POST['fechaSalida'],
                'fechaEntrega'  => $_POST['fechaEntrega'],
                'rutaAsignada'  => $_POST['rutaAsignada'],
                'transportista' => $_POST['transportista'],
            ];

            $distribucionModel->crear($data);
            header('Location: DistribucionControlador.php?accion=listar');
            exit;
        }

        // si es GET, solo mostramos el formulario vacío
        $distribucion = null;
        require __DIR__ . '/../views/distribucion/form.php';
    }

    public function editar() {
        $distribucionModel = new Distribucion();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id <= 0) {
            header('Location: DistribucionControlador.php?accion=listar');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'fechaSalida'   => $_POST['fechaSalida'],
                'fechaEntrega'  => $_POST['fechaEntrega'],
                'rutaAsignada'  => $_POST['rutaAsignada'],
                'transportista' => $_POST['transportista'],
            ];

            $distribucionModel->actualizar($id, $data);
            header('Location: DistribucionControlador.php?accion=listar');
            exit;
        }

        // GET: cargamos la distribución y mostramos el formulario con datos
        $distribucion = $distribucionModel->obtenerPorId($id);
        require __DIR__ . '/../views/distribucion/form.php';
    }

    public function eliminar() {
        $distribucionModel = new Distribucion();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id > 0) {
            $distribucionModel->eliminar($id);
        }

        header('Location: DistribucionControlador.php?accion=listar');
        exit;
    }
}

/* ====== PEQUEÑO ENRUTADOR ====== */
$accion = $_GET['accion'] ?? 'listar';
$controlador = new DistribucionControlador();

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
