function generateReport() {
  var startDate = $('#start_date').val();
  var endDate = $('#end_date').val();
  var wasteType = $('#waste_type').val();

  $.ajax({
    type: 'POST',
    url: 'Sources/lekerdezes-process.php',
    data: { start_date: startDate, end_date: endDate, waste_type: wasteType },
    success: function (response) {
      // Az eredményt a resultContainer div-be helyezzük
      $('#resultContainer').html(response);
    },
    error: function (xhr, status, error) {
      console.error('AJAX Error: ' + status, error);
    },
  });
}
