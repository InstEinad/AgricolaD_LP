<?php
// controllers/UsuarioControlador.php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Cliente.php';

class UsuarioControlador {

    public function listar() {
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->obtenerTodos();
        require __DIR__ . '/../views/usuario/listar.php';
    }

    public function crear() {
        $usuarioModel  = new Usuario();
        $clienteModel  = new Cliente();
        $clientes      = $clienteModel->obtenerTodos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $claveHash = password_hash($_POST['clave'], PASSWORD_DEFAULT);

            $data = [
                'nombre'            => $_POST['nombre'],
                'correo'            => $_POST['correo'],
                'clave'             => $claveHash,
                'rol'               => $_POST['rol'],
                'Cliente_idCliente' => $_POST['Cliente_idCliente'],
            ];

            $usuarioModel->crear($data);

            header('Location: UsuarioControlador.php?accion=listar');
            exit;
        }

        $usuario = null;
        require __DIR__ . '/../views/usuario/form.php';
    }

    public function editar() {
        $usuarioModel = new Usuario();
        $clienteModel = new Cliente();

        $clientes = $clienteModel->obtenerTodos();
        $id = $_GET['id'] ?? 0;

        if ($id <= 0) {
            header('Location: UsuarioControlador.php?accion=listar');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'nombre'            => $_POST['nombre'],
                'correo'            => $_POST['correo'],
                'rol'               => $_POST['rol'],
                'Cliente_idCliente' => $_POST['Cliente_idCliente'],
            ];

            $usuarioModel->actualizar($id, $data);

            // Si cambia clave
            if (!empty($_POST['clave'])) {
                $claveHash = password_hash($_POST['clave'], PASSWORD_DEFAULT);
                $usuarioModel->actualizarClave($id, $claveHash);
            }

            header('Location: UsuarioControlador.php?accion=listar');
            exit;
        }

        $usuario = $usuarioModel->obtenerPorId($id);
        require __DIR__ . '/../views/usuario/form.php';
    }

    public function eliminar() {
        $usuarioModel = new Usuario();
        $id = $_GET['id'] ?? 0;

        if ($id > 0) {
            $usuarioModel->eliminar($id);
        }

        header('Location: UsuarioControlador.php?accion=listar');
        exit;
    }
}

/* ROUTER */
$accion = $_GET['accion'] ?? 'listar';
$controlador = new UsuarioControlador();

switch ($accion) {
    case 'listar':  $controlador->listar();  break;
    case 'crear':   $controlador->crear();   break;
    case 'editar':  $controlador->editar();  break;
    case 'eliminar':$controlador->eliminar();break;
    default:        $controlador->listar();  break;
}
