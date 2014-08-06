<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> EMBARQUE </h3>
			</div>
			<?php 
				$attributes = array('id' => 'registry', 'name' => 'registry');
				echo form_open('embark/update_embark/'.$this->uri->segment(3),$attributes); 
			?>
				<div class="panel-body" id="seleccion">

					<div class="clear">&nbsp</div>
					<div class="col-md-12">
						<h3><span class="glyphicon glyphicon-th-large"></span> DETALLE DEL PEDIDO</h3>
					</div>
					
					<div class="col-md-12">
						<hr/>
					</div>
					
					<div class="col-md-12">
						
						
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<p><b>Pedido: <?php echo $id_order;?></b></p>
							</div><!-- End nombre -->
							<div class="input-group input-group-lg">
								<p><b>Fecha: </b><?php echo date("d-m-Y",strtotime($fecha))?></p>
							</div><!-- End nombre -->
							<div class="input-group input-group-lg">
								<p><b>Fecha de entrega: </b><?php echo date("d-m-Y",strtotime($fecha_entrega))?></p>
							</div><!-- End nombre -->
							<div class="input-group input-group-lg">
								<p><b>Agricultor:</b> <?php echo $farmer;?></p>
							</div><!-- End agricultor -->
							<div class="input-group input-group-lg">
								<p><b>Nombre Completo:</b> <?php echo $client->result()[0]->first_name." ".$client->result()[0]->last_name;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Correo Electrónico: </b><?php echo $client->result()[0]->mail;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Teléfono:</b> <?php echo $client->result()[0]->phone;?></p>
							</div><!-- End nombre -->

							
						
						</div>
						
						<div class="col-md-6">
							
							<div class="input-group input-group-lg">
								<p><b>Razón Social:</b> <?php echo $client->result()[0]->social_reason;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Calle/Colonia:</b> <?php echo $client->result()[0]->street." ".$client->result()[0]->colony;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Número #: </b><?php echo $client->result()[0]->address_number;?></p>
							</div><!-- End nombre -->

							<div class="input-group input-group-lg">
								<p><b>CP:</b> <?php echo $client->result()[0]->cp;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Tipo de cultivo:</b> <?php echo $planta->result()[0]->plant_name;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Categoría:</b> <?php echo $categoria->result()[0]->category_name;?></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Volumen Total:</b> <?php echo number_format($volumen);?></p>
							</div><!-- End nombre -->
							
							
							
						</div>
						
					</div>
						<div class="col-md-12">
						<?php 
							foreach ($embark->result() as $key ) {
						?>
						
						<div class="clear">&nbsp</div>
						<h4> <b>*DETALLE DEL EMBARQUE <?php echo $key->id_embark;?></b></h4>
						<input type="hidden" name="rol" id="rol" value="2" />

						
								
								<div class="col-md-6">
												
								<div class="input-group input-group-lg">
									<p><b>Fecha de Entrega:</b> <?php echo date("d-m-Y", strtotime($key->date_arrival));?></p>
								</div><!-- End fecha -->

								<div class="input-group">
									<p><b>Fecha de Arribo:</b> <?php echo date("d-m-Y", strtotime($key->date_delivery));?></p>
								</div><!-- End fecha -->

								<div class="input-group input-group-lg">
									<p><b>Volumen a Entregar:</b> <?php echo $key->volume;?></p>
								</div><!-- End volumen a entregar -->

								<div class="input-group input-group-lg">
									<p><b>Transportador:</b> <?php echo $key->transport;?></p>
								</div><!-- End transporte -->

								<div class="input-group input-group-lg">
									<p><b>Fletera:</b> <?php echo $key->freight;?></p>
								</div><!-- End fletera -->

								<div class="input-group input-group-lg">
									<p><b>Chofer:</b> <?php echo $key->driver;?></p>
								</div><!-- End Chofer -->

								<div class="input-group input-group-lg">
									<p><b>Cel Chofer:</b> <?php echo $key->driver_cel;?></p>
								</div><!-- End Cel chofer -->

							</div>

							<div class="col-md-6">

								<div class="input-group input-group-lg">
									<p><b>Destino:</b> <?php echo $key->destiny;?></p>
								</div><!-- End Destino -->	

								<div class="input-group input-group-lg">
									<p><b>Tipo de Empaque:</b> <?php echo $key->pack_type;?></p>
								</div><!-- End Tipo de Empaque -->			

								<div class="input-group input-group-lg">
									<p><b>Contacto Entrega:</b> <?php echo $key->arrival_contact;?></p>
								</div><!-- End Contacto Entrega -->

								<div class="input-group input-group-lg">
									
										<?php if($key->boxes == 1){
										?>
										<p><b>Cajas:</b> <?php echo 'Chep';?></p>
										<?php
										}else if($key->boxes == 2){
										?>	
										<p><b>Cajas:</b> <?php echo 'Ensenada';?></p>
										<?php
										}else if($key->boxes == 3){
										?>	
										<p><b>Cajas:</b> <?php echo 'No Aplica';?></p>
										<?php
										}
										?>
								</div><!-- End Cajas -->

								<div class="input-group input-group-lg">
									
										<?php if($key->box == 1){
										?>
										<p><b>Caja:</b> <?php echo 'Seca'; ?></p>
										<?php
										}else if($key->box == 2){
										?>	
										<p><b>Caja:</b> <?php echo 'Thermo'; ?></p>
										<?php
										}
										?>	
								</div><!-- End Caja -->

								<div class="input-group input-group-lg">
										<?php if($key->racks > 0){
										?>
										<p><b>Racks:</b> <?php echo 'Si'; ?></p>
										<?php
										}else if($key->racks == 0){
										?>
										<p><b>Racks:</b> <?php echo 'No'; ?></p>
										<?php
										}
										?>	
								</div><!-- End Racks -->

								<div class="input-group input-group-lg">
									<p><b># de Racks:</b><?php echo $key->racks;?></p>
								</div><!-- End Racks -->
								
							</div>
							<?php
							}
							?>


						<!--<div class="col-md-12">	

							<div class="clear">&nbsp</div>
							<h3>Comentario</h3>
							<div class="input-group input-group-lg">
								<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment" readonly><?php echo $embark[0]->comment;?></textarea>								
							</div><!-- End comment -->

						</div>	

				</div><!-- End panel-body -->
				<div class="clear">&nbsp</div>
				<div class="clear">&nbsp</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<?php  
								$data = array(
									'class'	=> 'btn btn-primary btn-block',
									'name' => 'Regresar',
								);
								echo anchor('breakdown/pedido_embarcado', 'Regresar', $data);
								
								
							?>
						</div>

						<div class="col-md-3 col-md-offset-4">
							<input class="btn btn-success btn-block" type="button" value="Imprimir" onclick="imprSelec('seleccion');"/>
						</div>
					</div><!-- End row -->
				</div><!-- End panel-footer -->	
				</form><!-- End form -->		
		</div><!-- End panel-default -->
	</div><!-- End col-md-4 col-md-offset-4 -->
</div><!-- End row -->

<script language="Javascript">
	function imprSelec(nombre) {
		var ficha = document.getElementById(nombre);
		var mywindow = window.open(' ', 'popimpr');
	    mywindow.document.write('<html><head><title></title>');
	    mywindow.document.write('<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" type="text/css" />');
	    mywindow.document.write('<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css" type="text/css" />');
	    mywindow.document.write('<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" type="text/css" />');
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