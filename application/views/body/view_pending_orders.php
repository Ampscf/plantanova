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
							<li style="position: relative; left:50%;"><a>Cliente: <?php echo $company->farm_name; ?></a></li>
						</ul>
					</div>	
					<?php
						$attributes = array('id' => 'form_pending_order_next_before');
						echo form_open('order/pending_order_next_before',$attributes);
					?>
					<div class="panel-body">					
						<div >
							<input type="hidden" value="<?php echo $id_company;?>" id="id_company" name="id_company">
							<?php include_once('application/views/extra/tabla_orden_pendiente.php'); ?>
						</div>
					</div>
					
					<div class="panel-footer">
					    <ul class="pager">
					        <input type="submit" value="&larr; Anterior" class="btn btn-default" style="float: left;" id="before" name="before">
					        <input type="submit" value="Siguiente &rarr;" class="btn btn-default" style="float: right;" id="next" name="next">
					        
					    </ul>
					</div>
				<?php echo form_close();?>
				</div><!-- @end .result -->
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->
</div><!-- @end .container -->