				<div class="panel-header">
				<ul class="nav nav-tabs">
					<li><a>Cliente</a></li>
					<li class="active"><a>Orden</a></li>
					<li><a>Desglose</a></li>
					<li><a>Resumen</a></li>
				</ul>
			</div>
				<div class="panel-body" style="padding: 10px 10px 10px 10px;">

					<!-- farm name, street, addr number, colony, cp, state, city, phone, social reason, rfc -->
					<div class="col-md-12">
						<div class="clear">&nbsp</div>
						<div class="col-md-12">
							<h3><span class="glyphicon glyphicon-list-alt"></span> Nuevo Pedido</h3>
						</div>

						<div class="clear">&nbsp</div>
						<div class="col-md-6">
							
							<div class="clear">&nbsp</div>
							<div class="input-group input-group-lg">
								<p>Tipo de Cultivo</p>
								<select class="form-control" name="plant" id="plant">
									<option value="-1" selected>---Selecciona un cultivo---</option>
								</select>
							</div><!-- End Plant -->							
							
							<div class="clear">&nbsp</div>
							<div class="input-group input-group-lg">
								<p>Fecha de entrega</p>
								<input type="text" class="form-control" placeholder="Fecha" name="date" id="date" value="">
							</div><!-- End Date -->							
							
						</div>						

						<div class="col-md-6">
							
							<div class="clear">&nbsp</div>
							<div class="input-group input-group-lg">
								<p>Categoría</p>
								<select class="form-control" name="category" id="category">
									<option selected>---Selecciona una categoría---</option>								
								</select>
							</div><!-- End Category -->
							
							<div class="clear">&nbsp</div>
							<div class="input-group input-group-lg">
								<p>Volumen</p>
								<input type="text" class="form-control" placeholder="Volumen" name="volume" id="volume" value="">
							</div><!-- End Volume -->
						
						</div>
						
						<div class="col-md-12">
							<div class="clear">&nbsp</div>
							<div class="input-group input-group-lg">
								<p>Comentarios</p>
								<textarea class="form-control" rows="4" style="height: auto;"></textarea>								
							</div><!-- End Comments -->
						</div>					

					</div>
				
				</div><!-- End panel-body -->

				<div class="panel-footer">						
					<ul class="pager">
						<li id="page0" class="previous"><a href="#">&larr; Anterior</a></li>
					    <li id="page2" class="next"><a href="#">Siguiente &rarr;</a></li>
					 </ul>	
				</div><!-- End panel-footer -->