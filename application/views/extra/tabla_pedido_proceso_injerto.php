<table class="table table-hover" id="tabla-empresa">
<thead>
	<th># Pedido</th>
	<th>Agricultor</th>
	<th>Cantidad</th>
	<th>Fecha</th>
	<th>Variedad/Portainjerto</th>
	<th>Comentario</th>
</thead>
	<tbody>
	<?php 
		if(is_array($pedidos_proceso_graft))
		{
			foreach ($pedidos_proceso_graft as $key) 
			{
				echo "<tr>";
				$order=$this->model_breakdown->get_order_id_breakdown($key->id_breakdown);
				$farmer=$this->model_order->get_order_id_order($order[0]->id_order);
				echo "<td>" . $farmer->result()[0]->order_number . "</td>";
				
				echo "<td>" . $farmer->result()[0]->farmer . "</td>";
				echo "<td>" . number_format($key->volume) . "</td>";
				echo "<td>" . date("d-m-Y",strtotime($key->process_date)) . "</td>";
				$breakdownn=$this->model_order->get_breakdown_id_breakdown($key->id_breakdown);
				echo "<td>" .$breakdownn[0]->variety."/".$breakdownn[0]->rootstock. "</td>";
				if($key->comment != null){
				echo "<td>" ?>

					<a href="#myModal21<?php echo $key->id_process; ?>" class="btn btn-default"
	                    title="Comentario"
	                    data-toggle="modal">
						<i class="fa fa-comment-o"></i>
	                </a>
					
					<div id="myModal21<?php echo $key->id_process;  ?>" class="modal fade">
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
