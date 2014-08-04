<html>
<head>
	<meta charset="utf-8">
	<title>Resultados de la germinación</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css"/>
</head>
<body>
<div id="seleccion" name="seleccion">
<table class="table table-bordered" >
	<th>Semilla</th>
	<th>Total Sembrado</th>
	<th>Total Viable</th>
	<th>Alcance</th>

	<?php
		if(is_array($orders))
		{
			foreach ($orders as $key) 
			{
				echo "<tr>";
				echo "<td>". $key->seed_name ."</td>";
				echo "<td>". $key->total ."</td>";
				echo "<td>". $key->viability_total ."</td>";
				if($key->scope > 0)
				{
					echo "<td>". round($key->scope) ."%</td>";
				} else {
					echo "<td style='color:red;'>". round($key->scope) ."%</td>";
				}
					
				echo "</tr>";
			}
		}
	?>
</table>
</div>

<div class="col-md-4 col-md-offset-3">
	<input type="button" name="imprimir" class="btn btn-primary btn-success" value="Imprimir" onclick="imprSelec('seleccion');" style="width: 134px;">
</div>
</body>
</html>
<script language="Javascript">
	function imprSelec(nombre) {
		var ficha = document.getElementById(nombre);
		var mywindow = window.open(' ', 'popimpr');
	    mywindow.document.write('<html><head><title></title>');
	    mywindow.document.write('<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" type="text/css" />');
	    mywindow.document.write('<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css" type="text/css" />');
	    mywindow.document.write('<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" type="text/css" />');
	    mywindow.document.write('<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" type="text/css" />');

     	mywindow.document.write('<link rel="stylesheet" href="http://localhost/plantanova/css/css/custom.css" type="text/css" />');
     	mywindow.document.write('<link rel="stylesheet" href="http://localhost/plantanova/css/css/TableTools.css" type="text/css" />');
	  	
	  	mywindow.document.write('</head><body >');
	  	mywindow.document.write(ficha.innerHTML);
	  	mywindow.document.write('</body></html>');
	 
	  	mywindow.document.close();
	  	mywindow.print();
	  	mywindow.close();
	}
</script>