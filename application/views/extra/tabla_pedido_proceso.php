<table class="table table-hover" id="tabla-pedidos">
	<thead>
		<th class="col-md-1"># Pedido</th>
		<th>Fecha</th>
		<th>Estado</th>
		<th>Empresa</th>
		<th>Categoría</th>
		<th>Planta</th>
		<th>Volúmen</th>
		<th>Editar/Eliminar</th>
	</thead>
	<tbody>
		<?php 
		if(isset($pedidos_proceso))
		{
			foreach ($pedidos_proceso as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->id_order . "</td>";
				echo "<td>" . $key->order_date_delivery . "</td>";
				echo "<td>Proceso</td>";
				$cliente=$this->model_breakdown->get_user($key->id_client);
				echo "<td>" . $cliente[0]->farm_name . "</td>";
				$category=$this->model_breakdown->get_category($key->id_category);
				echo "<td>" . $category[0]->category_name . "</td>";
				$plant=$this->model_breakdown->get_plant($key->id_plant);
				echo "<td>" . $plant[0]->plant_name . "</td>";
				echo "<td>" . $key->total_volume . "</td>";
				echo "<td>";?>
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Modificar"
	                   href="edit_order/<?php echo $key->id_order; ?>">
	                    <i class="fa fa-edit"></i>
	                </a>

	               <a href="#myModal<?php echo $key->id_order; ?>" class="btn btn-default"
	                    title="Eliminar"
	                    data-toggle="modal">
						<i class="fa fa-times"></i>
	                </a>
					
					<div id="myModal<?php echo $key->id_order; ?>" class="modal fade">
        				<div class="modal-dialog">
            				<div class="modal-content">
                				<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    				<h4 class="modal-title">Confirmación</h4>
                				</div>
                				<div class="modal-body">
                    				<p>¿Estás seguro de querer eliminar el pedido <?php echo $key->id_order; ?>?</p>
                				</div>
                				<div class="modal-footer">
									<?php echo form_open('order/delete_order_pedido'); ?>
                    					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    					<button type="submit" class="btn btn-success" name="<?php echo $key->id_order; ?>">Confirmar</button>
                					</form>
								</div>
            				</div>
        				</div>
    				</div>
		<?php 
				echo "</td>";
				echo "</tr>";
			}
		}
		?>
	</tbody>
</table>