<table class="table table-hover" id="tabla-empresa">
	<thead>
		<th class="col-md-1"># Cliente</th>
		<th>Empresa</th>
		<th>RFC</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Opciones</th>
	</thead>
	<tbody>
		<?php 
		if(isset($users))
		{
			foreach ($users as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->id_user . "</td>";
				echo "<td>" . $key->farm_name . "</td>";
				echo "<td>" . $key->rfc . "</td>";
				echo "<td>" . $key->first_name . "</td>";
				echo "<td>" . $key->last_name . "</td>";
				echo "<td>";?>
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Modificar"
	                    onClick="modify_order(<?php echo $key->id_user; ?>);">
	                    <i class="fa fa-edit"></i>
	                </a> 
	                <a class="btn btn-default"
	                    title="Eliminar"
	                    data-toggle="popover"
	                    data-placement="top"
	                    data-title="Confirmar"
	                    data-html="true"
	                    data-content="<a class='btn btn-primary' data-dismiss='popover' onClick='delete_order(<?php echo $key->id_user; ?>);'>Si</a> <a class='btn btn-default' data-dismiss='popover'>No</a>">
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