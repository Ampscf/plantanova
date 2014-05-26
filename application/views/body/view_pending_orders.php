<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div id="result"><!-- Div de mucha importancia, puesto que de aquí se jala el ajax, lo que esté adentro es lo que se va a refrescar -->
					<div class="panel-header">				
						<ul class="nav nav-tabs">
							<li><a>Cliente</a></li>
							<li class="active"><a>Orden</a></li>
							<li><a>Desglose</a></li>
							<li><a>Resumen</a></li>
						</ul>
					</div>	
					<?php
						$attributes = array('id' => 'form_pending_order');
						echo form_open('order/pending_order',$attributes);
					?>
					<div class="panel-body">					
						<div >
							
							<?php include_once('application/views/extra/tabla_orden_pendiente.php'); ?>
						</div>
					</div>
					
					<div class="panel-footer">
					    <ul class="pager">
							<li class="previous disabled"><a href="#">&larr; Anterior</a></li>
					        <li id="p" class="next"><a href="#">Siguiente &rarr;</a></li>
					        <input type="submit" value="Siguiente">
					    </ul>
					</div>
				<?php echo form_close();?>
				</div><!-- @end .result -->
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->
</div><!-- @end .container -->