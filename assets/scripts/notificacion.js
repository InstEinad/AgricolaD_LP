document.addEventListener('DOMContentLoaded', () => {
  const editButtons = document.querySelectorAll('.btn-editar-notificacion');
  const modal = document.getElementById('modalNotificacion');
  const closeBtn = modal ? modal.querySelector('.close') : null;
  const form = document.getElementById('formEditarNotificacion');

  function openModal() { if (modal) modal.style.display = 'flex'; }
  function closeModal() { if (modal) modal.style.display = 'none'; }

  if (closeBtn) closeBtn.addEventListener('click', closeModal);
  window.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

  editButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const d = btn.dataset;
      document.getElementById('edit_id').value = d.id || '';
      if (d.tipo) document.getElementById('edit_tipo').value = d.tipo;
      if (d.fechaEnvio) document.getElementById('edit_fechaEnvio').value = d.fechaEnvio;
      if (d.mensaje) document.getElementById('edit_mensaje').value = d.mensaje;
      if (d.idUsuario) document.getElementById('edit_Usuario_idUsuario').value = d.idUsuario;
      if (d.idPedido) document.getElementById('edit_Pedido_idPedido').value = d.idPedido;
      openModal();
    });
  });

  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      const id = document.getElementById('edit_id').value;
      const baseUrl = (window && window.baseUrlNotificacion) ? window.baseUrlNotificacion : '/AGRICOLAD_LP/controllers/NotificacionControlador.php';
      fetch(`${baseUrl}?accion=editar&id=${id}`, { method: 'POST', body: formData }).then(() => location.reload());
    });
  }

  const delButtons = document.querySelectorAll('.btn-eliminar-notificacion');
  delButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      if (!confirm('¿Seguro que deseas eliminar este registro?')) return;
      const id = btn.dataset.id;
      const baseUrl = (window && window.baseUrlNotificacion) ? window.baseUrlNotificacion : '/AGRICOLAD_LP/controllers/NotificacionControlador.php';
      fetch(`${baseUrl}?accion=eliminar&id=${id}`).then(() => location.reload());
    });
  });
});
