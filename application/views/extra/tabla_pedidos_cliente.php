<table class="table table-hover" id="tabla-pedidos">
	
		<th class="col-md-1"># Pedido</th>
		<th>Volumen</th>
		<th>Fecha</th>
		<th>Planta</th>
		<th>Categoria</th>
		<th>Estatus</th>
		<th>Informe</th>

	
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
						title="Eliminar"
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
									
									<img src="<?php echo base_url()?>img/Resumen-de-proceso.png" style="margin-left: -35px;width:100%">
									
									<h4><b><?php echo $value->client_name;?></b></h4>
										
									<h4><?php echo $value->inform_text ?></h4>			                		
									<div>&nbsp</div>
									<div class='input-group input-group-lg'>
										<div class='col-xs-12'>
											<div class='col-xs-6'>
												<?php if($value->reception_date!=null){?>
												<div id='recepcion<?php echo $value->id_breakdown ?>' >
													<h4 class="green-margin">Recepcion</h4>
													<b>Fecha: </b><?php echo $value->reception_date ?>
												</div>

												<div >&nbsp</div>
												<?php }
												if($value->variety!=null || $value->rootstock!=null){

												?>
												<div id='siembra_ger<?php echo $value->id_breakdown; ?>' >
													<h4 class="green-margin">Siembra/Germinacion</h4>
												<?php }
												if($value->variety!=null){ ?>
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
												if($value->graft_date!=null){?>
												<div id='injerto<?php echo $value->id_breakdown; ?>' >
													<h4 class="green-margin">Injerto</h4>
													<b>Fecha:</b><?php echo $value->graft_date; ?>
												</div>												
												<div >&nbsp</div>
												<?php } 
												if($value->transplant_date!=null){?>
												<div id='pinchado<?php echo $value->id_breakdown; ?>' >
													<h4 class="green-margin">Pinchado</h4>
													<b>Fecha:</b><?php echo $value->transplant_date; ?>
												</div>
												<div >&nbsp</div>
												<?php } 
												if($value->punch_date!=null){?>
												<div id='transplante<?php echo $value->id_breakdown; ?>' >
													<h4 class="green-margin">Transplante</h4>
													<b>Fecha:</b><?php echo $value->punch_date; ?>
												</div>
												<div >&nbsp</div>
												<?php } 
												if($value->pack_date!=null){?>
												<div id='empaque<?php echo $value->id_breakdown; ?>' >
													<h4 class="green-margin">Empaque</h4>
													<b>Fecha:</b><?php echo $value->pack_date; ?>
												</div>
												<div >&nbsp</div>
												<?php } 
												if($value->embark_date!=null){?>
												<div id='embarque<?php echo $value->id_breakdown; ?>' >
													<h4 class="green-margin">Embarque</h4>
													<b>Fecha:</b><?php echo $value->embark_date; ?>
												</div>
												<?php } ?>
											</div>
											<div class='col-xs-6'>
											<h4 style='color:#6BBD44'>¿Como vamos?</h4>
												
												<p><input type='checkbox' name='check1<?php echo $value->id_breakdown; ?>' id='check1<?php echo $value->id_breakdown; ?>' value='1'/>Recepcion </p>
												<p><input type='checkbox' name='check2<?php echo $value->id_breakdown; ?>' id='check2<?php echo $value->id_breakdown; ?>' value='1'/>Siembra/Germinacion </p>
												<div id='siem_ger<?php echo $value->id_breakdown; ?>' >
													<p>&nbsp;&nbsp;<input type='checkbox' name='check21<?php echo $value->id_breakdown; ?>' id='check21<?php echo $value->id_breakdown; ?>' value='1'/>Variedad
													<input type='checkbox' name='check22<?php echo $value->id_breakdown; ?>' id='check22<?php echo $value->id_breakdown; ?>' value='1'/>Portainjerto </p>
												</div>
												<p><input type='checkbox' name='check3<?php echo $value->id_breakdown; ?>' id='check3<?php echo $value->id_breakdown; ?>' value='1'/>Injerto </p>
												<p><input type='checkbox' name='check4<?php echo $value->id_breakdown; ?>' id='check4<?php echo $value->id_breakdown; ?>' value='1'/>Pinchado </p>
												<p><input type='checkbox' name='check5<?php echo $value->id_breakdown; ?>' id='check5<?php echo $value->id_breakdown; ?>' value='1'/>Transplante </p>
												<p><input type='checkbox' name='check6<?php echo $value->id_breakdown; ?>' id='check6<?php echo $value->id_breakdown; ?>' value='1'/>Empaque </p>
												<p><input type='checkbox' name='check7<?php echo $value->id_breakdown; ?>' id='check7<?php echo $value->id_breakdown; ?>' value='1'/>Embarque </p>
												
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
											<div class='col-xs-6' style='background-color: #D0E3CA !important; height:140px !important;'>
												<h4 style="color:#6BBD44 !important">Pagos</h4>
												<?php echo $value->pay_text; ?>							
											</div>
										</div>
										
								
									<div class='saltopagina'>
										<div class='col-xs-12'>
											<h4 style='color:#6BBD44 !important' align=center>Sus plantas avanzan así</h4>
											<div >&nbsp</div>
											<img src='/plantanova/uploads/<?php echo $value->userfile1?>' style='width:100%; heigth:500px'></a>
										</div>
										<div >&nbsp</div>

										<div class='col-xs-12'>
											<h4 style='color:#6BBD44 !important' align=center>Sus plantas avanzan así</h4>
											<div >&nbsp</div>
											<img src='/plantanova/uploads/<?php echo $value->userfile2?>' style='width:100%; heigth:500px'></a>
										</div>
										<div >&nbsp</div>
										
										<div class='col-xs-12 pad' >
											<h4 style='color:#6BBD44 !important' align=center>Sus plantas avanzan así</h4>
											<div >&nbsp</div>
											<img src='/plantanova/uploads/<?php echo $value->userfile3?>' style='width:100%; heigth:500px'></a>
										</div>
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
	 
	  	mywindow.document.close();
	  	mywindow.print();
	  	mywindow.close();
	}
</script>