document.addEventListener('DOMContentLoaded', () => {
  const editButtons = document.querySelectorAll('.btn-editar-pedido');
  const modal = document.getElementById('modalPedido');
  const closeBtn = modal ? modal.querySelector('.close') : null;
  const form = document.getElementById('formEditarPedido');

  function openModal() { if (modal) modal.style.display = 'flex'; }
  function closeModal() { if (modal) modal.style.display = 'none'; }

  if (closeBtn) closeBtn.addEventListener('click', closeModal);
  window.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

  editButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const d = btn.dataset;
      document.getElementById('edit_idPedido').value = d.id || '';
      if (d.fechaPedido) document.getElementById('edit_fechaPedido').value = d.fechaPedido;
      if (d.estado) document.getElementById('edit_estado').value = d.estado;
      if (d.direccionEntrega) document.getElementById('edit_direccionEntrega').value = d.direccionEntrega;
      if (d.total) document.getElementById('edit_total').value = d.total;
      if (d.idDistribucion) document.getElementById('edit_Distribucion_idDistribucion').value = d.idDistribucion;
      openModal();
    });
  });

  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      const id = document.getElementById('edit_idPedido').value;
      const baseUrl = (window && window.baseUrlPedido) ? window.baseUrlPedido : '/AGRICOLAD_LP/controllers/PedidoControlador.php';
      fetch(`${baseUrl}?accion=editar&id=${id}`, { method: 'POST', body: formData }).then(() => location.reload());
    });
  }

  const delButtons = document.querySelectorAll('.btn-eliminar-pedido');
  delButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      if (!confirm('¿Seguro que deseas eliminar este registro?')) return;
      const id = btn.dataset.id;
      const baseUrl = (window && window.baseUrlPedido) ? window.baseUrlPedido : '/AGRICOLAD_LP/controllers/PedidoControlador.php';
      fetch(`${baseUrl}?accion=eliminar&id=${id}`).then(() => location.reload());
    });
  });
});
