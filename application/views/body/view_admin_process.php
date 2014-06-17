<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
				
					<div class="clear">&nbsp</div>
					<div class="col-md-12">
						<h3><span class="glyphicon glyphicon-th-large"></span> DETALLE DEL PEDIDO</h3>
					</div>
					
					<div class="col-md-12">
						<hr/>
					</div>
					
					<div class="col-md-12">
						<div class="input-group input-group-lg">
							<p><b>Pedido: <?php echo $id_order;?></b></p>
						</div><!-- End nombre -->
						
						<div class="col-md-6">
						
							<div class="input-group input-group-lg">
								<p><b>Nombre Completo: <?php echo $client->result()[0]->first_name." ".$client->result()[0]->last_name;?></b></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Correo Electrónico: <?php echo $client->result()[0]->mail;?></b></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Teléfono: <?php echo $client->result()[0]->phone;?></b></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Calle/Colonia: <?php echo $client->result()[0]->street." ".$client->result()[0]->colony;?></b></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Número: <?php echo $client->result()[0]->address_number;?></b></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>CP: <?php echo $client->result()[0]->cp;?></b></p>
							</div><!-- End nombre -->
						
						</div>
						
						<div class="col-md-6">
							
							<div class="input-group input-group-lg">
								<p><b>Razón Social: <?php echo $client->result()[0]->social_reason;?></b></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Fecha: <?php echo date("Y-m-d",strtotime($fecha))?></b></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Tipo de cultivo: <?php echo $planta->result()[0]->plant_name;?></b></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Volumen Total: <?php echo $volumen;?></b></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Categoría: <?php echo $categoria->result()[0]->category_name;?></b></p>
							</div><!-- End nombre -->
							
							<div class="input-group input-group-lg">
								<p><b>Volumen Plantado: var</b></p>
							</div><!-- End nombre -->
							
						</div>
						
					</div>
					
					<div class="col-md-12">
						<hr/>
					</div>
					
					<div class="col-md-12">
						<div class="col-md-10">
							<h4>Germinación</h4>
						</div>
						<div class="col-md-2">
							<a href="#myModal" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_germinacion.php'); ?>
						</div>
					</div>
					
					<div class="clear">&nbsp</div>
					<div class="col-md-12">
						<div class="col-md-10">
							<h4>Injerto</h4>
						</div>
						<div class="col-md-2">
							<a href="#myModal1" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						<div class="clear">&nbsp</div>
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_injerto.php'); ?>
						</div>
					</div>
					
					<div class="clear">&nbsp</div>
					<div class="col-md-12">
						<div class="col-md-10">	
							<h4>Plantado</h4>
						</div>
						<div class="col-md-2">
							<a href="#myModal2" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						<div class="clear">&nbsp</div>
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_plantado.php'); ?>
						</div>
					</div>
					
					<div class="clear">&nbsp</div>
					<div class="col-md-12">
						<div class="col-md-10">	
							<h4>Transplante</h4>
						</div>
						<div class="col-md-2">
							<a href="#myModal3" class="btn btn-success" data-toggle="modal">+Agregar</a>
						</div>
						<div class="clear">&nbsp</div>
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_transplante.php'); ?>
						</div>
					</div>
					
				</div>
			<div>
			
			<div id="myModal" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Germinación</h4>
                		</div>
                		<div class="modal-body">
							<div class="input-group">
								<p>Variedad/Portainjerto</p>
								<select class="form-control" name="breakdown" id="breakdown" >
									<option value="-1" selected>---Selecciona una Variedad/Portainjerto---</option>
										<?php 
											/*foreach($breakdown as $key)
											{
												echo "<option value='" . $key->id_breakdown . "' set_select('breackdown','".$key->id_breakdown."')>" . $key->variety ." / ".$key->rootstock. "</option>";
											}*/
										?>	
								</select>
							</div><!-- End Cantidad -->
							<div class="input-group">
								<p>Cantidad</p>
								<input type="text" class="form-control" placeholder="Cantidad" name="volume" id="volume">
							</div><!-- End Cantidad -->	
							<div class="input-group">
								<p>Viabilidad</p>
								<input type="text" class="form-control" placeholder="Viabilidad" name="viability" id="viability">
							</div><!-- End Viabilidad -->
							<div class="input-group">
								<p>Comentario</p>
								<textarea class="form-control" rows="4" style="height: auto;" id="comment" name="comment"></textarea>										
							</div><!-- End Alcance -->	                    		
                		</div>
                		<div class="modal-footer">
							<?php echo form_open('order/delete_sowing/'.$this->uri->segment(3)); ?>
                    			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    			<button type="submit" class="btn btn-success" name="">Confirmar</button>
                			</form>
						</div>
            		</div>
        		</div>
    		</div>
			
			<div id="myModal1" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Germinación</h4>
                		</div>
                		<div class="modal-body">
                    		<p>¿Estás seguro de querer eliminar este registro?</p>
                		</div>
                		<div class="modal-footer">
							<?php echo form_open('order/delete_sowing/'.$this->uri->segment(3)); ?>
                    			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    			<button type="submit" class="btn btn-success" name="">Confirmar</button>
                			</form>
						</div>
            		</div>
        		</div>
    		</div>
			
			<div id="myModa2" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Germinación</h4>
                		</div>
                		<div class="modal-body">
                    		<p>¿Estás seguro de querer eliminar este registro?</p>
                		</div>
                		<div class="modal-footer">
							<?php echo form_open('order/delete_sowing/'.$this->uri->segment(3)); ?>
                    			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    			<button type="submit" class="btn btn-success" name="">Confirmar</button>
                			</form>
						</div>
            		</div>
        		</div>
    		</div>
			
			<div id="myModa3" class="modal fade">
        		<div class="modal-dialog">
            		<div class="modal-content">
                		<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    		<h4 class="modal-title">Germinación</h4>
                		</div>
                		<div class="modal-body">
                    		<p>¿Estás seguro de querer eliminar este registro?</p>
                		</div>
                		<div class="modal-footer">
							<?php echo form_open('order/delete_sowing/'.$this->uri->segment(3)); ?>
                    			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    			<button type="submit" class="btn btn-success" name="">Confirmar</button>
                			</form>
						</div>
            		</div>
        		</div>
    		</div>
		
		</div>
	</div>
</div> <!-- End content div -->