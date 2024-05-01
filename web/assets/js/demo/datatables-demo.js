// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataTable").DataTable({
    responsive: true,
    rowReorder: {
      selector: "td:nth-child(2)",
    },
  });
});
