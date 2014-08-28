<table class="table table-hover" id="tabla-pedidos">
	<thead>
		<th class="col-md-1"># Pedido</th>
		<th>Proceso</th>
		<th>Volumen</th>
		<th>Fecha</th>
		<th>Planta</th>
		<th>Categoria</th>
	</thead>
	<tbody>
		<?php
			if(is_array($process_order)){
				foreach ($process_order as $key) {
					echo "<tr>";
					echo "<td>".$key->id_order."</td>";
					$process=$this->model_client->get_process($key->id_order);
					$germination=$this->model_client->get_germination($key->id_order);
					if($process != false){
						if($process[0]->id_process_type==2){
							$process_type="Injerto";
						}else if($process[0]->id_process_type==3){
							$process_type="Pinchado";
						}else if($process[0]->id_process_type==4){
							$process_type="Transplante";
						}
						
					}else if($germination != false){
						$process_type="Germinacion";
					}else{
						$process_type="Siembra";
					}
					echo "<td>".$process_type."</td>";
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