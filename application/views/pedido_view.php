<div class="container">
	<div class=" col-md-12	">
		<div class="panel panel-default">
			<div class="panel-heading">
	    		<h3 class="panel-title">Informacion del cliente</h3>
	  		</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th class="col-md-1 text-center">
								Nombre
							</th>
							<th class="col-md-1 text-center">
								Agricola
							</th>	
							<th class="col-md-1 text-center">
								Correo
							</th>
							<th class="col-md-1 text-center">
								Telefono
							</th>
							<th class="col-md-1 text-center">
								Direccion
							</th>
							<th class="col-md-1 text-center">
								Estado
							</th>
							<th class="col-md-1 text-center">
								Ciudad
							</th>
							<th class="col-md-1 text-center">
								Codigo postal
							</th>
							<th class="col-md-1 text-center">
								RFC
							</th>
						</tr>	
					</thead>
					<tbody>
						<tr>
							<td><?php echo $cliente->cliente; ?></td>
							<td><?php echo $cliente->farm_name; ?></td>
							<td><?php echo $cliente->mail; ?></td>
							<td><?php echo $cliente->phone; ?></td>
							<td><?php echo $cliente->direccion; ?></td>
							<td><?php echo $cliente->state_name; ?></td>
							<td><?php echo $cliente->town_name; ?></td>
							<td><?php echo $cliente->cp; ?></td>
							<td><?php echo $cliente->rfc; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div><!-- End Container -->
<div class="container">
	<div class=" col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
	    		<h3 class="panel-title">Informacion del pedido</h3>
	  		</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th class="col-md-1 text-center">
								# de pedido
							</th>
							<th class="col-md-1 text-center">
								Planta
							</th>	
							<th class="col-md-1 text-center">
								Fecha de entrega
							</th>
							<th class="col-md-1 text-center">
								Variedad
							</th>
							<th class="col-md-1 text-center">
								Porta Injerto
							</th>
							<th class="col-md-1 text-center">
								Brazos
							</th>
							<th class="col-md-1 text-center">
								Vol. total
							</th>
							<th class="col-md-1 text-center">
								Tipo sustrato
							</th>
							<th class="col-md-1 text-center">
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
</div><!-- End Container -->

<div class="page-container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			
			<div class="panel panel-default column-float col-md-offset-1">
				<div class="panel-heading">
					<h3 class="panel-title"> Siembra </h3>
				</div>
				<?php echo form_open('login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="25000" name="cantidad" id="cantidad" disabled>
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">
							<div class="input-group-addon" style="text-align: left;">
								<span class="glyphicon glyphicon-time"> Fecha </span>
							</div>
							<input type="text" class="form-control" name="fecha" id="datepicker" placeholder="05 / 07 / 2014" disabled>
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="20000" name="alcance" id="alcance disabledInput" disabled>
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

			<div class="panel panel-default column-float column-clear col-md-offset-1">
				<div class="panel-heading">
					<h3 class="panel-title"> Germinacion </h3>
				</div>
				<?php echo form_open('login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<div class="input-group-lg">
							<input type="text" class="form-control" placeholder="23000" name="cantidad" id="cantidad" disabled>
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">
							<div class="input-group-addon" style="text-align: left;">
								<span class="glyphicon glyphicon-time"> Fecha </span>
							</div>
							<input type="text" class="form-control" name="fecha" id="datepicker" placeholder="05 / 09 / 2014" disabled>
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="20000" name="alcance" id="alcance disabledInput" disabled>
						</div>
						<div class="clear"></div>
						<div class="input-group-lg">	
							<input type="text" class="form-control" placeholder="95%" name="viabilidad" id="viabilidad disabledInput" disabled>
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

			<div class="panel panel-default column-float col-md-offset-1">
				<div class="panel-heading">
					<h3 class="panel-title"> Injerto </h3>
				</div>
				<?php echo form_open('login_controller/home'); ?>
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

			<div class="panel panel-default column-float column-clear col-md-offset-1">
				<div class="panel-heading">
					<h3 class="panel-title"> Pinchado </h3>
				</div>
				<?php echo form_open('login_controller/home'); ?>
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
				</form><!-- End Pinchado -->
			</div><!-- End panel-default -->

			<div class="panel panel-default column-float col-md-offset-1">
				<div class="panel-heading">
					<h3 class="panel-title"> Transplante </h3>
				</div>
				<?php echo form_open('login_controller/home'); ?>
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
				<?php echo form_open('login_controller/home'); ?>
					<div class="panel-body" style="padding: 10px 10px 10px 10px;">
						<div class="input-group-lg">
							<textarea class="form-control" rows="3" disabled>Alcance es mayor, tomaron del próximo orden.</br> 
							Embarque 9,024 Obsession y 3,528 SP4 plantas 28/1 CF 1393	se corrigió un error en el registro de la siembra 
							del ortainjerto para Petite</textarea>
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
