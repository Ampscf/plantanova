<div class="container">
	<div class=" col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
	    		<h3 class="panel-title">Informaci�n del cliente</h3>
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
								Correo electr�nico
							</th>
							<th>
								Tel�fono
							</th>
							<th>
								Direcci�n
							</th>
							<th>
								Ciudad
							</th>
							<th>
								Estado
							</th>
							<th>
								C�digo postal
							</th>
							<th>
								RFC
							</th>
						</tr>	
					</thead>
					<tbody>
						<tr>
							<td>Jorge Torres</td>
							<td>Agricultores de Quer�taro</td>
							<td>cliente@cliente.com</td>
							<td>4425634123</td>
							<td>Av. Constituyentes #5</td>
							<td>Quer�taro</td>
							<td>Quer�taro</td>
							<td>78128</td>
							<td>ADQ910312OL8</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div><!-- End Container -->
<div class="container">
	<div class=" col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
	    		<h3 class="panel-title">Informaci�n del pedido</h3>
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
							<td>Sand�a</td>
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
</div><!-- End Container -->

<div class="page-container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			
			<div class="panel panel-default column-float">
				<div class="panel-heading">
					<h3 class="panel-title"> Siembra </h3>
				</div>
				<?php echo form_open('Login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="Cantidad" name="cantidad" id="cantidad">
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">
							<div class="input-group-addon" style="text-align: left;">
								<span class="glyphicon glyphicon-time"> Fecha </span>
							</div>
							<input type="text" class="form-control" name="fecha" id="datepicker" placeholder="mm / dd / aaaa">
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="Alcance" name="alcance" id="alcance disabledInput" disabled>
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
				</form><!-- End Siembra -->
			</div><!-- End panel-default -->

			<div class="panel panel-default column-float column-clear">
				<div class="panel-heading">
					<h3 class="panel-title"> Germinaci�n </h3>
				</div>
				<?php echo form_open('Login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="Cantidad" name="cantidad" id="cantidad">
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">
							<div class="input-group-addon" style="text-align: left;">
								<span class="glyphicon glyphicon-time"> Fecha </span>
							</div>
							<input type="text" class="form-control" name="fecha" id="datepicker" placeholder="mm / dd / aaaa">
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="Alcance" name="alcance" id="alcance disabledInput" disabled>
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="Vibilidad" name="viabilidad" id="viabilidad disabledInput" disabled>
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
				</form><!-- End Germinacion -->
			</div><!-- End panel-default -->

			<div class="panel panel-default column-float">
				<div class="panel-heading">
					<h3 class="panel-title"> Injerto </h3>
				</div>
				<?php echo form_open('Login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="Cantidad" name="cantidad" id="cantidad">
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">
							<div class="input-group-addon" style="text-align: left;">
								<span class="glyphicon glyphicon-time"> Fecha </span>
							</div>
							<input type="text" class="form-control" name="fecha" id="datepicker" placeholder="mm / dd / aaaa">
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="Alcance" name="alcance" id="alcance disabledInput" disabled>
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
				</form><!-- End Injerto -->
			</div><!-- End panel-default -->

			<div class="panel panel-default column-float column-clear">
				<div class="panel-heading">
					<h3 class="panel-title"> Transplante </h3>
				</div>
				<?php echo form_open('Login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="Cantidad" name="cantidad" id="cantidad">
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">
							<div class="input-group-addon" style="text-align: left;">
								<span class="glyphicon glyphicon-time"> Fecha </span>
							</div>
							<input type="text" class="form-control" name="fecha" id="datepicker" placeholder="mm / dd / aaaa">
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="Alcance" name="alcance" id="alcance disabledInput" disabled>
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
				</form><!-- End Transplante -->
			</div><!-- End panel-default -->

		</div><!-- End col-md-10 col-md-offset-1-->

		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default ">
				<div class="panel-heading">
					<h3 class="panel-title"> Observaciones </h3>
				</div>
				<?php echo form_open('Login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<div class="input-group-lg">
							<textarea class="form-control" rows="3"></textarea>
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
				</form><!-- End Observaciones -->
			</div><!-- End panel-default -->
		</div><!-- End col-md-8 col-md-offset-2 -->
		
	</div><!-- End row -->
</div><!-- End page-container -->