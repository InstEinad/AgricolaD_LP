<?php
// controllers/ReporteControlador.php
require_once __DIR__ . '/../models/Reporte.php';
require_once __DIR__ . '/../models/Usuario.php';

class ReporteControlador {

    public function listar() {
        $reporteModel = new Reporte();
        $reportes = $reporteModel->obtenerTodos();
        require __DIR__ . '/../views/reporte/listar.php';
    }

    public function crear() {
        $reporteModel = new Reporte();
        $usuarioModel = new Usuario();

        // Para el combo de usuario
        $usuarios = $usuarioModel->obtenerTodos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'tipoReporte'        => $_POST['tipoReporte'],
                'fechaGeneracion'    => $_POST['fechaGeneracion'],
                'rangoFecha'         => $_POST['rangoFecha'],
                'Usuario_idUsuario'  => $_POST['Usuario_idUsuario'],
            ];

            $reporteModel->crear($data);

            header('Location: /AGRICOLAD_LP/controllers/ReporteControlador.php?accion=listar');
            exit;
        }

        $reporte = null;
        require __DIR__ . '/../views/reporte/form.php';
    }

    public function editar() {
        $reporteModel = new Reporte();
        $usuarioModel = new Usuario();

        $usuarios = $usuarioModel->obtenerTodos();
        $id = $_GET['id'] ?? 0;

        if ($id <= 0) {
            header('Location: ReporteControlador.php?accion=listar');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'tipoReporte'        => $_POST['tipoReporte'],
                'fechaGeneracion'    => $_POST['fechaGeneracion'],
                'rangoFecha'         => $_POST['rangoFecha'],
                'Usuario_idUsuario'  => $_POST['Usuario_idUsuario'],
            ];

            $reporteModel->actualizar($id, $data);

            header('Location: /AGRICOLAD_LP/controllers/ReporteControlador.php?accion=listar');
            exit;
        }

        $reporte = $reporteModel->obtenerPorId($id);
        require __DIR__ . '/../views/reporte/form.php';
    }

    public function eliminar() {
        $reporteModel = new Reporte();
        $id = $_GET['id'] ?? 0;

        if ($id > 0) {
            $reporteModel->eliminar($id);
        }

        header('Location: /AGRICOLAD_LP/controllers/ReporteControlador.php?accion=listar');
        exit;
    }
}

/* ROUTER */
$accion = $_GET['accion'] ?? 'listar';
$controlador = new ReporteControlador();

switch ($accion) {
    case 'listar':  $controlador->listar();  break;
    case 'crear':   $controlador->crear();   break;
    case 'editar':  $controlador->editar();  break;
    case 'eliminar':$controlador->eliminar();break;
    default:        $controlador->listar();  break;
}
