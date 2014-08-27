	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> Avisos</h3>
					</div>
					<div class="panel-body">
						
						<?php
							if(is_array($messages)){
								foreach ($messages as $key) {
									echo "<table class='dataTable'>";
									echo "<tr>";
									echo "<td style='text-align:justify;'><h1>".$key->comment_description."</h1></td>";
									echo "</tr>";
									echo "</table>";
								}

							}
						?>
						
					</div>
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->