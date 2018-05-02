$(document).ready(function() {

  // Confirmación de eliminacón desde Modal
  $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
});

// Pasar parámetro de nombre de software a eliminar a Modal
$(document).on("click", ".confirmar_eliminacion", function () {
  var nombre = $(this).data('nombre');
    $(".modal-body .results").html( nombre );
});
