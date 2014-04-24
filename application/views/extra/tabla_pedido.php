<table id="tabla-pedidos">
	<thead>
		<th class="col-md-1"># Pedido</th>
		<th class="col-md-1">Fecha</th>
		<th class="col-md-1">Estado</th>
		<th class="col-md-2">Empresa</th>
		<th class="col-md-1">Categoría</th>
		<th class="col-md-1">Planta</th>
		<th class="col-md-1">Volúmen</th>
		<th>Opciones</th>
	</thead>
	<tbody>
		<?php 
			foreach ($pedidos as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->id_order . "</td>";
				echo "<td>" . $key->date_delivery . "</td>";
				echo "<td>" . $key->status . "</td>";
				echo "<td>" . $key->cliente . "</td>";
				echo "<td>" . $key->category_name . "</td>";
				echo "<td>" . $key->plant_name . "</td>";
				echo "<td>Opciones</td>";
				echo "</tr>";
			}
		?>
	</tbody>
</table>