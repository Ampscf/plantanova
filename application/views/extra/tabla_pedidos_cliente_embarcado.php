<table class="table table-hover" id="tabla-pedidos">
	<thead>
		<th class="col-md-1"># Pedido</th>
		<th>Volumen</th>
		<th>Fecha</th>
		<th>Planta</th>
		<th>Categoria</th>
	</thead>
	<tbody>
		<?php
			if(is_array($embarker_order)){
				foreach ($embarker_order as $key) {
					echo "<tr>";
					echo "<td>".$key->id_order."</td>";
					echo "<td>".$key->total_volume."</td>";
					echo "<td>".date("d-m-Y",strtotime($key->order_date_submit))."</td>";
					$plant=$this->model_order->get_plant($key->id_plant);
					echo "<td>".$plant->result()[0]->plant_name."</td>";
					$category=$this->model_order->get_category($key->id_category);
					echo "<td>".$category->result()[0]->category_name."</td>";
					echo "</tr>";
				}
			}
		?>
	</tbody>	
</table>