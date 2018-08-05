$(document).ready(function(){
$('#training').hide();
$('#calendar').submit(function(eventObject){if($('#date').val()==""){eventObject.preventDefault();alert("Сначала введите дату!");}});
$('#faq').submit(function(eventObject){if($('#question').val()==""){eventObject.preventDefault();alert("Сначала напишите свой вопрос!");}});
$('#advice').submit(function(eventObject){if($('#trainin').val()==""){eventObject.preventDefault();alert("Сначала напишите своё предложение!");}});
$('input,textarea').focus(function(){$(this).addClass('focus');}).blur(function(){$(this).removeClass('focus');});
$('#date').datepicker({minDate:0,maxDate:"+3M",numberOfMonths:2,});
$("#accordion").accordion({collapsible:true,active:false,autoHeight:false,header:'h2',icons:false});
$("#trainings,#training").hover(function(){
$("#training").show();
$("#training").stop().animate({height:'108px',padding:'12px 4px'},{queue:false, duration:800, easing: 'easeOutQuart'})
},function(){
$("#training").stop().animate({height:'0',padding:'0 4px'},{queue:false, duration:800, easing: 'easeInBack'})});

var a=parseInt($("#a").html());
var b=parseInt($("#b").html());
$("#form").submit(function(){//Проверка полноты формы
if($("#question").val()==""){alert("Зачем Вы просто так нажимаете на эту кнопку? Пожалуйста, вначале задайте свой вопрос, а потом уже отпавляйте его.");return false;}
if($("#trainin").val()==""){alert("Зачем Вы просто так нажимаете на эту кнопку? Пожалуйста, вначале предложите тему тренинга, а потом уже отпавляйте её.");return false;}
if($("#c").val()==""){alert("Решите, пожалуйста, пледложенную арифметическую задачку! Нам важно знать, что Вы не рекламный робот.");return false;}
if(a+b==parseInt($("#c").val()))return true;
else{alert("Вы неверно сложили числа! Если возникают трудности, то воспользуйтесь, пожалуйста, калькулятором.");
return false;}});




}); //Конец ready