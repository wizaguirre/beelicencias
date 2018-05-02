$(document).ready(function() {
  $('#datatable').dataTable({
    "oLanguage": {
      "oPaginate": {
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "sInfoFiltered": "(filtrando de un total de _MAX_ registros )",
      "sStripClasses": "",
      "sSearch": "",
      "sSearchPlaceholder": "Buscar",
      "sInfo": "_START_ -_END_ de _TOTAL_",
      "zeroRecords": "No se encontraron los resultados.",
      "infoEmpty": "No hay datos disponibles",
      "emptyTable": "No hay datos disponibles en la tabla",
      "sLengthMenu": '<span>Mostrar: </span><select class="browser-default">' +
        '<option value="10">10</option>' +
        '<option value="20">20</option>' +
        '<option value="30">30</option>' +
        '<option value="40">40</option>' +
        '<option value="50">50</option>' +
        '<option value="-1">Todos</option>' +
        '</select></div>'
    },
    bAutoWidth: false,
    responsive: true
  });
});