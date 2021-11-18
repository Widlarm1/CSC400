// Call the dataTables jQuery plugin
$(function (){
  $('#dataTable').DataTable({
    scrollY: 400,
    processing: true,
    paging:true,
    searching: true,
    responsive: true,
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]

  });
});
