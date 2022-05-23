<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quejas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./style.css" />
</head>
<body>
	<div class="container" style="padding: 10px;">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="page-header text-center text-success">
					<img src="l.png" style="height:200px;width: 200px;">
					<h1>Poder judicial agradece su prticipacion.</h1>
					<h2>Es muy importante que guardes el siguiente folio de reporte ya que se te solicitará cuando nuestros asesores se contacten contigo. <br /> Tu folio de reporte es ( <strong><span id="last_id">En un momento se mostrará tu número de folio...</span></strong> ). </h2>
					<label class="text-center" for="#">Trabajamos arduamente para dar el mejor servicio a nuestros clientes. <br /> Uno de nuestros asesores se pondrá en contacto con usted lo más pronto posible.</label>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'controlador.php',
				data:{accion:'buscarUltimaQueja'},
				type:'GET',
				dataType:'json',
				beforeSend:function() {
					$('#last_id').html('<strong>En un momento se mostrará tu número de folio...</strong>');
				},
				success: function(json){ $('#last_id').text(json.resp);  },
				error: function(xhr, status){ console.log(xhr,status); },
			});
			$.ajax({
				url:'controlador.php',
				data:{accion:'validarSession'},
				type:'GET',
				dataType:'json',
				success: function(json){ (json.resp == 1) ? console.log('logok') : window.location.href='index.html'; },
				error: function(xhr, status){ console.log(xhr,status); },
			});

			

			setTimeout(regresar,20000);
			function regresar(){
				window.location.href='encuesta.html';
			}
		});
	</script>
</body>
</html>