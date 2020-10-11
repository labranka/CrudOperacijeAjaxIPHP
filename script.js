//Uzimanje vrednosti iz ajax_pretraga.php.
function fill(Value) {
    //Dodeljivanje vrednosti search
   $('#search').val(Value);
   //Sakrivanje
   $('#display').hide();
}
$(document).ready(function() {
   //Kada pritisnem na polje poziva se funkcija
   $("#search").keyup(function() {
       //Pretraga po imenu
       var name = $('#search').val();
       if (name == "") {
           $("#display").html("");
       }
       //Ako nije prazno
       else {
           //Zove ajax
           $.ajax({
               type: "POST",
               //Saljemo na ajax.php
               url: "ajax.php",
               data: {
                   search: name
               },
               //Ako ima to sto pretrazujemo poziva ovu funkciju
               success: function(html) {
                   //Prikazuje rezultat pretrage
                   $("#display").html(html).show();
               }
           });
       }
   });
});