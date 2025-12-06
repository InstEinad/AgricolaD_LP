<?php
// controllers/NotificacionControlador.php
require_once __DIR__ . '/../models/Notificacion.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Pedido.php';

class NotificacionControlador {

    public function listar() {
        $notifModel = new Notificacion();
        $notificaciones = $notifModel->obtenerTodos();
        // cargar usuarios y pedidos para modales/selects
        $usuarioModel = new Usuario();
        $pedidoModel  = new Pedido();
        $usuarios = $usuarioModel->obtenerTodos();
        $pedidos  = $pedidoModel->obtenerTodos();
        require __DIR__ . '/../views/notificacion/listar.php';
    }

    public function crear() {
        $notifModel = new Notificacion();
        $usuarioModel = new Usuario();
        $pedidoModel  = new Pedido();

        // Para los combos
        $usuarios = $usuarioModel->obtenerTodos();
        $pedidos  = $pedidoModel->obtenerTodos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'tipo'              => $_POST['tipo'],
                'fechaEnvio'        => $_POST['fechaEnvio'],
                'mensaje'           => $_POST['mensaje'],
                'Usuario_idUsuario' => $_POST['Usuario_idUsuario'],
                'Pedido_idPedido'   => $_POST['Pedido_idPedido'],
            ];

            $notifModel->crear($data);
            header('Location: /AGRICOLAD_LP/controllers/NotificacionControlador.php?accion=listar');
            exit;
        }

        // si es GET, solo mostramos el formulario vacío
        $notificacion = null;
        require __DIR__ . '/../views/notificacion/form.php';
    }

    public function editar() {
        $notifModel   = new Notificacion();
        $usuarioModel = new Usuario();
        $pedidoModel  = new Pedido();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id <= 0) {
            header('Location: NotificacionControlador.php?accion=listar');
            exit;
        }

        // Para los combos
        $usuarios = $usuarioModel->obtenerTodos();
        $pedidos  = $pedidoModel->obtenerTodos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'tipo'              => $_POST['tipo'],
                'fechaEnvio'        => $_POST['fechaEnvio'],
                'mensaje'           => $_POST['mensaje'],
                'Usuario_idUsuario' => $_POST['Usuario_idUsuario'],
                'Pedido_idPedido'   => $_POST['Pedido_idPedido'],
            ];

            $notifModel->actualizar($id, $data);
            header('Location: /AGRICOLAD_LP/controllers/NotificacionControlador.php?accion=listar');
            exit;
        }

        // GET: cargamos la notificación y mostramos el formulario con datos
        $notificacion = $notifModel->obtenerPorId($id);
        require __DIR__ . '/../views/notificacion/form.php';
    }

    public function eliminar() {
        $notifModel = new Notificacion();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id > 0) {
            $notifModel->eliminar($id);
        }

        header('Location: /AGRICOLAD_LP/controllers/NotificacionControlador.php?accion=listar');
        exit;
    }
}

/* ====== PEQUEÑO ENRUTADOR ====== */
$accion = $_GET['accion'] ?? 'listar';
$controlador = new NotificacionControlador();

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
