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
								<?php foreach ($informs as $key) { ?>
								<div class='modal-body'>
									<h3><b><?php echo $key->client_name;?></b></h3>
										
									<div >&nbsp</div>
									<h3><?php echo $key->inform_text ?></h3>			                		
									<div>&nbsp</div>
									<div class='input-group input-group-lg'>
										<div class='col-xs-12'>
											<div class='col-xs-6'>
												<?php if($key->reception_date!=null){?>
												<div id='recepcion<?php echo $key->id_breakdown ?>' >
													<h3 style='color:#6BBD44'>Recepcion</h3>
													<b>Fecha: </b><?php echo $key->reception_date ?>
												</div>

												<div >&nbsp</div>
												<?php }
												if($key->variety!=null || $key->rootstock!=null){

												?>
												<div id='siembra_ger<?php echo $key->id_breakdown; ?>' >
													<h3 style='color:#6BBD44'>Siembra/Germinacion</h3>
												<?php }
												if($key->variety!=null){ ?>
													<div id='divvariety<?php echo $key->id_breakdown;?>' >
														<b>Variedad:</b><?php echo $key->variety; ?><br>
														<b>Fecha de Siembra:</b><?php echo $key->variety_sowing_date; ?><br>
														<b>% Germinacion:</b><?php echo $key->variety_germination; ?><br>
														<b>% Viabilidad:</b><?php echo $key->variety_viability; ?>
														<div >&nbsp</div>
													</div>
													<?php }
													if($key->rootstock!=null){?>
													<div id='divrootstock<?php echo $key->id_breakdown; ?>' >
														<b>Portainjerto:</b><?php echo $key->rootstock; ?><br>
														<b>Fecha de Siembra:</b><?php echo $key->rootstock_sowing_date; ?><br>
														<b>% Germinacion:</b><?php echo $key->rootstock_germination; ?><br>
														<b>% Viabilidad:</b><?php echo $key->rootstock_viability; ?>
													</div>
													<?php }
													if($key->variety!=null || $key->rootstock!=null){?>
												</div>
												<div >&nbsp</div>
												<?php } 
												if($key->graft_date!=null){?>
												<div id='injerto<?php echo $key->id_breakdown; ?>' >
													<h3 style='color:#6BBD44'>Injerto</h3>
													<b>Fecha:</b><?php echo $key->graft_date; ?>
												</div>												
												<div >&nbsp</div>
												<?php } 
												if($key->transplant_date!=null){?>
												<div id='pinchado<?php echo $key->id_breakdown; ?>' >
													<h3 style='color:#6BBD44'>Pinchado</h3>
													<b>Fecha:</b><?php echo $key->transplant_date; ?>
												</div>
												<div >&nbsp</div>
												<?php } 
												if($key->punch_date!=null){?>
												<div id='transplante<?php echo $key->id_breakdown; ?>' >
													<h3 style='color:#6BBD44'>Transplante</h3>
													<b>Fecha:</b><?php echo $key->punch_date; ?>
												</div>
												<div >&nbsp</div>
												<?php } 
												if($key->pack_date!=null){?>
												<div id='empaque<?php echo $key->id_breakdown; ?>' >
													<h3 style='color:#6BBD44'>Empaque</h3>
													<b>Fecha:</b><?php echo $key->pack_date; ?>
												</div>
												<div >&nbsp</div>
												<?php } 
												if($key->embark_date!=null){?>
												<div id='embarque<?php echo $key->id_breakdown; ?>' >
													<h3 style='color:#6BBD44'>Embarque</h3>
													<b>Fecha:</b><?php echo $key->embark_date; ?>
												</div>
												<?php } ?>
											</div>
											<div class='col-xs-6'>
											<h3 style='color:#6BBD44'>¿Como vamos?</h3>
												
												<p><input type='checkbox' name='check1<?php echo $key->id_breakdown; ?>' id='check1<?php echo $key->id_breakdown; ?>' value='1'/>Recepcion </p>
												<p><input type='checkbox' name='check2<?php echo $key->id_breakdown; ?>' id='check2<?php echo $key->id_breakdown; ?>' value='1'/>Siembra/Germinacion </p>
												<div id='siem_ger<?php echo $key->id_breakdown; ?>' >
													<p>&nbsp;&nbsp;<input type='checkbox' name='check21<?php echo $key->id_breakdown; ?>' id='check21<?php echo $key->id_breakdown; ?>' value='1'/>Variedad
													<input type='checkbox' name='check22<?php echo $key->id_breakdown; ?>' id='check22<?php echo $key->id_breakdown; ?>' value='1'/>Portainjerto </p>
												</div>
												<p><input type='checkbox' name='check3<?php echo $key->id_breakdown; ?>' id='check3<?php echo $key->id_breakdown; ?>' value='1'/>Injerto </p>
												<p><input type='checkbox' name='check4<?php echo $key->id_breakdown; ?>' id='check4<?php echo $key->id_breakdown; ?>' value='1'/>Pinchado </p>
												<p><input type='checkbox' name='check5<?php echo $key->id_breakdown; ?>' id='check5<?php echo $key->id_breakdown; ?>' value='1'/>Transplante </p>
												<p><input type='checkbox' name='check6<?php echo $key->id_breakdown; ?>' id='check6<?php echo $key->id_breakdown; ?>' value='1'/>Empaque </p>
												<p><input type='checkbox' name='check7<?php echo $key->id_breakdown; ?>' id='check7<?php echo $key->id_breakdown; ?>' value='1'/>Embarque </p>
												
											</div>
										</div>
										<div >&nbsp</div>
										<div class='col-xs-12'>
											<div class='col-xs-6'>
												<h3 style='color:#6BBD44'>Cualquier duda o comentario estamos a sus órdenes</h3>
												<h3><b>Teresa Ugalde</b></h3>
												<p style='margin-top: -15px;'>Atención a clientes</p>
												<p style='margin-top: -15px;'>t.ugalde@plantanova.com.mx</p>
												<p style='margin-top: -15px;'>(442) 229 1861 ext. 802</p>
											</div>
											<div class='col-xs-6' style='background-color: #D0E3CA; height:140px;'>
												<h3 style='color:#6BBD44'>Pagos</h3>
												<?php echo $key->pay_text; ?>							
											</div>
										</div>
										<div >&nbsp</div>
										<div class='col-xs-12'>
											<h3 style='color:#6BBD44' align=center>Sus plantas avanzan así</h3>
											<div >&nbsp</div>
											<img src='/plantanova/uploads/<?php echo $key->userfile1?>' style='width:100%; heigth:500px'></a>
										</div>
										<div >&nbsp</div>
										<div class='col-xs-12'>
											<h3 style='color:#6BBD44' align=center>Sus plantas avanzan así</h3>
											<div >&nbsp</div>
											<img src='/plantanova/uploads/<?php echo $key->userfile2?>' style='width:100%; heigth:500px'></a>
										</div>
										<div >&nbsp</div>
										<div class='col-xs-12'>
											<h3 style='color:#6BBD44' align=center>Sus plantas avanzan así</h3>
											<div >&nbsp</div>
											<img src='/plantanova/uploads/<?php echo $key->userfile3?>' style='width:100%; heigth:500px'></a>
										</div>
										
									</div>
								</div>
								<?php } ?>
								<div class='modal-footer'>
										<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
										<button type='submit' class='btn btn-success' name='print' id='embarcar'>Imprimir</button>
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