<div class="container">
	<div class=" col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
	    		<h3 class="panel-title">Informacion del cliente</h3>
	  		</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>
								Nombre
							</th>
							<th>
								Agricola
							</th>	
							<th>
								Correo electronico
							</th>
							<th>
								Telefono
							</th>
							<th>
								Direccion
							</th>
							<th>
								Ciudad
							</th>
							<th>
								Estado
							</th>
							<th>
								Codigo postal
							</th>
							<th>
								RFC
							</th>
						</tr>	
					</thead>
					<tbody>
						<tr>
							<td>Jorge Torres</td>
							<td>Agricultores de Queretaro</td>
							<td>cliente@cliente.com</td>
							<td>4425634123</td>
							<td>Av. Constituyentes #5</td>
							<td>Queretaro</td>
							<td>Queretaro</td>
							<td>78128</td>
							<td>ADQ910312OL8</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class=" col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
	    		<h3 class="panel-title">Informacion del pedido</h3>
	  		</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>
								# de pedido
							</th>
							<th>
								Planta
							</th>	
							<th>
								Fecha de entrega
							</th>
							<th>
								Variedad
							</th>
							<th>
								Porta Injerto
							</th>
							<th>
								Brazos
							</th>
							<th>
								Vol. total
							</th>
							<th>
								Tipo sustrato
							</th>
							<th>
								Subtipo
							</th>
						</tr>	
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Sandia</td>
							<td>05/05/2014</td>
							<td>PaiPai</td>
							<td>Empower</td>
							<td>1</td>
							<td>20000</td>
							<td>Peat moss</td>
							<td>Charola 35 cavidades</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="page-container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> Siembra </h3>
				</div>
	
				<?php echo form_open('Login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="Cantidad" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>

						<div class="input-group-lg">						
							<input type="text" class="form-control" placeholder="Fecha" name="portainjerto" id="portainjerto">
						</div>
						
						<div class="clear"></div>

						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="Alcance" name="volumen" id="volumen">
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
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> Germinacion </h3>
				</div>
	
				<?php echo form_open('Login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="Cantidad" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>

						<div class="input-group-lg">						
							<input type="text" class="form-control" placeholder="Fecha" name="portainjerto" id="portainjerto">
						</div>
						
						<div class="clear"></div>

						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="Alcance" name="volumen" id="volumen">
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
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> Injerto </h3>
				</div>
	
				<?php echo form_open('Login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="Cantidad" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>

						<div class="input-group-lg">						
							<input type="text" class="form-control" placeholder="Fecha" name="portainjerto" id="portainjerto">
						</div>
						
						<div class="clear"></div>

						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="Alcance" name="volumen" id="volumen">
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
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> Plantado </h3>
				</div>
	
				<?php echo form_open('Login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="Cantidad" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>

						<div class="input-group-lg">						
							<input type="text" class="form-control" placeholder="Fecha" name="portainjerto" id="portainjerto">
						</div>
						
						<div class="clear"></div>

						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="Alcance" name="volumen" id="volumen">
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
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> Transplante </h3>
				</div>
	
				<?php echo form_open('Login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="Cantidad" name="variedad" id="variedad">
						</div>
						
						<div class="clear"></div>

						<div class="input-group-lg">						
							<input type="text" class="form-control" placeholder="Fecha" name="portainjerto" id="portainjerto">
						</div>
						
						<div class="clear"></div>

						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="Alcance" name="volumen" id="volumen">
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