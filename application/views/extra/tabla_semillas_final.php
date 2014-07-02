<table class="table table-hover" id="tabla-empresa">

		<th class="col-md-1" style="width: 100px;">Fecha</th>
		<th>Semilla</th>
		<th>Cantidad</th>
		<th>Lote</th>
		<th>% de germinación</th>

	<tbody>
		<?php 
		if(isset($seeds))
		{
			foreach ($seeds as $key) 
			{
				echo "<tr>";
				echo "<td>" . date("d-m-Y",strtotime($key->seeds_date)) . "</td>";
				echo "<td>" . $key->seed_name . "</td>";
				echo "<td>" . number_format($key->volume) . "</td>";
				echo "<td>" . $key->batch . "</td>";
				echo "<td>" . $key->germ_percentage ."%"."</td>";
				echo "</tr>";
			}
		}
		?>
	</tbody>
</table>
