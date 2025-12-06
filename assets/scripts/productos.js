const baseUrlProducto = typeof baseUrlProducto !== 'undefined' ? baseUrlProducto : '/AGRICOLAD_LP/controllers/ProductoControlador.php';

// Abrir modal y llenar datos
document.querySelectorAll('.btn-editar-producto').forEach(btn => {
  btn.addEventListener('click', () => {
    const modal = document.getElementById('modalProducto');
    if (!modal) return;

    // dataset keys: idProducto, nombre, tipo, unidadMedida (from data-unidad-medida -> unidadMedida), precioUnitario, cantidadDisponible, fechaRegistro, estado
    document.getElementById('edit_idProducto').value = btn.dataset.idProducto || btn.dataset.id;
    document.getElementById('edit_nombre').value = btn.dataset.nombre || '';
    document.getElementById('edit_tipo').value = btn.dataset.tipo || '';
    document.getElementById('edit_unidadMedida').value = btn.dataset.unidadMedida || btn.dataset.unidadMedida || '';
    document.getElementById('edit_precioUnitario').value = btn.dataset.precioUnitario || '';
    document.getElementById('edit_cantidadDisponible').value = btn.dataset.cantidadDisponible || '';
    document.getElementById('edit_fechaRegistro').value = btn.dataset.fechaRegistro || '';
    document.getElementById('edit_estado').value = btn.dataset.estado || '';

    modal.style.display = 'flex';
  });
});

// Cerrar modal
const btnCerrarP = document.getElementById('cerrarModalProducto');
if (btnCerrarP) {
  btnCerrarP.onclick = () => {
    const modal = document.getElementById('modalProducto');
    if (modal) modal.style.display = 'none';
  };
}

// Enviar edición
const formEditarP = document.getElementById('formEditarProducto');
if (formEditarP) {
  formEditarP.addEventListener('submit', e => {
    e.preventDefault();
    const formData = new FormData(formEditarP);
    const id = formData.get('idProducto');

    fetch(`${baseUrlProducto}?accion=editar&id=${id}`, {
      method: 'POST',
      body: formData
    }).then(() => location.reload());
  });
}

// Eliminar desde el botón de la tabla
document.querySelectorAll('.btn-eliminar-producto').forEach(btn => {
  btn.addEventListener('click', () => {
    if (!confirm('¿Seguro que deseas eliminar este producto?')) return;
    const id = btn.dataset.id;

    fetch(`${baseUrlProducto}?accion=eliminar&id=${id}`)
      .then(() => location.reload());
  });
});
