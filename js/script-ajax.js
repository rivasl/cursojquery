$(document).ready(function() {
	$('#btn_click').click(function(){
        $('#panel').append("Actualidad jQuery");
        $('#panel').append("<div>Prueba</div>");
        console.log('Esto es una prueba');
    });		
});