<table class="table table-hover" id="tabla-empresa">
	<thead>
		<th class="col-md-1"># Cliente</th>
		<th>Empresa</th>
		<th>Login</th>
		<th>Logout</th>
	</thead>
	<tbody>
		<?php 
		if(is_array($time_client))
			date_default_timezone_set('America/Mexico_City');
		{
			foreach ($time_client as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->id_user . "</td>";
				$farm_name=$this->model_user->get_client($key->id_user);
				echo "<td>" . $farm_name[0]->farm_name . "</td>";
				echo "<td>" . date('d/m/Y H:i:s',$key->login_time) . "</td>";
				if($key->logout_time != Null){
					echo "<td>" . date('d/m/Y H:i:s',$key->logout_time) . "</td>";
				}else{
					echo "<td></td>"; 
				}
				
				echo "</tr>";
			}
		}
		?>
	</tbody>
</table>