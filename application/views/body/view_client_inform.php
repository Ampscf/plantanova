	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Avisos</h3>
					</div>
					<div class="panel-body">
						<div class="col-md-6 col-md-offset-3 ">
							<h1>¡Hola <?php echo $user[0]->farm_name; ?>!<h1>
						</div>
						<div class="col-md-6 col-md-offset-3">
							<?php
								if(is_array($messages)){
									foreach ($messages as $key) {
										echo "<ul>";
										echo "<li class='square' style='text-align:justify;'>".$key->message."</li>";
										echo "</ul>";
									}

								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->