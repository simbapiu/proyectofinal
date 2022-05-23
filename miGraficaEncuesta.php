<!--=====================================
=            INFORMACIÓN            =
======================================-->
<!--
	AUTOR: ING. OSCAR BONILLA RODRIGUEZ
	FECHA: 2017-07
-->
<!--====  End of INFORMACIÓN  ====-->
<!DOCTYPE html>
<html lang="en">
<head>
	<script type="text/javascript">
		var idLog = sessionStorage.getItem('sys');
		if(idLog != 1) window.location.href = 'index.html';
	</script>
	<meta charset="UTF-8">
	<title>Grafica encuesta</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="./style.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.jqueryui.min.css">
	<link rel="icon" type="image/png" href="./miLogoOz.ico" />
</head>
<body>

	<div class="container" style="padding: 20px;">
		<div class="fixed-action-btn toolbar">
			<a class="btn-floating btn-large red pulse">
			  <i class="large material-icons">mode_edit</i>
			</a>
			<ul>
			  <li class="waves-effect waves-light"><a href="./miGraficaEncuesta.html"><i class="material-icons">insert_chart</i></a></li>
			  <!-- <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">format_quote</i></a></li> -->
			  <li class="waves-effect waves-light"><a id="btnExcel" href="#!"><i class="material-icons">import_export</i></a></li>
			  <li class="waves-effect waves-light"><a href="./miReporteEncuestas.html"><i class="material-icons">input</i></a></li> 
			</ul>
		</div>

		<div class="row">
			<div class="col s12" >
				<div class="card z-depth-5">
					
					<div class="card-content">
						<div class="row">
							<div class="col s12">
								<div class="right">
									<a id="btnImprimir"  class="waves-effect waves-light btn orange">Imprimir <i class="material-icons left">print</i></a>
									<a id="btnSalir" class="waves-effect waves-light btn">Salir <i class="material-icons left">trending_flat</i></a>
								</div>
								<br /><br />
								<div id="prel"></div>
							</div>
						</div>
						<div class="row" id="imprimeme">
							<div class="col s12">
								<table data-graph-container-before="1" data-graph-type="column"  class="highlight bordered striped highchart" style="margin-bottom: 15px; display:none"  id="reporte">
								<caption>ENCUESTAS REALIZADAS POR SUCURSAL</caption>
									<thead>
									  <tr>
									  	  <th>SUCURSAL</th>
									      <th>DETESTABLE</th>
									      <th>MALO</th>
									      <th>REGULAR</th>
									      <th>BIEN</th>
									      <th>EXCELENTE</th>

									  </tr>
									</thead>

									<tbody id="tbody"></tbody>
								</table>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
	</div>

	
	
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
	<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.jqueryui.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharttable.org/master/jquery.highchartTable-min.js"></script>

	<script type="text/javascript">
		
		$(document).ready(function() {
			
			$.ajax({
				url:'controlador.php',
				data:{accion:'bucarSucursalesEncuestadas'},
				type:'GET',
				dataType:'json',
				beforeSend:function(){
					$('#prel').html('<div class="progress"><div class="indeterminate"></div></div>');
				},
				success: function(json) {

					json.forEach(function(v) {
						$('#tbody').append('<tr>id=tableEnSucursal<td>'+ v.sucursal +'</td><td id="tableDetestable'+v.id_sucursal+'">0</td><td id="tableMalo'+v.id_sucursal+'">0</td><td id="tableRegular'+v.id_sucursal+'">0</td><td id="tableBien'+v.id_sucursal+'">0</td><td id="tableExcelente'+v.id_sucursal+'">0</td></tr>');

						v.respuestas.forEach(function(v) {
							if(v.respuesta == 'En Sucursal') $('#tableEnSucursal'+v.id_sucursal).html(v.total);
							if(v.respuesta == 'Detestable') $('#tableDetestable'+v.id_sucursal).html(v.total);
							if(v.respuesta == 'Malo') $('#tableMalo'+v.id_sucursal).html(v.total);
							if(v.respuesta == 'Regular') $('#tableRegular'+v.id_sucursal).html(v.total);
							if(v.respuesta == 'Bien') $('#tableBien'+v.id_sucursal).html(v.total);
							if(v.respuesta == 'Excelente') $('#tableExcelente'+v.id_sucursal).html(v.total);
						});
					});
					/*$('#reporte').DataTable( {
					    responsive: true,
					    paging: false

					} );*/
					$('table.highchart').highchartTable();
				},
				error: function(xhr, status) { console.log(xhr,status); },
				complete:function() {
					$('.progress').remove();	
				}
			});
			$('#btnExcel').click(function() {
				$("#reporte").table2excel({
					exclude: ".noExl",
				    //exclude: ".excludeThisClass",
				    name: "Reporte del resultado de la encuesta",
				    filename: "ReporteEncuesta" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
				    fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});
			$('#btnSalir').click(function(evento){
				evento.preventDefault();
				sessionStorage.removeItem('sys');
				window.location.href = 'index.html';		
			});

			$('#btnImprimir').click(function(evento){
				evento.preventDefault();
				imprimir();
			});
			function imprimir(){
			  var objeto=document.getElementById('imprimeme');  //obtenemos el objeto a imprimir
			  var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
			  ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
			  ventana.document.close();  //cerramos el documento
			  ventana.print();  //imprimimos la ventana
			  ventana.close();  //cerramos la ventana
			}
		});
	</script>
</body>
</html>