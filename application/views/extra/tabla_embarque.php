<table class="table table-hover" id="tabla-pedidos">
	
		<th># Embarque</th>
		<th>Fecha de Entrega</th>
		<th>Fecha de Arribo</th>
		<th>Volumen Embarcado</th>
		<th>Destino</th>
		<th>Transporte</th>
		<th>Fletera</th>
		<th>Eliminar</th>
	
	
		<?php 
		if(is_array($embarque_pedido))
		{
			foreach ($embarque_pedido as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->id_embark . "</td>";
				echo "<td>" . date("d-m-Y",strtotime($key->date_delivery)) . "</td>";
				echo "<td>" . date("d-m-Y",strtotime($key->date_arrival)) . "</td>";
				echo "<td>" . $key->volume. "</td>";
				echo "<td>" . $key->destiny. "</td>";
				echo "<td>" . $key->transport. "</td>";
				echo "<td>" . $key->freight."</td>";
			}
		}
		?>	
	
</table>