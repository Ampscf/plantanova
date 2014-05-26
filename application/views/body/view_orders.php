<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div id="result">
					<div class="panel-header">				
						<ul class="nav nav-tabs">
							<li class="active"><a>Cliente</a></li>
							<li><a>Orden</a></li>
							<li><a>Desglose</a></li>
							<li><a>Resumen</a></li>
						</ul>
					</div>	
					
					<div class="panel-body">					
						<h2>Nueva Orden</h2>
						<div class="tab-content">
							<div class="tab-pane active" id="cliente">
							 	<p>* Seleccione la empresa</p>
								<select class="form-control" name="companies" id="companies" >
									<option value="-1" selected>---Selecciona una empresa---</option>
										<?php 
											foreach($companies as $key)
											{
												echo "<option value='" . $key->id_user . "' set_select('companies','".$key->id_user."')>" . $key->farm_name . "</option>";
											}
										?>
								</select>
								<div id="p1"></div> 
								
							</div><!-- @end #cliente -->
						</div><!-- @end .tab-content -->
					</div>
					
					<div class="panel-footer">
					    <ul class="pager">
							<li class="previous disabled"><a href="#">&larr; Anterior</a></li>
					        <li id="page1" class="next"><a href="#">Siguiente &rarr;</a></li>
					    </ul>
					</div>
				
				</div><!-- @end .result -->
			</div>
      	</div><!-- @end .span12 -->
	</div><!-- @end .row -->
</div><!-- @end .container -->