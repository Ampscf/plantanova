<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> EMBARQUE </h3>
			</div>
			<?php 
				$attributes = array('id' => 'registry', 'name' => 'registry');
				echo form_open('embark/update_embark/'.$this->uri->segment(3),$attributes); 
			?>
					<div class="panel-body" >

						<div class="clear">&nbsp</div>
						<div class="col-xs-12">
							<h3><span class="glyphicon glyphicon-th-large"></span> DETALLE DEL PEDIDO</h3>
							<hr/>
						</div>
						<div id="seleccion">
							<div class="col-xs-12">					
								<div class="col-xs-6">
									<div class="input-group input-group-lg">
										<h4><b>Pedido: <?php echo $order_number;?></b></h4>
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
							
								<div class="col-xs-6">
								
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
							<?php 
								if($embark != false){
									foreach ($embark->result() as $key)
									{
								?>
									<div class="col-xs-12">
										<hr/>
										<h5><b>*DETALLE DEL EMBARQUE <?php echo $key->id_embark;?></b></h5>
										<div class="col-xs-6">
											<div class="input-group input-group-lg">
												<p><b>Fecha de Entrega:</b> <?php echo date("d-m-Y", strtotime($key->date_arrival));?></p>
											</div><!-- End fecha -->
											<div class="input-group">
												<p><b>Fecha de Arribo:</b> <?php echo date("d-m-Y", strtotime($key->date_delivery));?></p>
											</div><!-- End fecha -->
											<div class="input-group input-group-lg">
												<p><b>Volumen a Entregar:</b> <?php echo number_format($key->volume);?></p>
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
											<div class="input-group input-group-lg">
												<p><b>Destino:</b> <?php echo $key->destiny;?></p>
											</div><!-- End Destino -->
											<div class="input-group input-group-lg">
												<p><b>Dirección:</b> <?php echo $key->address;?></p>
											</div><!-- End Destino -->
											
											
										</div>

										<div class="col-xs-6">
											<div class="input-group input-group-lg">
												<p><b>Contacto Entrega:</b> <?php echo $key->arrival_contact;?></p>
											</div><!-- End Destino -->
											<?php $state=$this->model_embark->get_state($key->id_state);?>
											<div class="input-group input-group-lg">
												<p><b>Estado:</b> <?php echo $state[0]->state_name;?></p>
											</div><!-- End Destino -->
											<?php $town=$this->model_embark->get_town($key->id_town);?>
											<div class="input-group input-group-lg">
												<p><b>Ciudad:</b> <?php echo $town[0]->town_name;?></p>
											</div><!-- End Destino -->
											<div class="input-group input-group-lg">
												<?php 
												if($key->racks > 0){
												?>
													<p><b>Racks: </b> <?php echo 'Si'; ?></p>
												<?php
												}else if($key->racks == 0){
												?>
													<p><b>Racks: </b> <?php echo 'No'; ?></p>
												<?php
												}
												?>	
											</div><!-- End Racks -->
											<div class="input-group input-group-lg">
												<p><b># de Racks: </b><?php echo $key->racks;?></p>
											</div><!-- End Racks -->																	
											<div class="input-group input-group-lg">						
												<p><b>Chep (Retornable):</b> <?php echo $key->chep;?></p>
											</div>
											<div class="input-group input-group-lg">
												<p><b>Ensenada(<?php echo $key->tipo_ensenada;?>):</b> <?php echo $key->ensenada;?></p>
											</div>
											<div class="input-group input-group-lg">
												<p><b>No Aplica:</b> <?php echo $key->no_aplica;?></p>
											</div><!-- End Contacto Entrega -->
											<div class="input-group input-group-lg">
												<p><b>Caja del Trailer:</b> <?php echo $key->transport_box;?></p>
											</div>
										</div>
									</div>
									<?php
									}
								}
									?>
							
						</div>

						<!-- Aqui -->
						<div class="col-xs-12">
							<div class="clear">&nbsp</div>
							<h4><b>*Archivos subidos</b></h4>

							<p><b>Cotización:</b> </p><p><?php echo $quoti;?> </p> 
							<p><b>Contrato:</b></p><p> <?php echo $contra;?></p>
							<p><b>Facturas:</b> </br><?php 
								if($bill != NULL){
									foreach ($bill as $key) {
										echo '<a href="/plantanova/uploads/'.$key->location.'" target="_blank" style="color:yellowgreen;">'.$key->location.'</a>';			
										echo '<p>Folio:'.$key->folio.' &nbsp;&nbsp;Total: $'.$key->total.'&nbsp;'.$key->moneda.'</p>';
										echo '</br>';
									}	
								} else {
									echo '<p>No se ha subido PDF</p>';
								}
							?>
							</p>
							<p><b>Carta Factura:</b> </br><?php
								if($card_bill != NULL){
									foreach ($card_bill as $key) {
										echo '<a href="/plantanova/uploads/'.$key->location.'" target="_blank" style="color:yellowgreen;">'.$key->location.'</a>';			
										echo '</br>';
									}	
								} else {
									echo '<p>No se ha subido PDF</p>';
								}
							?> 
							</p>
							<p><b>Dictamen:</b> </br><?php 
								if($dictum != NULL){
									foreach ($dictum as $key) {
										echo '<a href="/plantanova/uploads/'.$key->location.'" target="_blank" style="color:yellowgreen;">'.$key->location.'</a>';			
										echo '</br>';
									}	
								} else {
									echo '<p>No se ha subido PDF</p>';
								}
							?>
							</p>

						</div>	

					</div><!-- End panel-body -->
					<div class="clear">&nbsp</div>
					<div class="clear">&nbsp</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-xs-3 col-xs-offset-1">
								<?php  
								if($this->uri->segment(4)==1){
									$data = array(
										'class'	=> 'btn btn-primary btn-block',
										'name' => 'Regresar',
									);
									echo anchor('breakdown/finalizado', 'Regresar', $data);
								}else{
									$data = array(
										'class'	=> 'btn btn-primary btn-block',
										'name' => 'Regresar',
									);
									echo anchor('breakdown/pedido_embarcado', 'Regresar', $data);
								}
									
								?>
							</div>

							<div class="col-xs-3 col-xs-offset-4">
								<input class="btn btn-success btn-block" type="button" value="Imprimir" onclick="imprSelec('seleccion');"/>
							</div>
						</div><!-- End row -->
					</div><!-- End panel-footer -->	
				</form><!-- End form -->		
			</div><!-- End panel-default -->
		</div><!-- End col-xs-4 col-xs-offset-4 -->
	</div><!-- End row -->
<img src="<?php echo base_url()?>img/ENCABEZADOS_resumenordenembarcada.png" style="display:none">
<script language="Javascript">
	function imprSelec(nombre) {
		var ficha = document.getElementById(nombre);
		var mywindow = window.open(' ', 'popimpr');
	    mywindow.document.write('<html><head><title></title>');
	    mywindow.document.write('<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" type="text/css" />');
	    mywindow.document.write('<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css" type="text/css" />');
	    mywindow.document.write('<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" type="text/css" />');
	    mywindow.document.write('<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" type="text/css" />');

     	mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url().'css/css/custom.css';?>' type='text/css' />");
     	mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url().'css/css/TableTools.css';?>' type='text/css' />");
	  	
	  	mywindow.document.write('</head><body >');
	  	mywindow.document.write('<img src="<?php echo base_url()?>img/ENCABEZADOS_resumenordenembarcada.png" style="width:100%">');
	  	mywindow.document.write('<div style="padding-left: 40px;">');
	  	mywindow.document.write(ficha.innerHTML);
	  	mywindow.document.write('</div>');
	  	mywindow.document.write('</body></html>');
	 
	  	mywindow.document.close();
	  	mywindow.print();
	  	mywindow.close();
	}
</script>