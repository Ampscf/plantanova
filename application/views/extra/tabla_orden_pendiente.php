<table  id="tabla-">
	
		<th class="col-md-1"># Orden</th>
		<th>Tipo Cultivo</th>
		<th>Categoria</th>
		<th>Volumen</th>
		<th>Fecha de Pedido</th>
		<th>Editar</th>
	
	<tbody>
		<?php 
		if(isset($pending_order))
		{
			foreach ($pending_order as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->id_order . "</td>";
				$plant=$this->model_order->get_plant($key->id_plant);
				$plant_name=$plant->result()[0]->plant_name;
				echo "<td>" . $plant_name . "</td>";
				$category=$this->model_order->get_category($key->id_category);
				$category_name=$category->result()[0]->category_name;
				echo "<td>" . $category_name . "</td>";
				echo "<td>" . $key->total_volume . "</td>";
				$time=$key->order_date_submit;
				$date= date("Y-m-d", strtotime($time));
				echo "<td>" . $date . "</td>";
				echo "<td>";?>
				
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Modificar"
	                   href="edit/<?php echo $key->id_user ?>">
	                    <i class="fa fa-edit"></i>
	                   
	                </a>
		<?php 
				echo "</td>";
				echo "</tr>";
			}
		}
		?>
	</tbody>
</table>