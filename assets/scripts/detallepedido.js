document.addEventListener('DOMContentLoaded', () => {
  const editButtons = document.querySelectorAll('.btn-editar-detallepedido');
  const modal = document.getElementById('modalDetallePedido');
  const closeBtn = modal ? modal.querySelector('.close') : null;
  const form = document.getElementById('formEditarDetallePedido');

  function openModal() {
    if (modal) modal.style.display = 'flex';
  }
  function closeModal() {
    if (modal) modal.style.display = 'none';
  }

  if (closeBtn) closeBtn.addEventListener('click', closeModal);
  window.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

  editButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      // populate form fields from data-* attributes
      const dataset = btn.dataset;
      const id = dataset.id || dataset.idDetallepedido || dataset.idDetallePedido;
      if (id) document.getElementById('edit_id').value = id;

      if (dataset.cantidad !== undefined) document.getElementById('edit_cantidad').value = dataset.cantidad;
      if (dataset.precioUnitario !== undefined) document.getElementById('edit_precioUnitario').value = dataset.precioUnitario;
      if (dataset.subtotal !== undefined) document.getElementById('edit_subtotal').value = dataset.subtotal;
      if (dataset.idProducto !== undefined) document.getElementById('edit_Producto_idProducto').value = dataset.idProducto;
      if (dataset.idPedido !== undefined) document.getElementById('edit_Pedido_idPedido').value = dataset.idPedido;

      openModal();
    });
  });

  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      const id = document.getElementById('edit_id').value;
      const baseUrl = (window && window.baseUrlDetallePedido) ? window.baseUrlDetallePedido : '/AGRICOLAD_LP/controllers/DetallePedidoControlador.php';
      fetch(`${baseUrl}?accion=editar&id=${id}`, {
        method: 'POST',
        body: formData
      }).then(() => location.reload());
    });
  }

  // delete buttons handling
  const delButtons = document.querySelectorAll('.btn-eliminar-detallepedido');
  delButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      if (!confirm('¿Seguro que deseas eliminar este registro?')) return;
      const id = btn.dataset.id;
      const baseUrl = (window && window.baseUrlDetallePedido) ? window.baseUrlDetallePedido : '/AGRICOLAD_LP/controllers/DetallePedidoControlador.php';
      fetch(`${baseUrl}?accion=eliminar&id=${id}`).then(() => location.reload());
    });
  });
});
