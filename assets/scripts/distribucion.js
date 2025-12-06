document.addEventListener('DOMContentLoaded', () => {
  const editButtons = document.querySelectorAll('.btn-editar-distribucion');
  const modal = document.getElementById('modalDistribucion');
  const closeBtn = modal ? modal.querySelector('.close') : null;
  const form = document.getElementById('formEditarDistribucion');

  function openModal() { if (modal) modal.style.display = 'flex'; }
  function closeModal() { if (modal) modal.style.display = 'none'; }

  if (closeBtn) closeBtn.addEventListener('click', closeModal);
  window.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

  editButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const d = btn.dataset;
      document.getElementById('edit_idDistribucion').value = d.id || '';
      if (d.fechaSalida) document.getElementById('edit_fechaSalida').value = d.fechaSalida;
      if (d.fechaEntrega) document.getElementById('edit_fechaEntrega').value = d.fechaEntrega;
      if (d.rutaAsignada) document.getElementById('edit_rutaAsignada').value = d.rutaAsignada;
      if (d.transportista) document.getElementById('edit_transportista').value = d.transportista;
      openModal();
    });
  });

  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      const id = document.getElementById('edit_idDistribucion').value;
      const baseUrl = (window && window.baseUrlDistribucion) ? window.baseUrlDistribucion : '/AGRICOLAD_LP/controllers/DistribucionControlador.php';
      fetch(`${baseUrl}?accion=editar&id=${id}`, { method: 'POST', body: formData }).then(() => location.reload());
    });
  }

  const delButtons = document.querySelectorAll('.btn-eliminar-distribucion');
  delButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      if (!confirm('¿Seguro que deseas eliminar este registro?')) return;
      const id = btn.dataset.id;
      const baseUrl = (window && window.baseUrlDistribucion) ? window.baseUrlDistribucion : '/AGRICOLAD_LP/controllers/DistribucionControlador.php';
      fetch(`${baseUrl}?accion=eliminar&id=${id}`).then(() => location.reload());
    });
  });
});
