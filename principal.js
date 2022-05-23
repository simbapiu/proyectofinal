/*===================================
=            INFORMACIÓN            =
===================================*/
/*
	AUTOR: ING. OSCAR BONILLA RODRIGUEZ
	FECHA: 2017-07
*/
/*=====  End of INFORMACIÓN  ======*/

$(document).ready(()=>{
	var preguntas = ['¿Pregunta 1?','¿Pregunta 2?','¿Pregunta 3?','¿Pregunta 4?'];
	var respuestas = ['bueno','regular','malo'];
	var i = 0;
	var html = '';
	$('#pregunta').html('<h3>'+preguntas[0]+'</h3>');
	i = (i+1);
	for (var j = 0; j < respuestas.length; j++) {
		html += '<div id="rem' + j + '" class="col-xs-12 col-sm-4 col-md-4"><a href="#" onclick="efect()" class="thumbnail img-' + j + ' efect"><img src="' + j + '.jpg" alt="feliz-02.jpg"></a></div>';	
	}
	$('#respuestas').html(html);
	$('.efect').click(() => {
        if(i < respuestas.length) {
	        $('#pregunta').html('<h3>'+preguntas[i]+'</h3>');
        } else if(i == 3) {
        	$('#rem0').remove();
        	$('#rem1').remove();
        	$('#rem2').remove();
        	$('#pregunta').html('<h3>'+preguntas[i]+'</h3>');
        	html = '';
        	for (var j = 3; j < 7; j++) {
				html += '<div id="rem' + j + '" class="col-xs-12 col-sm-4 col-md-4"><a href="#" onclick="efect2()" class="thumbnail img-' + j + ' efect"><img src="' + j + '.jpg" alt="feliz-02.jpg"></a></div>';	
			}
			$('#respuestas').html(html);
        }
        i++;
		console.log(i);
	});
});

function efect() {
	$(".img-0").fadeToggle();
    $(".img-1").fadeToggle("slow");
    $(".img-2").fadeToggle("slow");
	$(".img-0").fadeToggle();
    $(".img-1").fadeToggle("slow");
    $(".img-2").fadeToggle("slow");
}

function efect2() {
	$(".img-3").fadeToggle();
    $(".img-4").fadeToggle("slow");
    $(".img-5").fadeToggle("slow");
    $(".img-6").fadeToggle("slow");
	$(".img-3").fadeToggle();
    $(".img-4").fadeToggle("slow");
    $(".img-5").fadeToggle("slow");
    $(".img-6").fadeToggle("slow");
}