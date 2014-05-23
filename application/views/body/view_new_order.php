<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">	
					<h2>Nueva Orden</h2>
					<ul class="nav nav-tabs">
						<li class="active"><a href="#cliente" data-toggle="tab">Cliente</a></li>
          				<li><a href="#orden" data-toggle="tab">Orden</a></li>
          				<li><a href="#desglose" data-toggle="tab">Desglose</a></li>
         				<li><a href="#resumen" data-toggle="tab">Resumen</a></li>
					</ul>
					
					<div class="tab-content">
						<div class="tab-pane active" id="cliente">
						 	<p>* Seleccione la empresa</p>
							
							<select class="form-control" name="companies" id="companies">
								<option value="-1" selected>---Selecciona una empresa---</option>
									<?php 
										foreach($companies as $key)
										{
											echo "<option value='" . $key->id_user . "' set_select('companies','".$key->id_user."')>" . $key->farm_name . "</option>";
										}
									?>
							</select>
							
							<p id="p1">Nombre Completo:</p> 
							<p>Correo Electrónico:</p>
							<p>Teléfono:</p>
							<p>Calle/Colonia:</p>
							<p>Número #:</p>
							<p>Código Postal:</p>
							<p>Razón Social:</p>
							<div class="panel-footer">
								<a href="#orden" class="btn btn-default ">Siguiente</a>					
							</div><!-- End panel-footer -->
						</div><!-- @end #cliente -->
						 
						<div class="tab-pane" id="orden">
            				<p>*Cuenta con órdenes pendientes antees de registrar una nueva orden puede seleccionar la orden pendiente que desee editar</p>
							<span class="glyphicon glyphicon-time"> ÓRDENES PENDIENTES</span>
          				</div><!-- @end #orden -->
						
						<div class="tab-pane" id="desglose">
            				<h1>Contenido del desglose</h1>
          				</div><!-- @end #desglose -->
						
						<div class="tab-pane" id="resumen">
            				<h1>Contenido del resumen</h1>
          				</div><!-- @end #resumen -->
						
					</div><!-- @end .tab-content -->
					
				</div>
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->
</div><!-- @end .container -->