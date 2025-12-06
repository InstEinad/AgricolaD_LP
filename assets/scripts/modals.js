document.addEventListener('DOMContentLoaded', () => {
  // find all buttons whose class contains btn-editar-*
  const editButtons = document.querySelectorAll('button[class*="btn-editar-"]');

  editButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      // detect resource from class
      let resource = null;
      btn.classList.forEach(c => {
        if (c.startsWith('btn-editar-')) resource = c.slice('btn-editar-'.length);
      });
      if (!resource) return;

      const resourceCap = resource.charAt(0).toUpperCase() + resource.slice(1);
      const modalId = 'modal' + resourceCap;
      const formId = 'formEditar' + resourceCap;

      const modal = document.getElementById(modalId);
      const form = document.getElementById(formId);
      if (!modal || !form) return;

      // fill inputs: for each data-* attribute on the button, set element with id 'edit_'+key
      for (const key in btn.dataset) {
        const el = document.getElementById('edit_' + key);
        if (el) el.value = btn.dataset[key];
      }

      modal.style.display = 'flex';
    });
  });

  // close buttons
  document.querySelectorAll('.modal .close').forEach(span => {
    span.addEventListener('click', () => {
      const modal = span.closest('.modal');
      if (modal) modal.style.display = 'none';
    });
  });

  // handle submits dynamically: form id pattern formEditar{Resource}
  document.querySelectorAll('form[id^="formEditar"]').forEach(form => {
    form.addEventListener('submit', e => {
      e.preventDefault();
      const formData = new FormData(form);

      // derive resource from form id
      const resourceCap = form.id.replace('formEditar', '');
      const resource = resourceCap.charAt(0).toLowerCase() + resourceCap.slice(1);

      const idField = Array.from(form.querySelectorAll('input[type="hidden"]')).find(i => i.id.startsWith('edit_'));
      const id = idField ? idField.value : null;

      const baseVar = 'baseUrl' + resourceCap;
      const baseUrl = (window && window[baseVar]) ? window[baseVar] : `/AGRICOLAD_LP/controllers/${resourceCap}Controlador.php`;

      fetch(`${baseUrl}?accion=editar&id=${id}`, {
        method: 'POST',
        body: formData
      }).then(() => location.reload());
    });
  });

  // delete buttons
  const delButtons = document.querySelectorAll('button[class*="btn-eliminar-"]');
  delButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      if (!confirm('¿Seguro que deseas eliminar este registro?')) return;
      // detect resource
      let resource = null;
      btn.classList.forEach(c => {
        if (c.startsWith('btn-eliminar-')) resource = c.slice('btn-eliminar-'.length);
      });
      if (!resource) return;
      const resourceCap = resource.charAt(0).toUpperCase() + resource.slice(1);
      const baseVar = 'baseUrl' + resourceCap;
      const baseUrl = (window && window[baseVar]) ? window[baseVar] : `/AGRICOLAD_LP/controllers/${resourceCap}Controlador.php`;
      const id = btn.dataset.id;
      fetch(`${baseUrl}?accion=eliminar&id=${id}`).then(() => location.reload());
    });
  });
});
