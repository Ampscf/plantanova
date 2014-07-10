<table class="table table-hover" id="tabla-pedidos">
	<thead>
		<th># Pedido</th>
		<th>Agricultor</th>
		<th>Fecha</th>
		<th>Semilla</th>
		<th>Cantidad</th>
		<th>Comentario</th>
	</thead>
	<tbody>
		<?php 
		if(is_array($pedidos_proceso_sowing))
		{
			foreach ($pedidos_proceso_sowing as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->id_order . "</td>";
				$farmer=$this->model_breakdown->get_process_orders($key->id_order);
				echo "<td>" . $farmer[0]->farmer . "</td>";
				echo "<td>" . date("d-m-Y",strtotime($key->sowing_date)) . "</td>";
				echo "<td>" . $key->seed . "</td>";
				echo "<td>" . number_format($key->volume) . "</td>";
				if($key->comment != null){
				echo "<td>" ?>

					<a href="#myModal2<?php echo $key->id_process; ?>" class="btn btn-default"
	                    title="Comentario"
	                    data-toggle="modal">
						<i class="fa fa-comment-o"></i>
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

			<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo base_url() . 'css/js/jquery.dataTables.min.js'; ?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . 'css/js/TableTools.js'; ?>"></script>	
		<script type="text/javascript" src="<?php echo base_url() . 'css/js/ZeroClipboard.js'; ?>"></script>	
		<script type="text/javascript" src="<?php echo base_url() . 'css/js/jquery.noty.js'; ?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . 'css/js/layouts/topCenter.js'; ?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . 'css/js/themes/default.js'; ?>"></script>