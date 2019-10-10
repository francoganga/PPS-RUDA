$(document).ready(function(){
   $('.slide').off().on('click', function(){
       var target = $(this).attr('target');
       var selector = "#".concat(target);

       $(selector).slideToggle('fast');
   }); 
});
