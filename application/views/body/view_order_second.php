
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Hacer pedido nuevo </h3>
				</div>
				<div id="result">						
					<div class="panel-header">				
						<ul class="nav nav-tabs">
							<li><a>Cliente</a></li>
							<li><a>&rarr;</a></li>
							<li><a>Orden</a></li>
							<li><a>&rarr;</a></li>
							<li class="active"><a>Desglose</a></li>
							<li><a>&rarr;</a></li>
							<li><a>Resumen</a></li>
							<li style="position: relative; left:35%;"><a>Cliente: <?php echo $company[0]->farm_name; ?></a></li>

						</ul>
					</div>	
									
					<div class="panel-body">
						<div class="col-md-6">
							<h1>Contenido para desglose<h1>
						</div>
	
						

						<?php echo validation_errors(); ?>
						<input type="hidden" value="<?php echo $id_order->result()[0]->id_order;?>" id="id_order" name="id_order">

						<div class="clear">&nbsp</div>
						<div class="col-md-12">
							<h2><span class="glyphicon glyphicon-list-alt"></span> &nbsp; Datos de la orden</h2>
						</div>
						
						<div class="col-md-6" style="width: 32%;">
								<div class="input-group input-group-lg">
									<p># de orden: <?php echo $id_order->result()[0]->order_number;?></p>
								</div><!-- End Plant -->
								
								<div class="input-group input-group-lg">
									<p>Fecha: <?php echo date("d-m-Y",strtotime($fecha))?></p>
								</div><!-- End Plant -->
								
								<div class="input-group input-group-lg">
									<p>Tipo de cultivo: <?php echo $planta->result()[0]->plant_name;?></p>
								</div><!-- End Cultivo -->
								
						
						</div>
						
						<div class="col-md-6">
								<div class="input-group input-group-lg">
									<p>Volumen Total: <?php echo number_format($volumen);?></p>
								</div><!-- End Volumen -->
							
								<div class="input-group input-group-lg">
									<p>Categoría: <?php echo $categoria->result()[0]->category_name;?></p>
								</div><!-- End Plant -->
								<div class="input-group input-group-lg">
									<?php $restante=$volumen - $suma_volumen->result()[0]->volume;?>
									<p>Volumen restante: <?php echo number_format($restante);?></p>
								</div><!-- End Plant -->						
						</div>
						
						<div class="clear">&nbsp</div>
						<div class="col-md-9">					
								<div class="input-group input-group-lg">
									</p>
									<p><b>*Desglose de la orden:</b></p>
								</br>
								</div><!-- End Desglose -->					
						</div>
						
						<div class="col-md-3">					
								<div class="input-group input-group-lg">
									<a href="#myModal" class="btn btn-success" data-toggle="modal">+Agregar Desglose</a>
									
								</div><!-- End Desglose -->					
						</div>
						
						<!-- Tabla desglose -->
						<table>
							<th>Sustrato</th>
							<th>Subtipo</th>
							<th>Variedad</th>
							<th>PortaInjerto</th>
							<th>Volumen</th>
							<th>Borrar</th>
							
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
										echo "<td>" .number_format($key->volume) . "</td>";
										echo "<td>"?>
										<a href="#delModal<?php echo $key->id_breakdown;?>" class="btn btn-default"
						                    title="Eliminar"
						                    data-toggle="modal">
											<i class="fa fa-times"></i>
						                </a>
										
										<!-- Modal para eliminar -->
									    <div id="delModal<?php echo $key->id_breakdown;?>" class="modal fade">
									        <div class="modal-dialog">
									            <div class="modal-content">
									                <div class="modal-header">
									                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									                    <h4 class="modal-title">Confirmación </h4>
									                </div>
									                <div class="modal-body">
									                    <p>¿Estás seguro de querer eliminar este desglose?</p>
									                </div>
									                <div class="modal-footer">
														<?php echo form_open('order/delete_breakdown/'.$id_order->result()[0]->id_order); ?>
									                    	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									                    	<button type="submit" class="btn btn-success" name="<?php echo $key->id_breakdown;?>">Confirmar</button>
														<?php echo form_close();?>
									                </div>
									            </div>
									        </div>
									    </div>
										
										<?php
										echo "</td>";
										echo "</tr>";

									}
														
								}
								?>
							</tbody>
						</table>
						<?php 
						$attributes = array('id' => 'update','name' => 'update');
						echo form_open('order/pending_order_second_next_before',$attributes);
						?>
					    <!-- Modal HTML -->
					    <div id="myModal" class="modal fade">
					    	<div class="modal-dialog">
					            <div class="modal-content">
					                <div class="modal-header">
					                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                    <h4 class="modal-title">Desglose</h4>
					                </div>
					                <div class="modal-body">										
										<div class="input-group">
											<p>Sustrato</p>
											<select class="form-control" name="sustratum" id="sustratum" onchange="get_subtype(this.value);">
												<option value="-1" selected>---Selecciona un Sustrato---</option>
												<?php 
													foreach($sustratum as $key)
													{
														echo "<option value='" . $key->id_sustratum . "' set_select('sustratum','".$key->id_sustratum."')>" . $key->sustratum_name . "</option>";
													}
												?>	
											</select>
										</div><!-- End Sustrato -->
										<!--<?php echo form_error('sustratum'); ?>-->
										<div class="input-group">
											<p>Subtipo</p>
											<select class="form-control" name="subtype" id="subtype">
												<option value="-1" selected>---Selecciona un Subtipo---</option>
												<?php 
													foreach($subtype as $key)
													{
														echo "<option value='" . $key->id_subtype . "' set_select('subtype','".$key->id_subtype."')>" . $key->subtype_name . "</option>";
													}
												?>
											</select>
										</div><!-- End Subtipo -->
										<!--<?php echo form_error('subtype'); ?>-->
										<div class="input-group">
											<p>Variedad</p>
											<!--<input type="text" class="form-control" placeholder="Variedad" name="variety" id="variety" value="">-->
											<select class="form-control" name="variety" id="variety">
												<option value="-1" selected>---Selecciona una Variedad---</option>
												<?php 
													foreach($variety as $key)
													{
														echo "<option value='" . $key->variety_name . "' set_select('subtype','".$key->variety_name."')>" . $key->variety_name . "</option>";
													}
												?>
											</select>
										</div><!-- End Variedad -->
										<!--<?php //echo form_error('variety'); ?>-->
										<div class="input-group">
											<p>PortaInjerto</p>
											<!--<input type="text" class="form-control" placeholder="PortaInjerto" name="rootstock" id="rootstock" value="">-->
											<select class="form-control" name="rootstock" id="rootstock">
												<option value="-1" selected>---Selecciona un PortaInjerto---</option>
												<?php 
													foreach($rootstock as $key)
													{
														echo "<option value='" . $key->rootstock_name . "' set_select('subtype','".$key->rootstock_name."')>" . $key->rootstock_name . "</option>";
													}
												?>
											</select>
										</div><!-- End PortaInjerto -->
										<!--<?php //echo form_error('rootstock'); ?>-->										
										<div class="input-group">
											<p>Volumen</p>
											<input type="text" class="form-control" placeholder="Volumen" name="volume" id="volume" value="">
										</div><!-- End Volumen -->
										<!--<?php //echo form_error('volume'); ?>-->					
					                </div>
					                <div class="modal-footer">
					                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					                    <input type="submit" class="btn btn-success" id="save" name="save" value="Guardar"></button>
					                </div>
					            </div>
					        </div>
					    </div>					
					</div>
					<script>

					 $('#save').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});
					</script>
									
					<div class="panel-footer">
						<ul class="pager">
							
						<input type="hidden" id="id_company" name="id_company" value="<?php echo $id_company; ?>">
						<input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
						<input type="hidden" id="voltot" name="voltot" value="<?php echo $volumen; ?>">
						<input type="hidden" id="category" name="category" value="<?php echo $categ; ?>">
						<input type="hidden" id="id_plant" name="id_plant" value="<?php echo $id_plant; ?>">
						<input type="hidden"  id="id_order" name="id_order" value="<?php echo $id_order->result()[0]->id_order;?>">
						<input type="hidden" id="restante" name="restante" value="<?php echo $restante; ?>">

						<input type="submit" value="&larr; Anterior" class="btn btn-default" style="float: left;" id="before" name="before"/>
					    <input type="submit" value="Siguiente &rarr;" class="btn btn-default" style="float: right;" id="next" name="next"/>
						</ul>
					</div>
					<?php echo form_close();?>

					 <script>


					    
						$("#update").validate({
							rules: {
								variety: {
									variety: true
								},
								rootstock: {
									rootstock: true
								},
								volume: {
									required: true,
									number: true
								},
								sustratum: {
						            sustratum: true
						        },
						       subtype:{
						       		subtype: true
						       }
							},
							messages: {
				                volume: {
				                    required: "El Campo Volumen es Requerido",
				                    number: "El Campo Volumen debe ser Numerico"
				                }
						  	}
						});

						$.validator.addMethod("sustratum", sustratum, "Selecciona un Sustrato");
						$.validator.addMethod("subtype", subtype, "Selecciona un Subtipo");
						$.validator.addMethod("variety", variety, "Selecciona una Variedad");
						$.validator.addMethod("rootstock", rootstock, "Selecciona un PortaInjerto");

						function sustratum(){
							if (document.getElementById('sustratum').value < 0){
								return false;
							}else return true;
						}

						function subtype(){
							if (document.getElementById('subtype').value < 0){
								return false;
							}else return true;
						}

						function variety(){
							if (document.getElementById('variety').value < 0){
								return false;
							}else return true;
						}

						function rootstock(){
							if (document.getElementById('rootstock').value < 0){
								return false;
							}else return true;
						}

						
						</script>

				</div><!-- @end .result -->
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->
</div><!-- @end .container -->