<div class="page-container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> Envio de semillas </h3>
				</div>
	
				<?php echo form_open('semillas'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						
						<label># de orden</label>
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="# de orden" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>
						
						<label>Lote</label>
						<div class="input-group-lg">						
							<input type="text" class="form-control" placeholder="lote" name="portainjerto" id="portainjerto">
						</div>

						<div class="clear"></div>

						<label>Cantidad de semillas</label>	
						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="Cantidad semillas" name="volumen" id="volumen">
						</div>
						
						<div class="clear"></div>

						<label>Cantidad de sobres</label>	
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="Cantidad de sobres" name="variedad" id="variedad">
						</div>
											
						<div class="clear"></div>	

						<label>Fecha</label>	
					    <div class="input-group input-group-lg">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
							</div>
							<input type="text" class="form-control" name="fecha" id="datepicker">
						</div>

						<div class="clear"></div>

						<div>
							<label>Comentarios</label>
							<textarea class="form-control" rows="4"></textarea> 
						</div>
						
					</div>

					<div class="panel-footer">
						<div class="row">
							<div class="col-md-3">
								<input class="btn btn-default btn-block" type="submit" value="Aceptar"/>
							</div>
							<div class="col-md-3 col-md-offset-6">
								<input class="btn btn-default btn-block" type="button" value="Cancelar"/>
							</div>
						</div>
					</div>
				</form>
				
			</div>
			<!-- End panel-default -->
		</div>
		<!-- End col-md-4 col-md-offset-4 -->
	</div>
	<!-- End row -->
</div>
<!-- End page-container -->