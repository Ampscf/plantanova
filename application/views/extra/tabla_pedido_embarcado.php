<table class="table table-hover" id="tabla-pedidos">
	<thead>
		<th class="col-md-1"># Pedido</th>
		<th>Fecha</th>
		<th>Estado</th>
		<th>Empresa</th>
		<th>Categoría</th>
		<th>Planta</th>
		<th>Volúmen</th>
		
	</thead>
	<tbody>
		<?php 
		if(is_array($pedidos_embarcados))
		{
			foreach ($pedidos_embarcados as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->id_order . "</td>";
				
				echo "<td>" . date("Y-m-d",strtotime($key->order_date_delivery)) . "</td>";
				echo "<td>Completados</td>";
				$cliente=$this->model_breakdown->get_user($key->id_client);
				echo "<td>" . $cliente[0]->farm_name . "</td>";
				$category=$this->model_breakdown->get_category($key->id_category);
				echo "<td>" . $category[0]->category_name . "</td>";
				$plant=$this->model_breakdown->get_plant($key->id_plant);
				echo "<td>" . $plant[0]->plant_name . "</td>";
				echo "<td>" . $key->total_volume . "</td>";
				
			}
		}
		?>
	</tbody>
</table>