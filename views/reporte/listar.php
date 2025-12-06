<?php
$baseUrlReporte = '/AGRICOLAD_LP/controllers/ReporteControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Reportes</title>
    <link rel="stylesheet" href="/AGRICOLAD_LP/assets/styles/modal.css">
</head>
<body>

<h1>Reportes</h1>

<a href="<?= $baseUrlReporte ?>?accion=crear">Nuevo Reporte</a>
<br><br>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo Reporte</th>
            <th>Fecha Generación</th>
            <th>Rango Fecha</th>
            <th>ID Usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    <?php if (!empty($reportes)): ?>
        <?php foreach ($reportes as $r): ?>
            <tr>
                <td><?= $r['idReporte'] ?></td>
                <td><?= htmlspecialchars($r['tipoReporte']) ?></td>
                <td><?= htmlspecialchars($r['fechaGeneracion']) ?></td>
                <td><?= htmlspecialchars($r['rangoFecha']) ?></td>
                <td><?= htmlspecialchars($r['Usuario_idUsuario']) ?></td>

                <td>
                    <button type="button" class="btn-editar-reporte"
                            data-id="<?= $r['idReporte'] ?>"
                            data-tipo-reporte="<?= htmlspecialchars($r['tipoReporte']) ?>"
                            data-fecha-generacion="<?= htmlspecialchars($r['fechaGeneracion']) ?>"
                            data-rango-fecha="<?= htmlspecialchars($r['rangoFecha']) ?>"
                            data-id-usuario="<?= htmlspecialchars($r['Usuario_idUsuario']) ?>">
                        Editar
                    </button>
                    |
                    <button type="button" class="btn-eliminar-reporte" data-id="<?= $r['idReporte'] ?>" onclick="return confirm('Eliminar reporte?')">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6">No hay reportes registrados.</td></tr>
    <?php endif; ?>
    </tbody>

</table>

<!-- Modal editar Reporte -->
<div id="modalReporte" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Editar Reporte</h2>
        <form id="formEditarReporte">
            <input type="hidden" id="edit_id" name="id">

            <label for="edit_tipoReporte">Tipo Reporte:</label>
            <input type="text" name="tipoReporte" id="edit_tipoReporte" required>

            <label for="edit_fechaGeneracion">Fecha Generación:</label>
            <input type="date" name="fechaGeneracion" id="edit_fechaGeneracion" required>

            <label for="edit_rangoFecha">Rango Fecha:</label>
            <input type="text" name="rangoFecha" id="edit_rangoFecha" required>

            <label for="edit_Usuario_idUsuario">Usuario:</label>
            <select name="Usuario_idUsuario" id="edit_Usuario_idUsuario" required>
                <?php if (!empty($usuarios)): ?>
                    <?php foreach ($usuarios as $u): ?>
                        <option value="<?= $u['idUsuario'] ?>"><?= htmlspecialchars($u['nombre']) ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <button type="submit">Guardar cambios</button>
        </form>
    </div>
</div>

<script>
    window.baseUrlReporte = '<?= $baseUrlReporte ?>';
</script>
<script src="/AGRICOLAD_LP/assets/scripts/reporte.js"></script>

</body>
</html>
