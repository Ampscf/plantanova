<table class="table table-hover" id="tabla-empresa">
<thead>
		<th>Orden</th>
		<th>Agricultor</th>
		<th>Volumen</th>
		<th>Resumen</th>
		<th>Editar</th>
</thead>

	<tbody>
		<?php 
		if(isset($seeds))
		{
			foreach ($seeds as $key) 
			{
				echo "<tr>";
				$order=$this->model_order->get_order_id_order($key->id_order);
				echo "<td>" . $order->result()[0]->order_number . "</td>";
				$farmer=$this->model_seeds->get_farmer($key->id_order);
				echo "<td>" . $farmer->farmer . "</td>";
				$volume=$this->model_seeds->suma_volumen_seeds($key->id_order);
				echo "<td>" . number_format($volume->volume) . "</td>";
				echo "<td>";?>	                 
					 <a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Resumen"
	                    href=<?php echo site_url("seeds/final_resume/$key->id_order");?>>
	                    <i class="fa fa-file-text-o"></i>
	                </a>
			<?php 
				echo "</td>";
				echo "<td>";?>
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Editar"
	                    href=<?php echo site_url("seeds/register_seeds_form/$key->id_order/1");?>>
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
