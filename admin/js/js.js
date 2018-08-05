$(document).ready(function(){
$('input,textarea').focus(function(){$(this).addClass('focus');}).blur(function(){$(this).removeClass('focus');});
$('#date').datepicker({minDate:0,changeMonth:true,changeYear:true});
}); //Конец ready