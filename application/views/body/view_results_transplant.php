<html>
<head>
	<meta charset="utf-8">
	<title>Resultados del Injerto</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css"/>
</head>
<body>
<div id="seleccion" name="seleccion">
<table class="table table-bordered" >
	<th>Variedad/Portainjerto</th>
	<th>Total Transplantado</th>
	<th>Alcance</th>

	<?php
		if(is_array($breakdown))
		{
			foreach ($breakdown as $key) 
			{
				echo "<tr>";
				echo "<td>". $key->variety."/".$key->rootstock."</td>";
				$sum_breakdown=$this->model_order->get_total_transplant2($key->id_breakdown);
				echo "<td>". $sum_breakdown[0]->volume ."</td>";
				$scope=($sum_breakdown[0]->volume/$key->volume) - 1;
				if($scope <= 0){
					if($scope > -1){
						echo "<td style='color:red'>0%</td>";
					}else{
						echo "<td style='color:red'>". round($scope) ."%"."</td>";
					}					
				}else{
					echo "<td>". round($scope) ."%"."</td>";
				}
				
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

     	mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url().'css/css/custom.css';?>' type='text/css' />");
     	mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url().'css/css/TableTools.css';?>' type='text/css' />");
     	
	  	mywindow.document.write('</head><body >');
	  	mywindow.document.write(ficha.innerHTML);
	  	mywindow.document.write('</body></html>');
	 
	  	mywindow.document.close();
	  	mywindow.print();
	  	mywindow.close();
	}
</script>