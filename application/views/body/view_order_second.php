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
						<div class="col-md-12">
							<h1>Contenido para desglose<h1>
						</div>
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
									<p>Volumen restante: <?php echo "var";?></p>
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
								if(isset($desgloses))
								{
								
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
											<select class="form-control" name="plant" id="plant">
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
											<select class="form-control" name="plant" id="plant">
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
											<input type="text" class="form-control" placeholder="Variedad" name="variety" id="variety" value="">
										</div><!-- End Variedad -->
										<div class="input-group">
											<p>PortaInjerto</p>
											<input type="text" class="form-control" placeholder="PortaInjerto" name="rootstock" id="rootstock" value="">
										</div><!-- End PortaInjerto -->										
										<div class="input-group">
											<p>Volumen</p>
											<input type="text" class="form-control" placeholder="Volumen" name="volume" id="volume" value="">
										</div><!-- End Volumen -->						
					                </div>
					                <div class="modal-footer">
					                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					                    <button type="button" class="btn btn-success">Guardar</button>
					                </div>
					            </div>
					        </div>
					    </div>
					
					</div>
									
					<div class="panel-footer">
						<ul class="pager">
							<li id="page1" class="previous"><a href="#">&larr; Anterior</a></li>
							<li id="page3" class="next"><a href="#">Siguiente &rarr;</a></li>
						</ul>
					</div>
				</div><!-- @end .result -->
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->
</div><!-- @end .container -->