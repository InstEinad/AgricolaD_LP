<?php
<<<<<<< Updated upstream
// Ruta ABSOLUTA al controlador de Distribución
=======
>>>>>>> Stashed changes
$baseUrlDistribucion = '/AGRICOLAD_LP/controllers/DistribucionControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Distribuciones</title>
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/estilos.css">
</head>
<body>
    <h1>Listado de Distribuciones</h1>

    <a href="<?= $baseUrlDistribucion ?>?accion=crear">Nueva Distribución</a>
    <br><br>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Salida</th>
                <th>Fecha Entrega</th>
                <th>Ruta Asignada</th>
                <th>Transportista</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($distribuciones)): ?>
            <?php foreach ($distribuciones as $d): ?>
                <tr>
                    <td><?= htmlspecialchars($d['idDistribucion']) ?></td>
                    <td><?= htmlspecialchars($d['fechaSalida']) ?></td>
                    <td><?= htmlspecialchars($d['fechaEntrega']) ?></td>
                    <td><?= htmlspecialchars($d['rutaAsignada']) ?></td>
                    <td><?= htmlspecialchars($d['transportista']) ?></td>
                    <td>
                            <button type="button" class="btn-editar-distribucion"
                                    data-id="<?= $d['idDistribucion'] ?>"
                                    data-fecha-salida="<?= htmlspecialchars($d['fechaSalida']) ?>"
                                    data-fecha-entrega="<?= htmlspecialchars($d['fechaEntrega']) ?>"
                                    data-ruta-asignada="<?= htmlspecialchars($d['rutaAsignada']) ?>"
                                    data-transportista="<?= htmlspecialchars($d['transportista']) ?>">
                                Editar
                            </button>
                            |
                            <button type="button" class="btn-eliminar-distribucion" data-id="<?= $d['idDistribucion'] ?>">Eliminar</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">No hay registros de distribución.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

        <!-- Modal editar distribución -->
        <div id="modalDistribucion" class="modal">
            <div class="modal-content">
                <span id="cerrarModalDistribucion" class="close">&times;</span>
                <h2>Editar Distribución</h2>
                <form id="formEditarDistribucion">
                    <input type="hidden" name="idDistribucion" id="edit_idDistribucion">

                    <label for="edit_fechaSalida">Fecha Salida:</label>
                    <input type="date" name="fechaSalida" id="edit_fechaSalida" required>

                    <label for="edit_fechaEntrega">Fecha Entrega:</label>
                    <input type="date" name="fechaEntrega" id="edit_fechaEntrega" required>

                    <label for="edit_rutaAsignada">Ruta Asignada:</label>
                    <input type="text" name="rutaAsignada" id="edit_rutaAsignada" required>

                    <label for="edit_transportista">Transportista:</label>
                    <input type="text" name="transportista" id="edit_transportista" required>

                    <button type="submit">Guardar cambios</button>
                </form>
            </div>
        </div>

        <script>
            window.baseUrlDistribucion = '<?= $baseUrlDistribucion ?>';
        </script>
        <script src="/AGRICOLAD_LP/assets/scripts/distribucion.js"></script>

        </body>
        </html>
