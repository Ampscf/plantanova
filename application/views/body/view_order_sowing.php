
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div id="result">						
					<div class="panel-body">					

						<div class="clear">&nbsp</div>
						<div class="col-md-12">
							<h2><span class="glyphicon glyphicon-list-alt"></span> &nbsp; Detalle del Pedido</h2>
							<hr>
						</div>
						
						<div class="col-md-6" style="width: 32%;">
								<div class="input-group input-group-lg">
									<p><b>Pedido: <?php echo $id_order;?></b></p>
								</div><!-- End nombre -->

								<div class="input-group input-group-lg">
									<p><b>Nombre Completo:</b> <?php echo $client->result()[0]->first_name." ".$client->result()[0]->last_name;?></p>
								</div><!-- End nombre -->
								<div class="input-group input-group-lg">
									<p><b>Correo:</b> <?php echo $client->result()[0]->mail;?></p>
								</div><!-- End correo -->
								<div class="input-group input-group-lg">
									<p><b>Telefono:</b> <?php echo $client->result()[0]->phone;?></p>
								</div><!-- End telefono -->
								<div class="input-group input-group-lg">
									<p><b>Calle/Colonia:</b> <?php echo $client->result()[0]->street." ".$client->result()[0]->colony;?></p>
								</div><!-- End calle/colonia -->
								<div class="input-group input-group-lg">
									<p><b>Número:</b> <?php echo $client->result()[0]->address_number;?></p>
								</div><!-- End numero -->
								<div class="input-group input-group-lg">
									<p><b>C.P:</b> <?php echo $client->result()[0]->cp;?></p>
								</div><!-- End cp -->
								<div class="input-group input-group-lg">
									<p><b>Razon Social:</b> <?php echo $client->result()[0]->social_reason;?></p>
								</div><!-- End Razon social -->


						
						</div>
						
						<div class="col-md-6">
							
							<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<p><b>Fecha:</b> <?php echo date("Y-m-d",strtotime($fecha))?></p>
								</div><!-- End Plant -->
								
								<div class="input-group input-group-lg">
									<p><b>Tipo de cultivo:</b> <?php echo $planta->result()[0]->plant_name;?></p>
								</div><!-- End Cultivo -->
								<div class="input-group input-group-lg">
									<p><b>Volumen Total:</b> <?php echo $volumen;?></p>
								</div><!-- End Volumen -->
								<div class="input-group input-group-lg">
									<p><b>Categoría:</b> <?php echo $categoria->result()[0]->category_name;?></p>
								</div><!-- End Plant -->
								<div class="input-group input-group-lg">
									<?php $restante="var"?>
									<p><b>Volumen restante:</b> <?php echo $restante;?></p>
								</div><!-- End Plant -->						
						</div>

						<div class="clear">&nbsp</div>
						
						<div class="col-md-12">
							<hr>
							<h3>Siembra</h3>
							<a href="#myModal" class="btn btn-success" data-toggle="modal" style="float: right; margin-bottom: 10px;" >+Agregar</a>
						</div>

						<!-- Modal HTML -->
						<?php 
						echo form_open('order/insert_sowing/'.$this->uri->segment(3)); 
						?>
					    <div id="myModal" class="modal fade">
					    	<div class="modal-dialog">
					            <div class="modal-content">
					                <div class="modal-header">
					                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                    <h4 class="modal-title">Desglose</h4>
					                </div>
					                <div class="modal-body">	
					                	<div class="input-group">
											<p>Variedad/Portainjerto</p>
											<select class="form-control" name="breakdown" id="breakdown" >
												<option value="-1" selected>---Selecciona una Variedad/Portainjerto---</option>
												<?php 
													foreach($breakdown as $key)
													{
														echo "<option value='" . $key->id_breakdown . "' set_select('breackdown','".$key->id_breakdown."')>" . $key->variety ." / ".$key->rootstock. "</option>";
													}
												?>	
											</select>
										</div><!-- End Cantidad -->				
										<div class="input-group">
											<p>Cantidad</p>
											<input type="text" class="form-control" placeholder="Cantidad" name="volume" id="volume">
										</div><!-- End Cantidad -->
										<div class="input-group">
											<p>Comentario</p>
											<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment"></textarea>										
										</div><!-- End Alcance -->				
					                </div>
					                <div class="modal-footer">
					                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					                    <input type="submit" class="btn btn-success" id="save" name="save" value="Guardar"></button>
					                </div>
					            </div>
					        </div>
					    </div>
					    </form><!--endform1-->
										
								
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_siembra.php'); ?>
						</div>
					</div>	

									
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-3 col-md-offset-1">
								<input class="btn btn-success btn-block" type="submit" value="Guardar"/>
							</div>
							<div class="col-md-3 col-md-offset-4">
								<?php  
									$data = array(
										'class'	=> 'btn btn-primary btn-block',
										'name' => 'Cancelar',
									);
									echo anchor('admin/list_clients', 'Cancelar', $data);
								?>
							</div>
						</div><!-- End row -->					
					</div>
				</div><!-- @end .result -->
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->
</div><!-- @end .container -->