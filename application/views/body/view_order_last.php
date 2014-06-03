<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div id="result">						
					<div class="panel-header">				
						<ul class="nav nav-tabs">
							<li><a>Cliente</a></li>
							<li><a>Orden</a></li>
							<li><a>Desglose</a></li>
							<li class="active"><a>Resumen</a></li>
							<li style="position: relative; left:50%;"><a>Cliente: <?php echo $order; ?></a></li>
						</ul>
					</div>	
									
					<!-- Cuerpo del panel-->
					<div class="panel-body">
						<div class="col-md-12">
							<h1>Resumen<h1>
						</div>
						
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<p>Nombre Completo: <?php echo 'var';?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Correo Electrónico: <?php echo 'var';?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Teléfono: <?php echo 'var';?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Calle/Colonia: <?php echo 'var';?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Número #: <?php echo 'var';?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>CP: <?php echo 'var';?></p>
							</div><!-- End Plant -->
						</div>
						
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<p>Razón Social: <?php echo 'var';?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Fecha: <?php echo 'var';?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Tipo de cultivo: <?php echo 'var';?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Volumen total: <?php echo 'var';?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Categoría: <?php echo 'var';?></p>
							</div><!-- End Plant -->
							
							<div class="input-group input-group-lg">
								<p>Volumen restante: <?php echo 'var';?></p>
							</div><!-- End Plant -->
						</div>
						
						<div class="clear">&nbsp</div>					
						<div class="input-group input-group-lg">
							<p>*Desglose de la orden:</p>
						</div><!-- End Desglose -->					
						
						<table>
							<th>Sustrato</th>
							<th>Subtipo</th>
							<th>Variedad</th>
							<th>PortaInjerto</th>
							<th>Volumen</th>
							
							<tbody>
							</tbody>
						</table>
						
					</div><!-- fin cuerpo del panel -->
									
					<div class="panel-footer">
						<ul class="pager">
							<input type="submit" value="&larr; Anterior" class="btn btn-default" style="float: left;" id="before" name="before"/>
					        <input type="submit" value="Agregar &rarr;" class="btn btn-default" style="float: right;" id="next" name="next"/>
						</ul>
					</div><!-- fin panel footer -->	
					
				</div><!-- @end .result -->
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->
</div><!-- @end .container -->