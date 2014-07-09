<table class="table table-hover" id="tabla-empresa">
<thead>
	<th># Pedido</th>
	<th>Agricultor</th>
	<th>Cantidad</th>
	<th>Fecha</th>
	<th>Semilla</th>
	<th>% Germinación</th>
	<th>Viabilidad</th>
	<th>Alcance</th>
	<th>Comentario</th>
</thead>
<tbody>
	<?php 
		if(is_array($pedidos_proceso_germination))
		{
			foreach ($pedidos_proceso_germination as $key) 
			{
				echo "<tr>";
				echo "<td>".$key->id_order."</td>";
				$farmer=$this->model_order->get_order_id_order($key->id_order);
				echo "<td>" . $farmer->result()[0]->farmer . "</td>";
				echo "<td>" . $key->volume . "</td>";
				echo "<td>" . date("Y-m-d",strtotime($key->germ_date)) . "</td>";
				echo "<td>".$key->seed_name."</td>";
				if($key->germ_percentage==0){
					echo "<td></td>";
				}else{
					echo "<td>".$key->germ_percentage."%"."</td>";	
				}
				if($key->viability==0){
					echo "<td></td>";
				}else{
					echo "<td>" . $key->viability ."%". "</td>";
				}
				if($key->scope < 1){
					echo "<td style='color:red;'>".$key->scope."</td>";
				}else{
					echo "<td>".$key->scope."</td>";
				}
				
				if($key->comment != null){
				echo "<td>" ?>

					<a href="#myModal2<?php echo $key->id_germination; ?>" class="btn btn-default"
	                    title="Comentario"
	                    data-toggle="modal">
						<i class="fa fa-comment-o"></i>
	                </a>
					
					<div id="myModal2<?php echo $key->id_germination;  ?>" class="modal fade">
	    				<div class="modal-dialog">
	        				<div class="modal-content">
	            				<div class="modal-header">
	                				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                				<h4 class="modal-title">Comentario</h4>
	            				</div>
	            				<div class="modal-body">
	                				<p><?php echo $key->comment;?></p>
	            				</div>
	            				<div class="modal-footer">
	                				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                			</div>
	        				</div>
	    				</div>
					</div>
				
				<?php
				}else{
				echo "<td>";
				} 
				echo "</td>";


				echo "</td>";
				echo "</tr>";
			}
		}
		?>
</tbody>
</table>
