	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					
					<div class="">
					<ul class="nav nav-pills">
						<li id="nuevo" onclick="changeClass2();" class="active"><a href="#">Nuevos</a></li>
						<li id="proceso" onclick="changeClass();"><a href="#">En proceso</a></li>
						<li id="embarcado" onclick="changeClass3();"><a href="#">Embarcados</a></li>
					</ul>
					</div>
					
					<div class="panel-body">
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_pedido.php'); ?>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->