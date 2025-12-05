document.addEventListener('DOMContentLoaded', () => {
  console.log('usuarios.js cargado');

  const baseUrlUsuario = '/AGRICOLAD_LP/controllers/UsuarioControlador.php';

  // Abrir modal con datos
  document.querySelectorAll('.btn-editar-usuario').forEach(btn => {
    btn.addEventListener('click', () => {
      const modal = document.getElementById('modalUsuario');
      if (!modal) return;

      document.getElementById('edit_idUsuario').value       = btn.dataset.id;
      document.getElementById('edit_nombre_usuario').value  = btn.dataset.nombre;
      document.getElementById('edit_correo_usuario').value  = btn.dataset.correo;
      document.getElementById('edit_rol_usuario').value     = btn.dataset.rol;
      document.getElementById('edit_cliente_usuario').value = btn.dataset.cliente;

      modal.style.display = 'flex';
    });
  });

  // Cerrar modal
  const btnCerrarU = document.getElementById('cerrarModalUsuario');
  if (btnCerrarU) {
    btnCerrarU.onclick = () => {
      const modal = document.getElementById('modalUsuario');
      if (modal) modal.style.display = 'none';
    };
  }

  const formEditarU = document.getElementById('formEditarUsuario');
  console.log('formEditarU encontrado:', !!formEditarU);

  const btnGuardar = document.getElementById('btnGuardarUsuarioModal');
  console.log('btnGuardar encontrado:', !!btnGuardar);

  if (formEditarU && btnGuardar) {
    btnGuardar.addEventListener('click', () => {
      console.log('CLICK en Guardar cambios');

      const data = new FormData(formEditarU);
      const id = data.get('idUsuario');

      console.log('idUsuario =', id);
      for (const [k, v] of data.entries()) {
        console.log(k, v);
      }

      fetch(`${baseUrlUsuario}?accion=editar&id=${id}`, {
        method: 'POST',
        body: data
      }).then(() => location.reload());
    });
  }

  // Eliminar
  document.querySelectorAll('.btn-eliminar-usuario').forEach(btn => {
    btn.addEventListener('click', () => {
      if (!confirm('¿Seguro que deseas eliminar este usuario?')) return;
      const id = btn.dataset.id;

      fetch(`${baseUrlUsuario}?accion=eliminar&id=${id}`)
        .then(() => location.reload());
    });
  });
});
