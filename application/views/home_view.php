<div class="container">
	<div class="row col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
	    		<h3 class="panel-title">Mi Información</h3>
	  		</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>
								Nombre
							</th>
							<th>
								Correo
							</th>	
							<th>
								Estado
							</th>
						</tr>	
					</thead>
					<tbody>
						<tr>
							<?php echo "<td>" . $myinfo->first_name . " " . $myinfo->last_name . "</td>"; ?>
							<?php echo "<td>" . $myinfo->mail . "</td>"; ?>
							<?php echo "<td>" . $myinfo->state_name . "</td>"; ?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>