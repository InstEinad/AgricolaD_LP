document.addEventListener('DOMContentLoaded', () => {
  const editButtons = document.querySelectorAll('.btn-editar-reporte');
  const modal = document.getElementById('modalReporte');
  const closeBtn = modal ? modal.querySelector('.close') : null;
  const form = document.getElementById('formEditarReporte');

  function openModal() { if (modal) modal.style.display = 'flex'; }
  function closeModal() { if (modal) modal.style.display = 'none'; }

  if (closeBtn) closeBtn.addEventListener('click', closeModal);
  window.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

  editButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const d = btn.dataset;
      document.getElementById('edit_id').value = d.id || '';
      if (d.tipoReporte) document.getElementById('edit_tipoReporte').value = d.tipoReporte;
      if (d.fechaGeneracion) document.getElementById('edit_fechaGeneracion').value = d.fechaGeneracion;
      if (d.rangoFecha) document.getElementById('edit_rangoFecha').value = d.rangoFecha;
      if (d.idUsuario) document.getElementById('edit_Usuario_idUsuario').value = d.idUsuario;
      openModal();
    });
  });

  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      const id = document.getElementById('edit_id').value;
      const baseUrl = (window && window.baseUrlReporte) ? window.baseUrlReporte : '/AGRICOLAD_LP/controllers/ReporteControlador.php';
      fetch(`${baseUrl}?accion=editar&id=${id}`, { method: 'POST', body: formData }).then(() => location.reload());
    });
  }

  const delButtons = document.querySelectorAll('.btn-eliminar-reporte');
  delButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      if (!confirm('¿Seguro que deseas eliminar este registro?')) return;
      const id = btn.dataset.id;
      const baseUrl = (window && window.baseUrlReporte) ? window.baseUrlReporte : '/AGRICOLAD_LP/controllers/ReporteControlador.php';
      fetch(`${baseUrl}?accion=eliminar&id=${id}`).then(() => location.reload());
    });
  });
});
