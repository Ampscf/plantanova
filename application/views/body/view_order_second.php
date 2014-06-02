<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div id="result">						
					<div class="panel-header">				
						<ul class="nav nav-tabs">
							<li><a>Cliente</a></li>
							<li><a>Orden</a></li>
							<li class="active"><a>Desglose</a></li>
							<li><a>Resumen</a></li>
							<li style="position: relative; left:50%;"><a>Cliente: <?php echo $company->farm_name; ?></a></li>

						</ul>
					</div>	
									
					<div class="panel-body">
						<?php 
						$attributes = array('id' => 'update','name' => 'update');
						echo form_open('order/pending_order_second_next_before',$attributes);
						?>
						<input type="hidden" id="id_company" name="id_company" value="<?php echo $id_company; ?>">
						<input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
						<input type="hidden" id="voltot" name="voltot" value="<?php echo $volumen; ?>">
						<input type="hidden" id="category" name="category" value="<?php echo $categ; ?>">
						<input type="hidden" id="id_plant" name="id_plant" value="<?php echo $id_plant; ?>">
						<div class="col-md-12">
							<h1>Contenido para desglose<h1>
						</div>
						<input type="hidden" value="<?php echo $id_order->result()[0]->id_order;?>" id="id_order" name="id_order">
						<div class="clear">&nbsp</div>
						<div class="col-md-12">
							<h3><span class="glyphicon glyphicon-list-alt"></span>Datos de la orden</h3>
						</div>
						
						<div class="col-md-6">
								<div class="input-group input-group-lg">
									<p>Fecha: <?php echo $fecha?></p>
								</div><!-- End Plant -->
								
								<div class="input-group input-group-lg">
									<p>Tipo de cultivo: <?php echo $planta->result()[0]->plant_name;?></p>
								</div><!-- End Cultivo -->
								<div class="input-group input-group-lg">
									<p>Volumen Total: <?php echo $volumen;?></p>
								</div><!-- End Volumen -->
						
						</div>
						
						<div class="col-md-6">
							
							<div class="clear">&nbsp</div>
								<div class="input-group input-group-lg">
									<p>Categoría: <?php echo $categoria->result()[0]->category_name;?></p>
								</div><!-- End Plant -->
								<div class="input-group input-group-lg">
									<?php $restante=$volumen - $suma_volumen->result()[0]->volume;?>
									<p>Volumen restante: <?php echo $restante;?></p>
								</div><!-- End Plant -->						
						</div>
						
						<div class="clear">&nbsp</div>
						<div class="col-md-9">					
								<div class="input-group input-group-lg">
									<p>*Desglose de la orden:</p>
								</div><!-- End Desglose -->					
						</div>
						
						<div class="col-md-3">					
								<div class="input-group input-group-lg">
									<a href="#myModal" class="btn btn-default" data-toggle="modal">+Agregar</a>
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
								if(isset($breakdown))
								{
									foreach ($breakdown as $key) 
									{ 
										$subtype_a=$this->model_order->get_id_sustratum($key->id_subtype);
										$subtype_name_a=$subtype_a->result()[0]->subtype_name;
										$sustratum_a=$this->model_order->get_sustratum_id($subtype_a->result()[0]->id_sustratum);
										$sustratum_name_a=$sustratum_a->result()[0]->sustratum_name;
										//$variety_a=$this->model_order->get_variety_id($key->id_variety);
										//$variety_name_a=$variety_a->result()[0]->variety_name;
										//$rootstock_a=$this->model_order->get_rootstock_id($key->id_rootstock);
										//$rootstock_name_a=$rootstock_a->result()[0]->rootstock_name;
										echo "<tr>";
										echo "<td>" . $sustratum_name_a . "</td>";
										echo "<td>" . $subtype_name_a . "</td>";
										echo "<td>" . $key->variety . "</td>";
										echo "<td>" . $key->rootstock . "</td>";
										echo "<td>" . $key->volume . "</td>";
										echo "<td>"?>
										<a href="#" class="btn btn-default"
						                    title="Eliminar"
						                    data-toggle="modal">
											<i class="fa fa-times"></i>
						                </a><?php
										echo "</td>";
										echo "</tr>";

									}
														
								}
								?>
							</tbody>
						</table>
						
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
										<div class="input-group">
											<p>Variedad</p>
											<select class="form-control" name="variety" id="variety">
												<option value="-1" selected>---Selecciona una Variedad---</option>
												<?php 
													foreach($variety as $key)
													{
														echo "<option value='" . $key->id_variety . "' set_select('sustratum','".$key->id_variety."')>" . $key->variety_name . "</option>";
													}
												?>	
											</select>
										</div><!-- End Variedad -->
										<div class="input-group">
											<p>PortaInjerto</p>
											<select class="form-control" name="rootstock" id="rootstock">
												<option value="-1" selected>---Selecciona un PortaIngerto---</option>
												<?php 
													foreach($rootstock as $key)
													{
														echo "<option value='" . $key->id_rootstock . "' set_select('sustratum','".$key->id_rootstock."')>" . $key->rootstock_name . "</option>";
													}
												?>	
											</select>
										</div><!-- End PortaInjerto -->										
										<div class="input-group">
											<p>Volumen</p>
											<input type="text" class="form-control" placeholder="Volumen" name="volume" id="volume" value="">
										</div><!-- End Volumen -->						
					                </div>
					                <div class="modal-footer">
					                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					                    <input type="submit" class="btn btn-success" id="save" name="save" value="Guardar"></button>
					                </div>
					            </div>
					        </div>
					    </div>
					
					</div>
									
					<div class="panel-footer">
						<ul class="pager">
							<input type="submit" value="&larr; Anterior" class="btn btn-default" style="float: left;" id="before" name="before"/>
					        <input type="submit" value="Siguiente &rarr;" class="btn btn-default" style="float: right;" id="next" name="next"/>
						</ul>
					</div>
					<?php echo form_close();?>
				</div><!-- @end .result -->
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->
</div><!-- @end .container -->