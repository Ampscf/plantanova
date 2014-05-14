<table class="table table-hover" id="tabla-pedidos">
	<thead>
		<th class="col-md-1"># Pedido</th>
		<th>Fecha</th>
		<th>Estado</th>
		<th>Empresa</th>
		<th>Categoría</th>
		<th>Planta</th>
		<th>Volúmen</th>
		<th>Opciones</th>
	</thead>
	<tbody>
		<?php 
		if(isset($pedidos))
		{
			foreach ($pedidos as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->id_order . "</td>";
				echo "<td>" . $key->order_date_delivery . "</td>";
				echo "<td>" . $key->status_name . "</td>";
				echo "<td>" . $key->cliente . "</td>";
				echo "<td>" . $key->category_name . "</td>";
				echo "<td>" . $key->plant_name . "</td>";
				echo "<td>" . $key->total_volume . "</td>";
				echo "<td>";?>
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Modificar"
	                    onClick="modify_order(<?php echo $key->id_order; ?>);">
	                    <i class="fa fa-edit"></i>
	                </a> 
	                <a class="btn btn-default"
	                    title="Eliminar"
	                    data-toggle="popover"
	                    data-placement="top"
	                    data-title="Confirmar"
	                    data-html="true"
	                    data-content="<a class='btn btn-primary' data-dismiss='popover' onClick='delete_order(<?php echo $key->id_order; ?>);'>Si</a> <a class='btn btn-default' data-dismiss='popover'>No</a>">
	                    <i class="fa fa-times"></i>
	                </a>
		<?php 
				echo "</td>";
				echo "</tr>";
			}
		}
		?>
	</tbody>
</table>