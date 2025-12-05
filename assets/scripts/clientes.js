const baseUrlCliente = '/AGRICOLAD_LP/controllers/ClienteControlador.php';

// Abrir modal y llenar datos
document.querySelectorAll('.btn-editar-cliente').forEach(btn => {
  btn.addEventListener('click', () => {
    const modal = document.getElementById('modalCliente');
    if (!modal) return;

    document.getElementById('edit_idCliente').value = btn.dataset.id;
    document.getElementById('edit_nombre').value    = btn.dataset.nombre;
    document.getElementById('edit_direccion').value = btn.dataset.direccion;
    document.getElementById('edit_telefono').value  = btn.dataset.telefono;
    document.getElementById('edit_correo').value    = btn.dataset.correo;

    modal.style.display = 'flex';
  });
});

// Cerrar modal
const btnCerrar = document.getElementById('cerrarModalCliente');
if (btnCerrar) {
  btnCerrar.onclick = () => {
    const modal = document.getElementById('modalCliente');
    if (modal) modal.style.display = 'none';
  };
}

// Enviar edición
const formEditar = document.getElementById('formEditarCliente');
if (formEditar) {
  formEditar.addEventListener('submit', e => {
    e.preventDefault();
    const formData = new FormData(formEditar);
    const id = formData.get('idCliente');

    fetch(`${baseUrlCliente}?accion=editar&id=${id}`, {
      method: 'POST',
      body: formData
    }).then(() => location.reload());
  });
}

// Eliminar desde el botón de la tabla
document.querySelectorAll('.btn-eliminar-cliente').forEach(btn => {
  btn.addEventListener('click', () => {
    if (!confirm('¿Seguro que deseas eliminar este cliente?')) return;
    const id = btn.dataset.id;

    fetch(`${baseUrlCliente}?accion=eliminar&id=${id}`)
      .then(() => location.reload());
  });
});
