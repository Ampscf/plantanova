<table class="table table-hover" id="orders-table">
	<thead>
		<tr>
			<th class="col-md-1">#Pedido</th>
			<th class="col-md-1">Fecha Entrega</th>
			<th class="col-md-1">Planta</th> 
			<th class="col-md-1">Categoria</th>
			<th class="col-md-1">Cliente</th>
		</tr>
	</thead>
	<tbody>

		<?php 
		if(isset($orders))
		{ 
			foreach ($orders as $key) {
				echo '<tr>';
				echo '<td class="col-md-1">';
				echo anchor("pedido/".$key->id_user, $key->id_order);
				echo '</td>';
				echo '<td class="col-md-1">' . $key->order_delivery . '</td>
					<td class="col-md-1">' . $key->plant_name . '</td>
					<td class="col-md-1">' . $key->category_name . '</td>
					<td class="col-md-1">' . $key->cliente . '</td>';
				echo '</tr>';
			} 
		}
		else
		{
			echo '<tr class="text-center"><td>No hay pedidos</td></tr>';
		}?>
	</tbody>
</table>
