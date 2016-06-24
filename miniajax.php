<!-- Hacer una página que contenga un enlace que al darle click muestre contenido html através de ajax -->
<!DOCTYPE html>
<html>
	<head>
	    <title>Ajax Simple</title>
	    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>
			$(document).ready(function(){
			   $("#enlaceajax").click(function(evento){
			   		evento.preventDefault();
			   		$("#destino").load("addcomment.php");
			   });
			})
		</script>

		<script type="text/javascript">
            $(document).ready(function() {
                $("#boton").click(function(event) {
                    $("#capa").load("load.php",{v1:'3', v2:'5'}, 
                    	function(response, status, xhr) {
                          if (status == "error") {
                            var msg = "Error!, algo ha sucedido: ";
                            $("#capa").html(msg + xhr.status + " " + xhr.statusText);
                          }
                        });
                });
            });            
        </script>	
	</head>
	<body>
		<a href="#" id="enlaceajax">Haz clic!</a>
		<br>
		<div id="destino"></div>
		<br>
	    <div id="capa">Pulsa 'Actualizar capa' y este texto se actualizará</div>
	    <br>
	    <input name="boton" id="boton" type="button" value="Actualizar capa" />
	</body>
</html>