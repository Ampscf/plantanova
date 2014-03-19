<div class="page-container">
	<div class="row">
		<div class="logo">
			<img src="<?php echo base_url().'img/logo.png'; ?>" width="200px" height="80px">
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> Acceder </h3>
				</div>

				<?php				
				echo "<div class='panel-body' style='padding: 10px 10px 10px 10px;'>";
					echo "<div class='input-group input-group-lg'>";
						echo "<div class='input-group-addon'>";
							echo "<span class='glyphicon glyphicon-user'></span>";
						echo "</div>";
                    	echo "<input type='text' class='form-control' placeholder='Correo' name='correo' id='correo'>";
                	echo "</div>";

                	echo "<div class='clear'></div>";

					echo "<div class='input-group input-group-lg'>";
						echo "<div class='input-group-addon'>";
							echo "<span class='glyphicon glyphicon-eye-close'></span>";
						echo "</div>";
                    	echo "<input type='password' class='form-control' placeholder='Contraseña' name='contraseña' id='contraseña'>";
                	echo "</div>";
				echo "</div>";

				echo "<div class='panel-footer'>";
					echo "<div class='row'>";
						echo "<div class='col-md-2'>";
							echo "<button href='#' class='btn btn-link'>Recuperar contraseña</button>";
						echo "</div>";
						echo "<div class='col-md-3 col-md-offset-6'>";
							echo "<button class='btn btn-success btn-block'>Acceder</button>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
				?>
			</div>

		</div>
	</div>
</div>
	