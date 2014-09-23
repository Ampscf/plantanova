<table class="table table-hover" id="tabla-pedidos">
	
		<th class="col-md-1"># Pedido</th>
		<th>Volumen</th>
		<th>Fecha</th>
		<th>Planta</th>
		<th>Categoria</th>
		<th>Estatus</th>
		<th>Informe</th>

	
		<?php
			if(is_array($orders)){
				foreach ($orders as $key) {
					echo "<tr>";
					echo "<td>".$key->id_order."</td>";
					echo "<td>".$key->total_volume."</td>";
					echo "<td>".date("d-m-Y",strtotime($key->order_date_submit))."</td>";
					$plant=$this->model_order->get_plant($key->id_plant);
					echo "<td>".$plant->result()[0]->plant_name."</td>";
					$category=$this->model_order->get_category($key->id_category);
					echo "<td>".$category->result()[0]->category_name."</td>";
					if($key->activate==0){
						echo "<td>Cancelado</td>";
					}else{
						$status=$this->model_client->get_status($key->id_status);
						echo "<td>".$status[0]->status_name."</td>";
					}

					echo "<td>";?>	                 
					 
	                <a href="#myModal<?php echo $key->id_order; ?>" class="btn btn-default"
	                    title="Eliminar"
	                    data-toggle="modal">
						<i class="fa fa-file-text-o"></i>
	                </a>
					
					
		<?php 
				echo "</td>";
					echo "</tr>";
				}
			}
		?>
		
</table>