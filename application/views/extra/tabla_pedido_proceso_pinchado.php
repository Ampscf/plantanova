<table class="table table-hover" id="tabla-empresa">
<thead>
	<th># Pedido</th>
	<th>Cantidad</th>
	<th>Fecha</th>
	<th>Variedad/Portainjerto</th>
	<th>Alcance</th>
	<th>Comentario</th>
</thead>
	
	<tbody>
	<?php 
		if(is_array($pedidos_proceso_punch))
		{
			foreach ($pedidos_proceso_punch as $key) 
			{
				echo "<tr>";
				$order=$this->model_breakdown->get_order_id_breakdown($key->id_breakdown);
				echo "<td>" . $order[0]->id_order . "</td>";
				echo "<td>" . $key->volume . "</td>";
				echo "<td>" . date("Y-m-d",strtotime($key->process_date)) . "</td>";
				$breakdownn=$this->model_order->get_breakdown_id_breakdown($key->id_breakdown);
				echo "<td>" .$breakdownn[0]->variety."/".$breakdownn[0]->rootstock. "</td>";
				echo "<td></td>";
				if($key->comment != null){
				echo "<td>" ?>

					<a href="#myModal2<?php echo $key->id_process; ?>" class="btn btn-default"
	                    title="Comentario"
	                    data-toggle="modal">
						<i class="fa fa-edit"></i>
	                </a>
					
					<div id="myModal2<?php echo $key->id_process;  ?>" class="modal fade">
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
				echo "</tr>";
			}
		}
		?>
	</tbody>
</table>