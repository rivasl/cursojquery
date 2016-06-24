<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Prueba</title>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script>
		$(document).ready(function() {
			$('select[name=color1]').change(function() {
				alert($('select[name=color1]').val());
				$('input[name=valor1]').val($(this).val());
			});

			$('#color2').change(function() {
				alert($('#color2').val());
				$('#valor2').val($(this).val());
			});

			$(".ejemplo3").change(function(){
				alert($('select[class=ejemplo3]').val());
				$('.valor3').val($(this).val());
		 	});			
		});
	</script>

	<script>
	    $(document).ready(function(){
	        $("#boton").click(function () {     
				if( $("#formulario input[name='edad']:radio").is(':checked')) {  
	                alert("Bien!!!, la edad seleccionada es: " + $('input:radio[name=edad]:checked').val());
	                $("#formulario").submit();  
	            }
	            else{  
	        		alert("Selecciona la edad.");  
	            }  
	           	$("#formulario").submit();
	        });
	    });
	</script>
</head>
<body>
	FORMULARIO 1
	<form action="" method="POST" id="form1">
		<select name="color1">
			<option value="0">Seleccione una opción</option>
			<option value="1">Rojo</option>
			<option value="2">Azul</option>
			<option value="3">Amarillo</option>
		</select>
		<input type="text" name="valor1" size="40" value="Aquí saldrá el valor del select cuando cambie">
	</form><br><br>

	FORMULARIO 2
	<form action="" method="POST" id="form2">
		<select id="color2">
			<option value="0">Seleccione una opción</option>
			<option value="1">Rojo</option>
			<option value="2">Azul</option>
			<option value="3">Amarillo</option>
		</select>
		<input type="text" id="valor2" size="40" value="Aquí saldrá el valor del select cuando cambie">
	</form><br><br>	

	FORMULARIO 3
	<form action="" method="POST" id="form3">
		<select name="color3" class="ejemplo3">
			<option value="0">Seleccione una opción</option>
			<option value="1">Rojo</option>
			<option value="2">Azul</option>
			<option value="3">Amarillo</option>
		</select>
		<input type="text" size="40" class="valor3" value="Aquí saldrá el valor del select cuando cambie">
	</form><br><br>		

	FORMULARIO 4
	<form name="formulario" id="formulario" action="" method="POST">
	    <input type="radio" name="edad" id="edad1" value="20"> 20<br>
	    <input type="radio" name="edad" id="edad2" value="30"> 30<br>
	    <input type="radio" name="edad" id="edad3" value="40"> 40 
	    <br><br>
	    <input type="button" id="boton" value="Enviar">
	</form>	
</body>
</html>


<?php 
if (isset($_POST['edad'])) {
    echo "la edad recibida es: " .$_POST['edad'];
}
?>