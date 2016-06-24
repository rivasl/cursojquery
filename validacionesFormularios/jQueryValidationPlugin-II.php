<!-- http://jqueryvalidation.org/ -->
<!-- http://www.adictosaltrabajo.com/tutoriales/tutoriales.php?pagina=jquery-validator-plugin#ejemplo -->
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validación con jQuery Validation plugin (jquery.validate.min.js)</title>
    <link href='../css/JqueryValidationPluginstylesheet-II.css' rel='stylesheet' type='text/css'>
</head>

<body>
    <div id="entity_data">
		<form id="entityDataForm" action="#" method="post">
			<fieldset>
				<legend>Datos del Usuario</legend>
				<div class="field">
					<label for="login">Login:</label>
					<input type="text" id="login" name="login" size="20" maxlength="50" tabindex="1" autocomplete="false"/>
				</div>
				
				<div class="field">
					<label for="pass">Contraseña: (dos veces)</label>
					<input type="password" id="pass"  name="pass"  size="5"/>
					<input type="password" id="pass2" name="pass2" size="5"/>
				</div>
				
				<div class="field">
					<label for="name">Nombre completo:</label>
					<input name="name" id="name" size="35" maxlength="100" autocomplete="false"/>
				</div>
				<div class="field">
					<label for="email">E-Mail:</label>
					<input type="text" id="email" name="email" size="20" maxlength="100" autocomplete="false"/>
				</div>
				<div class="field">
					<label for="website">Página web:</label>
					<input name="website" id="website" size="35" maxlength="100"/>
				</div>
				<div class="field">
					<label for="fnac">Fecha de nacimiento (dd/mm/aaaa):</label>
					<input type="text" name="fnac" id="fnac" size="20"/>
				</div>
				
				<div class="field">
					<label for="antiguedad">N° años de antigüedad:</label>
					<input type="text" name="antiguedad" id="antiguedad" />
				</div>
				<div class="field">
					<label for="numPersonas">N° personas a su cargo:</label>
					<input type="text" name="numPersonas"  id="numPersonas" size="10"/>
				</div>
				<div class="field">
					<label for="secreto">Secreto: ¿5+5?:</label>
					<input type="text" name="secreto"  id="secreto"/>
				</div>
				<div class="field">
					<label for="campoX">CampoX:</label>
					<input type="text" name="campoX"  id="campoX"/>
				</div>
			</fieldset>
			<div id="entity_commands">
				<input type="submit" value="Aceptar"/>
				<input type="submit" value="Cancelar" class="cancel"/>
				
				<a href="#" id="manual">Validacion manual</a>
				<a href="#" id="addRule">Agrega una regla a CampoX</a>
			</div>
		</form>
		<div id="errores">
			<ul></ul>
		</div>
	</div>
		
	<div id="validation_legend_rules">
		<h2>Reglas de validación aplicadas</h2>
		<ul>
			<li><em>login:</em> Requerido, además no debe existir un usuario con ese mismo login. (Ej: <strong>lrivas</strong> está ocupado)</li>
			<li><em>Contraseña:</em> Requerido, además deben tener al menos 4 caracteres y coincidir la conraseña con su verificación.</li>
			<li><em>Nombre completo:</em> Requerido.</li>
			<li><em>E-Mail:</em> Requerido, y debe tener un formato de email válido.</li>
			<li><em>Página web</em> Opcional pero si existe el formato debe ser correcto.</li>
			<li><em>Fecha de nacimiento:</em>  Opcional pero si existe se validará que es una fecha correcta.</li>
			<li><em>N° años de antigüedad:</em> Requerido y número positivo entre 1 y 50.</li>
			<li><em>N° personas a su cargo:</em> Requerido, número entre 0 y 1000.</li>
			<li><em>Secreto:</em> Requerido, es una regla personalizada que valida que el usuario introduzca la respuesta correcta.</li>
			<li><em>CampoX:</em> Es opcional a menos que se haga click en el enlace que establece una regla dinámica sobre el, convirtiéndolo en un campo requerido.</li>
		</ul>
	</div>
    
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="js/messages_es-II.js"></script>

    <script>
    	$(document).ready(function() {
    		/*Activamos la validacion sobre el formulario*/
    		$("#entityDataForm").validate({
    			errorContainer: "#errores",
    			errorLabelContainer: "#errores ul",
    			wrapper: "li",
      			errorElement: "em",
     			rules: {
     				login:   		{required: true, remote: {url: "check-login.php", type: "get"}},
     				pass:    		{required: true, minlength: 4},
     				pass2: 	 		{required: true, minlength: 4, equalTo: "#pass"}, 				
     				name:  	 		{required: true}, 		
     				email: 	 		{required: true,  email: true},
     				website: 		{required: false, url: true},
     				fnac: 	 		{required: false, date: true},
     				antiguedad: 	{required: true, number: true, min: 1, max: 50},
     				numPersonas:	{required: true, range: [0, 1000]},
     				secreto: 	 	{basicoCaptcha: 10}
     			},
    			messages: {
    				login: 	 {
    					required: "Campo requerido: Login",
    					remote:	  "Ya existe un usuario con ese login"
    				},
    				email:		 {
    					required: "Campo requerido: E-Mail",
    					email:	  "Formato no valido: E-Mail"
    				},
    				secreto: {
    					basicoCaptcha: "Introduzca el secreto"
    				}
     			}
    		});

    		$.validator.methods.basicoCaptcha = function(value, element, param) {return value == param;};
    		
    		$("#manual").click(function() {
    			  alert("¿Formulario válido?: " + $("#entityDataForm").validate().form());
    			  alert("Existen " + $("#entityDataForm").validate().numberOfInvalids() + " errores.");  
    		});
    		
    		$("#addRule").click(function() {
    				$("#campoX").rules("add", {
    					required: true, minlength: 3,
    				 	messages: {
    				   		required: "Ahora el campo es requerido",
    				   		minlength: jQuery.format("Son necesarios al menos {0} caracteres")
    				 	}
    				});
    		});
    		
    	});
    </script>
</body>
</html>
<!-- Lo cierto es que remote es muy sencillo de entender.
 Simplemente delegamos la validación de nuestro elemento en 
 una llamada a una url (servicio web, método de página, controlador genérico, etc.) 
 que validará el valor en el servidor y tiene que devolver en formato JSON un true 
 si la validación ha tenido éxito o false (o cualquier otro valor distinto de true) 
 en caso contrario.
 -->