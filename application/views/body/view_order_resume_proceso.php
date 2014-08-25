<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Resumen de Orden </h3>
				</div>
				<div id="result">						
					<!-- Cuerpo del panel-->
					<div class="panel-body" id="seleccion">
						<div class="col-md-12">
							<h1>Resumen</h1>
						</div>
						
						<div class="clear">&nbsp</div>		
						<div class="col-md-12">
							<h4><b>*Datos del cliente</b></h4>
						</div>
						
						<div class="col-md-6" style="width: 39%;">
							<div class="input-group input-group-lg">
								<p>Nombre Completo: <?php echo $company->result()[0]->first_name . " " . $company->result()[0]->last_name;?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Correo Electrónico: <?php echo $company->result()[0]->mail;?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Teléfono: <?php echo $company->result()[0]->phone;?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Calle/Colonia: <?php echo $company->result()[0]->street . " " . $company->result()[0]->colony;?></p>
							</div><!-- End Plant -->
							
						</div>
						
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<p>Número #: <?php echo $company->result()[0]->address_number;?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>CP: <?php echo $company->result()[0]->cp;?></p>
							</div><!-- End Plant -->
						
							<div class="input-group input-group-lg">
								<p>Razón Social: <?php echo $company->result()[0]->social_reason;?></p>
							</div><!-- End Plant -->
							
						</div>
						
						<div class="clear">&nbsp</div>		
						<div class="col-md-12">
							<h4><b>*Datos del pedido</b></h4>
						</div>
						
						<div class="col-md-6"style="width: 39%;">
							<div class="input-group input-group-lg">
								<p>Fecha: <?php echo date("d-m-Y", strtotime($order->result()[0]->order_date_delivery));?></p>
							</div><!-- End Plant -->

							<div class="input-group input-group-lg">
								<p>Agricultor: <?php echo $order->result()[0]->farmer;?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Tipo de cultivo: <?php echo $plant->result()[0]->plant_name;?></p>
							</div><!-- End Plant -->

							<div class="input-group input-group-lg">
								<p>Categoría: <?php echo $category->result()[0]->category_name;?></p>
							</div><!-- End Plant -->
							
						</div>
						
						<div class="col-md-6">
							
							<div class="input-group input-group-lg">
								<p>Brazos: <?php echo $order->result()[0]->branch_number;?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Tutoreo: <?php echo $order->result()[0]->tutoring;?></p>
							</div><!-- End Plant -->

							<div class="input-group input-group-lg">
								<p>Volumen total: <?php echo number_format($order->result()[0]->total_volume);?></p>
							</div><!-- End Plant -->
							

							
						</div>
						
						<div class="clear">&nbsp</div>					
						<div class="input-group input-group-lg">
							<h4><b>*Desglose de la orden:</b></h4>
						</p>
						</div><!-- End Desglose -->					
						
						<table>
							<th>Sustrato</th>
							<th>Subtipo</th>
							<th>Variedad</th>
							<th>PortaInjerto</th>
							<th>Volumen</th>

							<tbody>
								<?php
								if(is_array($breakdown))
								{
									foreach ($breakdown as $key) 
									{
										$subtype_a=$this->model_order->get_id_sustratum($key->id_subtype);
										$subtype_name_a=$subtype_a->result()[0]->subtype_name;
										$sustratum_a=$this->model_order->get_sustratum_id($subtype_a->result()[0]->id_sustratum);
										$sustratum_name_a=$sustratum_a->result()[0]->sustratum_name;
										echo "<tr>";
										echo "<td>" . $sustratum_name_a . "</td>";
										echo "<td>" . $subtype_name_a . "</td>";
										echo "<td>" . $key->variety . "</td>";
										echo "<td>" . $key->rootstock . "</td>";
										echo "<td>" . number_format($key->volume) . "</td>";
										echo "</tr>";
									}
								}
								?>
							</tbody>
						</table>
						
					</div><!-- fin cuerpo del panel -->
									
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-2 col-md-offset-2">
							<?php  
								$data = array(
									'class'	=> 'btn btn-primary btn-block',
									'name' => 'Regresar',
								);
								echo anchor('breakdown/pedido_proceso', 'Regresar', $data);
							?>
							</div>
							<div class="col-md-4 col-md-offset-3">
								<input type="button" name="imprimir" class="btn btn-primary btn-success" value="Imprimir" onclick="imprSelec('seleccion');" style="width: 134px;">
							</div>
						</div>	
					</div><!-- fin panel footer -->	
					
				</div><!-- @end .result -->
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->

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
