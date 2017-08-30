$("#save").css('cursor', 'pointer');

$("#save").click(function(e) {

  e.preventDefault();

  $.ajax({
    type: "POST",
    url: 'controller/updateData.php',
    dataType: "json",
    data:  $("#updateData").serialize()
    ,
    success : function(data, statut){
      goto('split','id_tbljob',data['id_tbljob']);
    },
    error : function(resultat, statut, erreur) {
      console.log(Object.keys(resultat));
      alert('ERREUR lors de la modification des données du split. Veuillez prevenir au plus vite le responsable SI. \n Sauf si vous venez de valider une non modification.');
    }
  });
});

$("#subCRef").click(function(e) {
  $('#refSubC').toggleClass('flip');
  $('#refSubC_alt').toggleClass('flip');

  $('#refSubC_alt').html($('#refSubC').val());
});
$("#DyT_expectedFlip").click(function(e) {
  $('#DyT_expected').toggleClass('flip');
  $('#DyT_expected_alt').toggleClass('flip');

  $('#DyT_expected_alt').html($('#DyT_expected').val());
});



$( function() {

  $( "#DyT_expected" ).datepicker({
    showWeek: true,
    firstDay: 1,
    showOtherMonths: true,
    selectOtherMonths: true,
    dateFormat: "yy-mm-dd"
  });

} );