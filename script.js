function lekérdez() {
  // Felhasználótól kapott értékek
  var datum = $('#datum').val();
  var mennyiseg = $('#mennyiseg').val();

  // Ajax kérés
  $.ajax({
    type: 'POST',
    url: 'lekerdezes.php',
    data: {
      datum: datum,
      mennyiseg: mennyiseg,
    },
    dataType: 'json',
    success: function (data) {
      // Eredmények megjelenítése
      var eredmenyHtml =
        '<h3>Naptár adatok:</h3><pre>' + JSON.stringify(data.naptar, null, 2) + '</pre>';
      eredmenyHtml +=
        '<h3>Lakig adatok:</h3><pre>' + JSON.stringify(data.lakig, null, 2) + '</pre>';

      if (data.szolgaltatas.length > 0) {
        eredmenyHtml +=
          '<h3>Szolgáltatás adatok:</h3><pre>' +
          JSON.stringify(data.szolgaltatas, null, 2) +
          '</pre>';
      } else {
        eredmenyHtml += '<p>Nincs szolgáltatás adat a megadott paraméterekkel.</p>';
      }

      $('#eredmeny').html(eredmenyHtml);
    },
    error: function (xhr, status, error) {
      console.error('Hiba a lekérdezés során: ' + error);
    },
  });
}
