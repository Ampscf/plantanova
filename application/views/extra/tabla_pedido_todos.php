<table class="table table-hover" id="tabla-pedidos">
	<thead>
		<th class="col-md-1"># Pedido</th>
		<th>Agricultor</th>
		<th style="width:172px">Fecha</th>
		<th>Empresa</th>
		<th>Volúmen</th>
		<th>Estatus</th>
	</thead>
	<tbody>
		<?php
			if(is_array($pedidos_todos)) {
				foreach ($pedidos_todos as $key) 
				{
					echo "<tr>";
					echo "<td>".$key->order_number."</td>";
					echo "<td>".$key->farmer."</td>";
					echo "<td>".date("d-m-Y",strtotime($key->order_date_delivery))."</td>";
					$cliente=$this->model_breakdown->get_user($key->id_client);
					echo "<td>".$cliente[0]->farm_name."</td>";
					echo "<td>".number_format($key->total_volume)."</td>";
					if($key->activate==0){
						echo "<td>Cancelado</td>";
					}else{
						$status=$this->model_breakdown->get_status($key->id_status);
						echo "<td>".$status[0]->status_name."</td>";
					}
					
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