<table  id="tabla-">
	
		<th># Orden</th>
		<th>Agricultor</th>
		<th>Tipo Cultivo</th>
		<th>Categoria</th>
		<th>Volumen</th>
		<th>Fecha de Pedido</th>
		<th>Editar/Cancelar</th>
	
	<tbody>
		<?php 
		if(isset($pending_order))
		{
			foreach ($pending_order as $key) 
			{
				echo "<tr>";
				echo "<td>" . number_format($key->id_order) . "</td>";
				echo "<td>" . $key->farmer . "</td>";
				$plant=$this->model_order->get_plant($key->id_plant);
				$plant_name=$plant->result()[0]->plant_name;
				echo "<td>" . $plant_name . "</td>";
				$category=$this->model_order->get_category($key->id_category);
				$category_name=$category->result()[0]->category_name;
				echo "<td>" . $category_name . "</td>";
				echo "<td>" . $key->total_volume . "</td>";
				$time=$key->order_date_submit;
				$date= date("d-m-Y", strtotime($time));
				echo "<td>" . $date . "</td>";
				echo "<td>";?>
				
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Modificar"
	                   href="load_second_step_two/<?php echo $key->id_order ?>">
	                    <i class="fa fa-edit"></i>
	                   
	                </a>

	                <a href="#myModal<?php echo $key->id_order; ?>" class="btn btn-default"
	                    title="Cancelar"
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
                    				<p>¿Estás seguro de querer cancelar a la orden <?php echo $key->id_order; ?>?</p>
                				</div>
                				<div class="modal-footer">
									<?php echo form_open('order/delete_order'); ?>
									<input type="hidden" id="id_client" name="id_client" value=" <?php echo $id_company; ?>">
                    					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    					<input type="submit" class="btn btn-success" name="<?php echo $key->id_order; ?>" value="Cancelar">
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