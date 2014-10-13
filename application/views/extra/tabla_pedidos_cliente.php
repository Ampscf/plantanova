<table class="table table-hover" id="tabla-pedidos">
	
		<th class="col-md-1"># Pedido</th>
		<th>Volumen</th>
		<th>Fecha</th>
		<th>Planta</th>
		<th>Categoria</th>
		<th>Estatus</th>
		<th>Informe</th>
		<th>Descargas</th>

	
		<?php
			if(is_array($orders)){
				foreach ($orders as $key) {
					echo "<tr>";
					echo "<td>".$key->id_order ."</td>";
					echo "<td>".$key->total_volume ."</td>";
					echo "<td>".date("d-m-Y",strtotime($key->order_date_submit))."</td>";
					$plant=$this->model_order->get_plant($key->id_plant);
					echo "<td>". $plant->result()[0]->plant_name ."</td>";
					$category=$this->model_order->get_category($key->id_category);
					echo "<td>".  $category->result()[0]->category_name."</td>";
					if($key->activate==0){
						echo "<td>Cancelado</td>";
					}else{
						$status=$this->model_client->get_status($key->id_status);
						echo "<td>". $status[0]->status_name."</td>";
					}

					$informs=$this->model_client->get_informs($key->id_order);
					
					echo "<td>";
					if(is_array($informs)){
					?>	                 
					 
					<a href="#myModal<?php echo $key->id_order; ?>" class="btn btn-default"
						title="Informe"
						data-toggle="modal">
						<i class="fa fa-file-text-o"></i>
					</a>

					<div id="myModal<?php echo $key->id_order; ?>" class='modal fade'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
									<h4 class='modal-title'>Informe</h4>
								</div>
								<div id='seleccion<?php echo $key->id_order; ?>'>
								<?php foreach ($informs as $ke => $value) { 
									if ($ke>0){?>
								
								<div class='modal-body saltopagina'>
									<?php }else{?>
								<div class='modal-body'>
									<?php }?>
									<div class='col-xs-12'>
									<img src="<?php echo base_url()?>img/informe.png" style="margin-left: -35px;width:100%">
									</div>	
									<div class='col-xs-12'>
									<h4><b><?php echo $value->client_name;?></b></h4>
									</div>	
									<div class='col-xs-12'>
									<h4><?php echo $value->inform_text ?></h4>
									</div>			                		
									<div>&nbsp</div>
									<div class='input-group input-group-lg'>
										<div class='col-xs-12'>
											<div class='col-xs-6'>
												<?php if($value->reception_date!=null){
													$img='<img src="'. base_url() . 'img/infomrme_cliente/recepcion.jpg" style="height: 500px;">';
													?>
												
												<div id='recepcion<?php echo $value->id_breakdown ?>' >
													<h4 class="green-margin">Recepcion</h4>
													<b>Fecha: </b><?php echo $value->reception_date ?>
												</div>

												<div >&nbsp</div>
												<?php }
												if($value->variety!=null || $value->rootstock!=null){
													$img='<img src="'. base_url() . 'img/infomrme_cliente/siembra.jpg" style="height: 500px;">';
												?>
												<div id='siembra_ger<?php echo $value->id_breakdown; ?>' >
													<h4 class="green-margin">Siembra/Germinacion</h4>
												<?php }
												if($value->variety!=null ){ ?>
													<div id='divvariety<?php echo $value->id_breakdown;?>' >
														<b>Variedad:</b><?php echo $value->variety; ?><br>
														<b>Fecha de Siembra:</b><?php echo $value->variety_sowing_date; ?><br>
														<b>% Germinacion:</b><?php echo $value->variety_germination; ?><br>
														<b>% Viabilidad:</b><?php echo $value->variety_viability; ?>
														<div >&nbsp</div>
													</div>
													<?php }
													if($value->rootstock!=null){?>
													<div id='divrootstock<?php echo $value->id_breakdown; ?>' >
														<b>Portainjerto:</b><?php echo $value->rootstock; ?><br>
														<b>Fecha de Siembra:</b><?php echo $value->rootstock_sowing_date; ?><br>
														<b>% Germinacion:</b><?php echo $value->rootstock_germination; ?><br>
														<b>% Viabilidad:</b><?php echo $value->rootstock_viability; ?>
													</div>
													<?php }
													if($value->variety!=null || $value->rootstock!=null){?>
												</div>
												<div >&nbsp</div>
												<?php } 
												if($value->graft_date!=null){
													$img='<img src="'. base_url() . 'img/infomrme_cliente/injerto.jpg" style="height: 500px;">';
													?>
												<div id='injerto<?php echo $value->id_breakdown; ?>' >
													<h4 class="green-margin">Injerto</h4>
													<b>Fecha:</b><?php echo $value->graft_date; ?>
												</div>												
												<div >&nbsp</div>
												<?php } 
												if($value->transplant_date!=null){
													$img='<img src="'. base_url() . 'img/infomrme_cliente/trasnplante.jpg" style="height: 500px;">';
													?>
												<div id='pinchado<?php echo $value->id_breakdown; ?>' >
													<h4 class="green-margin">Pinchado</h4>
													<b>Fecha:</b><?php echo $value->transplant_date; ?>
												</div>
												<div >&nbsp</div>
												<?php } 
												if($value->punch_date!=null){
													$img='<img src="'. base_url() . 'img/infomrme_cliente/pinchado.jpg" style="height: 500px;">';
													?>
												<div id='transplante<?php echo $value->id_breakdown; ?>' >
													<h4 class="green-margin">Transplante</h4>
													<b>Fecha:</b><?php echo $value->punch_date; ?>
												</div>
												<div >&nbsp</div>
												<?php } 
												if($value->pack_date!=null){
													$img='<img src="'. base_url() . 'img/infomrme_cliente/empaque.jpg" style="height: 500px;">';?>
												<div id='empaque<?php echo $value->id_breakdown; ?>' >
													<h4 class="green-margin">Empaque</h4>
													<b>Fecha:</b><?php echo $value->pack_date; ?>
												</div>
												<div >&nbsp</div>
												<?php } 
												if($value->embark_date!=null){
													$img='<img src="'. base_url() . 'img/infomrme_cliente/embarque.jpg" style="height: 500px;">';?>
												<div id='embarque<?php echo $value->id_breakdown; ?>' >
													<h4 class="green-margin">Embarque</h4>
													<b>Fecha:</b><?php echo $value->embark_date; ?>
												</div>
												<?php } ?>
											</div>
											<div class='col-xs-6'>
											
												
												<?php echo $img;?>
												
											</div>
										</div>
										<div >&nbsp</div>
										<div class='col-xs-12'>
											<div class='col-xs-6'>
												<h4 class="green-margin">Cualquier duda o comentario estamos a sus órdenes</h4>
												<h4><b>Teresa Ugalde</b></h4>
												<p style='margin-top: -15px;'>Atención a clientes</p>
												<p style='margin-top: -15px;'>t.ugalde@plantanova.com.mx</p>
												<p style='margin-top: -15px;'>(442) 229 1861 ext. 802</p>
											</div>
											<div class='col-xs-6' style='background-color: #D0E3CA !important; height:130px !important;'>
												<h4 style="color:#6BBD44 !important">Pagos</h4>
												<?php echo $value->pay_text; ?>							
											</div>
										</div>
										
								
									<div class='saltopagina'>
										<?php
										
										if ($value->userfile1 != null){
											?>
										<div class='col-xs-12'>
											<h4 style='color:#6BBD44 !important' align=center>Sus plantas avanzan así</h4>
											<div >&nbsp</div>
											<img src='/plantanova/uploads/<?php echo $value->userfile1?>' style='width:90%; height:350px; padding-left: 10%;'></a>
										</div>
										<div >&nbsp</div>
										<?php
										}
										if ($value->userfile2 != null){
											?>
										<div class='col-xs-12 pad'>
											<h4 style='color:#6BBD44 !important' align=center>Sus plantas avanzan así</h4>
											<div >&nbsp</div>
											<img src='/plantanova/uploads/<?php echo $value->userfile2?>' style='width:90%; height:350px; padding-left: 10%;'></a>
										</div>
										<div >&nbsp</div>
										<?php
										}
										if ($value->userfile3 != null){
											?>
										<div class='col-xs-12' >
											<h4 style='color:#6BBD44 !important' align=center>Sus plantas avanzan así</h4>
											<div >&nbsp</div>
											<img src='/plantanova/uploads/<?php echo $value->userfile3?>' style='width:90%; height:350px; padding-left: 10%;'></a>
										</div>
										<?php } ?>
									</div>	
									</div>
								</div>
								<?php } ?>
								</div>
								<div class='modal-footer'>
										<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
										<button type='submit' class='btn btn-success' name='printbuton<?php echo $key->id_order; ?>' id='printbuton<?php echo $key->id_order; ?>' onclick="imprSelec('seleccion<?php echo $key->id_order; ?>');">Imprimir</button>
								</div>
							</div>
						</div>
					</div>

					
					
					
		<?php 
				echo "</td>";
				}else{
					echo "Por el momento no se tiene informe de la orden</td>";
				}
				echo "<td>";
				?>
					<a href="#myModal1<?php echo $key->id_order; ?>" class="btn btn-default"
						title="Descargas"
						data-toggle="modal">
						<i class="fa fa-download"></i>
					</a>

					<div id="myModal1<?php echo $key->id_order; ?>" class='modal fade'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
									<h4 class='modal-title'>Descargas</h4>
								</div>
								<div class='modal-body'>
									<?php $files=$this->model_client->get_files_order($key->id_order);
									if(is_array($files)){
										foreach ($files as $key) {
											if($key->quotation != null){
												echo anchor(''.base_url('uploads/'.$key->quotation), 'Cotización', 'Download');
												echo "</br>";
											}
											if($key->contract != null){
												echo anchor(''.base_url('uploads/'.$key->contract), 'Contrato', 'Download');
												echo "</br>";
											}
										}
									}
									$files2=$this->model_client->get_files_order2($key->id_order);
									if(is_array($files2)){
										foreach ($files2 as $key) {
											if($key->location != null){
												if($key->id_files == 1){
													echo anchor(''.base_url('uploads/'.$key->location), 'Factura: folio '.$key->folio, 'Download');
													echo "</br>";
												}elseif ($key->id_files == 2) {
													echo anchor(''.base_url('uploads/'.$key->location), 'Carta Factura', 'Download');
													echo "</br>";
												}elseif ($key->id_files == 3) {
													echo anchor(''.base_url('uploads/'.$key->location), 'Dictamen', 'Download');
													echo "</br>";
												}else{
													echo anchor(''.base_url('uploads/'.$key->location), ''.$key->location, 'Download');
													echo "</br>";
												}
												
											}
										}
									}?>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
		                		</div>
							</div>
						</div>
					</div>


				<?php
				
					echo "</tr>";
				}
			}
		?>
		
</table>

<script type="text/javascript">
	function imprSelec(nombre) {
		var ficha = document.getElementById(nombre);
		var mywindow = window.open(' ', 'popimpr');
	    mywindow.document.write('<html><head><title></title>');
	    //mywindow.document.write('<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" type="text/css" />');
	    mywindow.document.write('<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css" type="text/css" />');
	    //mywindow.document.write('<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" type="text/css" />');
	    //mywindow.document.write('<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" type="text/css" />');

     	mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url()?>css/css/custom.css' type='text/css' />");
     	//mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url()?>css/css/TableTools.css' type='text/css' />");
     	
	  	mywindow.document.write('</head><body >');
	  	mywindow.document.write('<div style="padding-left: 40px;">');
	  	mywindow.document.write(ficha.innerHTML);
	  	mywindow.document.write('</div>');
	  	mywindow.document.write('</body></html>');
	 
	   	
	 	mywindow.print();
	 	mywindow.document.close();
		mywindow.close();
	}
</script>