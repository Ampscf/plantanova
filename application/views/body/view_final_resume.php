	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-body" id="seleccion">
						
						<div class="col-md-12">
							<h1>Resumen Orden Embarcada</h1>
						</div>
						
						<!--Datos del cliente-->
						<div class="clear">&nbsp</div>	
						<div class="col-md-12">
							<h4><b>*Datos del cliente</b></h4>
						</div>
						
						<div class="col-md-6" style="width: 39%;">
							<div class="input-group input-group-lg">
								<p>Nombre Completo: <?php echo $company->result()[0]->first_name . " " . $company->result()[0]->last_name;?></p>
							</div>
							
							<div class="input-group input-group-lg">
								<p>Correo Electrónico: <?php echo $company->result()[0]->mail;?></p>
							</div>
							
							<div class="input-group input-group-lg">
								<p>Teléfono: <?php echo  $company->result()[0]->phone;?></p>
							</div>
							
							<div class="input-group input-group-lg">
								<p>Calle/Colonia: <?php echo $company->result()[0]->street . " " . $company->result()[0]->colony;?></p>
							</div>
							
						</div>
						
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<p>Número #: <?php echo $company->result()[0]->address_number;?></p>
							</div>
							
							<div class="input-group input-group-lg">
								<p>CP: <?php echo $company->result()[0]->cp;?></p>
							</div>
						
							<div class="input-group input-group-lg">
								<p>Razón Social: <?php echo $company->result()[0]->social_reason;?></p>
							</div>
							
						</div>
						<!--Fin datos del cliente-->
						
						<!--Datos del pedido-->
						<div class="clear">&nbsp</div>		
						<div class="col-md-12">
							<h4><b>*Datos del pedido</b></h4>
						</div>
						
						<div class="col-md-6"style="width: 39%;">
							<div class="input-group input-group-lg">
								<p>Fecha: <?php echo date("y-m-d", strtotime($order->result()[0]->order_date_delivery));?></p>
							</div>
							
							<div class="input-group input-group-lg">
								<p>Tipo de cultivo: <?php echo $plant->result()[0]->plant_name;?></p>
							</div>
							
							<div class="input-group input-group-lg">
								<p>Volumen total: <?php echo $order->result()[0]->total_volume;?></p>
							</div>
							
						</div>
						
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<p>Categoría: <?php echo $category->result()[0]->category_name;?></p>
							</div>
							
							<div class="input-group input-group-lg">
								<p>Brazos: <?php echo $order->result()[0]->branch_number;?></p>
							</div>
							
							<div class="input-group input-group-lg">
								<p>Tutoreo: <?php echo $order->result()[0]->tutoring;?></p>
							</div>
						</div>
						<!--Fin datos del pedido-->
						
						<!--Desglose de la orden-->
						<div class="clear">&nbsp</div>					
						<div class="input-group input-group-lg">
							<h4><b>*Desglose de la orden:</b></h4>
						</div>
						<div class="clear">&nbsp</div>
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
										echo "<td>" . $key->volume . "</td>";
										echo "</tr>";
									}
								}
								?>
							</tbody>
						</table>
						<!--Fin desglose de la orden-->
						
						<!--Desglose de la siembra-->
						<div class="clear">&nbsp</div>					
						<div class="input-group input-group-lg">
							<h4><b>*Desglose de la siembra:</b></h4>
						</div>
						<div class="clear">&nbsp</div>
						<table>
							<th>Cantidad</th>
							<th>Fecha</th>
							<th>Semilla</th>
							<th>Comentario</th>
							
							<?php 
							if(is_array($sowing))
							{
								foreach ($sowing as $key) 
								{
									echo "<tr>";
									echo "<td>" . $key->volume . "</td>";
									echo "<td>" . date("d-m-Y",strtotime($key->sowing_date)) . "</td>";
									//$breakdownn=$this->model_order->get_breakdown_id_breakdown($key->id_breakdown);
									echo "<td>" .$key->seed. "</td>";
									if($key->comment != null){
									echo "<td>" ?>

										<a href="#myModal2<?php echo $key->id_sowing; ?>" class="btn btn-default"
						                    title="Comentario"
						                    data-toggle="modal">
											<i class="fa fa-comment-o"></i>
						                </a>
										
										<div id="myModal2<?php echo $key->id_sowing;  ?>" class="modal fade">
					        				<div class="modal-dialog">
					            				<div class="modal-content">
					                				<div class="modal-header">
					                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                    				<h4 class="modal-title">Comentario</h4>
					                				</div>
					                				<div class="modal-body">
					                    				<p><?php echo $key->comment;?></p>
					                				</div>
					                				<div class="modal-footer">
					                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					                    			</div>
					            				</div>
					        				</div>
					    				</div>
					    			
					    			<?php
					    			}else{
					    			echo "<td>N/A";
					    			} 
					    			echo "</td>";?>
									<?php 
									echo "</td>";
									echo "</tr>";
								}
							}
						?>
	
						</table>
						<!--Fin desglose de la siembra-->
						
						<!--Desglose de la germinación-->
						<div class="clear">&nbsp</div>					
						<div class="input-group input-group-lg">
							<h4><b>*Desglose de la germinación:</b></h4>
						</div>
						<div class="clear">&nbsp</div>
						<table>
							<th>Semilla</th>
							<th>Cantidad Viable</th>
							<th>Fecha</th>
							<th>% Germinación</th>
							<th>Viabilidad</th>
							<th>Comentario</th>
							
							<?php 
									if(is_array($germination))
									{
										foreach ($germination as $key) 
										{
											echo "<tr>";
											echo "<td>".$key->seed_name."</td>";
											echo "<td>" . $key->volume . "</td>";
											echo "<td>" . date("d-m-Y",strtotime($key->germ_date)) . "</td>";
											
											if($key->germ_percentage==0){
												echo "<td></td>";
											}else{
												echo "<td>".$key->germ_percentage."%"."</td>";	
											}
											if($key->viability==0){
												echo "<td></td>";
											}else{
												echo "<td>" . $key->viability ."%". "</td>";
											}
											if($key->comment != null){
											echo "<td>" ?>

												<a href="#myModal2<?php echo $key->id_process; ?>" class="btn btn-default"
								                    title="Comentario"
								                    data-toggle="modal">
													<i class="fa fa-comment-o"></i>
								                </a>
												
												<div id="myModal2<?php echo $key->id_process;  ?>" class="modal fade">
							        				<div class="modal-dialog">
							            				<div class="modal-content">
							                				<div class="modal-header">
							                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							                    				<h4 class="modal-title">Comentario</h4>
							                				</div>
							                				<div class="modal-body">
							                    				<p><?php echo $key->comment;?></p>
							                				</div>
							                				<div class="modal-footer">
							                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							                    			</div>
							            				</div>
							        				</div>
							    				</div>
							    			
							    			<?php
							    			}else{
							    			echo "<td>N/A";
							    			} 
							    			echo "</td>";
						
							
											echo "</td>";
											echo "</tr>";
										}
									}
									?>
						</table>
						<!--Fin desglose de la germinación-->
						
						<!--Desglose de la injerto-->
						<div class="clear">&nbsp</div>					
						<div class="input-group input-group-lg">
							<h4><b>*Desglose del injerto:</b></h4>
						</div>
						<div class="clear">&nbsp</div>
						<table>
							<th>Cantidad</th>
							<th>Fecha</th>
							<th>Variedad/Portainjerto</th>
							<th>Comentario</th>
							
							<?php 
								if(is_array($graft))
								{
									foreach ($graft as $key) 
									{
										echo "<tr>";
										echo "<td>" . $key->volume . "</td>";
										echo "<td>" . date("d-m-Y",strtotime($key->process_date)) . "</td>";
										$breakdownn=$this->model_order->get_breakdown_id_breakdown($key->id_breakdown);
										echo "<td>" .$breakdownn[0]->variety."/".$breakdownn[0]->rootstock. "</td>";
										if($key->comment != null){
										echo "<td>" ?>

											<a href="#myModal21<?php echo $key->id_process; ?>" class="btn btn-default"
							                    title="Comentario"
							                    data-toggle="modal">
												<i class="fa fa-comment-o"></i>
							                </a>
											
											<div id="myModal21<?php echo $key->id_process;  ?>" class="modal fade">
						        				<div class="modal-dialog">
						            				<div class="modal-content">
						                				<div class="modal-header">
						                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                    				<h4 class="modal-title">Comentario</h4>
						                				</div>
						                				<div class="modal-body">
						                    				<p><?php echo $key->comment;?></p>
						                				</div>
						                				<div class="modal-footer">
						                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						                    			</div>
						            				</div>
						        				</div>
						    				</div>
						    			
						    			<?php
						    			}else{
						    			echo "<td>N/A";
						    			} 
						    			echo "</td>";										
										echo "</tr>";
									}
								}
								?>
						</table>
						<!--Fin desglose de la injerto-->
						
						<!--Desglose de la pinchado-->
						<div class="clear">&nbsp</div>					
						<div class="input-group input-group-lg">
							<h4><b>*Desglose del pinchado:</b></h4>
						</div>
						<div class="clear">&nbsp</div>
						<table>
								<th>Cantidad</th>
								<th>Fecha</th>
								<th>Variedad/Portainjerto</th>
								<th>Comentario</th>
								
								<?php 
									if(is_array($punch))
									{
										foreach ($punch as $key) 
										{
											echo "<tr>";
											echo "<td>" . $key->volume . "</td>";
											echo "<td>" . date("d-m-Y",strtotime($key->process_date)) . "</td>";
											$breakdownn=$this->model_order->get_breakdown_id_breakdown($key->id_breakdown);
											echo "<td>" .$breakdownn[0]->variety."/".$breakdownn[0]->rootstock. "</td>";
											if($key->comment != null){
											echo "<td>" ?>

												<a href="#myModal2<?php echo $key->id_process; ?>" class="btn btn-default"
								                    title="Comentario"
								                    data-toggle="modal">
													<i class="fa fa-comment-o"></i>
								                </a>
												
												<div id="myModal2<?php echo $key->id_process;  ?>" class="modal fade">
							        				<div class="modal-dialog">
							            				<div class="modal-content">
							                				<div class="modal-header">
							                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							                    				<h4 class="modal-title">Comentario</h4>
							                				</div>
							                				<div class="modal-body">
							                    				<p><?php echo $key->comment;?></p>
							                				</div>
							                				<div class="modal-footer">
							                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							                    			</div>
							            				</div>
							        				</div>
							    				</div>
							    			
							    			<?php
							    			}else{
							    			echo "<td>N/A";
							    			} 
							    			echo "</td>";
											echo "</tr>";
										}
									}
									?>
						</table>
						<!--Fin desglose de la pinchado-->
						
						<!--Desglose de la transplante-->
						<div class="clear">&nbsp</div>					
						<div class="input-group input-group-lg">
							<h4><b>*Desglose del transplante</b></h4>
						</div>
						<div class="clear">&nbsp</div>
						<table>
							<th>Cantidad</th>
							<th>Fecha</th>
							<th>Variedad/Portainjerto</th>
							<th>Comentario</th>
							
								<?php 
									if(is_array($transplant))
									{
										foreach ($transplant as $key) 
										{
											echo "<tr>";
											echo "<td>" . $key->volume . "</td>";
											echo "<td>" . date("d-m-Y",strtotime($key->process_date)) . "</td>";
											$breakdownn=$this->model_order->get_breakdown_id_breakdown($key->id_breakdown);
											echo "<td>" .$breakdownn[0]->variety."/".$breakdownn[0]->rootstock. "</td>";
											if($key->comment != null){
											echo "<td>" ?>

												<a href="#myModal2<?php echo $key->id_process; ?>" class="btn btn-default"
								                    title="Comentario"
								                    data-toggle="modal">
													<i class="fa fa-comment-o"></i>
								                </a>
												
												<div id="myModal2<?php echo $key->id_process;  ?>" class="modal fade">
							        				<div class="modal-dialog">
							            				<div class="modal-content">
							                				<div class="modal-header">
							                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							                    				<h4 class="modal-title">Comentario</h4>
							                				</div>
							                				<div class="modal-body">
							                    				<p><?php echo $key->comment;?></p>
							                				</div>
							                				<div class="modal-footer">
							                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							                    			</div>
							            				</div>
							        				</div>
							    				</div>
							    			
							    			<?php
							    			}else{
							    			echo "<td>N/A";
							    			} 
							    			echo "</td>";
											echo "</tr>";
										}
									}
									?>
						</table>
						</div>
						<div class="panel-footer">
						<div class="row">
							<div class="col-md-2 col-md-offset-2">
							<?php  
								$data = array(
									'class'	=> 'btn btn-primary btn-block',
									'name' => 'Regresar',
								);
								echo anchor('breakdown/pedido_embarcado', 'Regresar', $data);
							?>
							</div>
							<div class="col-md-4 col-md-offset-3">
								<input type="button" name="imprimir" class="btn btn-primary btn-success" value="Imprimir" onclick="imprSelec('seleccion');" style="width: 134px;">
							</div>
						</div>	
					</div><!-- fin panel footer -->	
					
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->


<script language="Javascript">
	function imprSelec(nombre) {
		var ficha = document.getElementById(nombre);
		var ventimp = window.open(' ', 'popimpr');;
	  
	  	ventimp.document.write(ficha.innerHTML);
	 
	  	ventimp.document.close();
	  	ventimp.print();
	  	ventimp.close();
	}
</script>