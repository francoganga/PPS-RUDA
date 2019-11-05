$(document).ready(function(){
   $('.slide').off().on('click', function(){
       var target = $(this).attr('target');
       var selector = "#".concat(target);
       if ($(this).text() === "Mostrar") {
           $(this).html("Ocultar")
       } else if ($(this).text() === "Ocultar") {
           $(this).html("Mostrar")
       }

       $(selector).slideToggle('fast');
   });
});
