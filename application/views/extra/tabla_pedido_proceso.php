<table class="table table-hover" id="tabla-pedidos">
	<thead>
		<th class="col-md-1"># Pedido</th>
		<th>Agricultor</th>
		<th style="width:172px">Fecha</th>
		<th>Empresa</th>
		<th>Categoría</th>
		<th>Planta</th>
		<th>Volúmen</th>
		<th>Comentario</th>
		<th>Resumen</th>
		<th>Editar/Cancelar</th>
		<th>Mensaje</th>
	</thead>
	<tbody>
		<?php 
		if(is_array($pedidos_proceso))
		{
			foreach ($pedidos_proceso as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->id_order . "</td>";
				echo "<td>" . $key->farmer . "</td>";
				echo "<td>" . date("d-m-Y",strtotime($key->order_date_delivery)) . "</td>";
				$cliente=$this->model_breakdown->get_user($key->id_client);
				echo "<td>" . $cliente[0]->farm_name . "</td>";
				$category=$this->model_breakdown->get_category($key->id_category);
				echo "<td>" . $category[0]->category_name . "</td>";
				$plant=$this->model_breakdown->get_plant($key->id_plant);
				echo "<td>" . $plant[0]->plant_name . "</td>";
				echo "<td>" . number_format($key->total_volume) . "</td>";
				echo "<td>" ?>
					
					<a href="#myModal2<?php echo $key->id_order; ?>" class="btn btn-default"
	                    title="Comentario"
	                    data-toggle="modal">
						<i class="fa fa-comment-o"></i>
	                </a>
					
					<?php echo form_open('breakdown/update_comment'); ?>
					<div id="myModal2<?php echo $key->id_order;  ?>" class="modal fade">
        				<div class="modal-dialog">
            				<div class="modal-content">
                				<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    				<h4 class="modal-title">Comentario</h4>
                				</div>
                				<div class="modal-body">
									<input type="hidden" value="<?php echo $key->id_order;?>" id="id" name="id">
									<textarea rows="4" cols="50" id="coment" name="coment"><?php echo $key->comment;?></textarea>                    				
                				</div>
                				<div class="modal-footer">
                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									<button type="submit" class="btn btn-default">Guardar</button>
                    			</div>
            				</div>
        				</div>
    				</div>
					</form>
				
				<?php
				echo "</td>";
				echo "<td>";
				?>
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Resumen Orden"
	                    href=<?php echo site_url("breakdown/order_resume_proceso/$key->id_order");?>>
	                    <i class="fa fa-file-text-o"></i>
	                </a>
	                <a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Resumen Proceso"
	                    href=<?php echo site_url("breakdown/final_resume/$key->id_order/2");?>>
	                    <i class="fa fa-file-text"></i>
	                </a>
				<?php
				echo "</td>";
				echo "<td>";?>
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Modificar"
	                   	href="process/<?php echo $key->id_order; ?>">
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
                    				<p>¿Estás seguro de querer cancelar el pedido <?php echo $key->id_order; ?>?</p>
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
				echo "<td>" ?>
					
					<a href="#myModal3<?php echo $key->id_order; ?>" class="btn btn-default"
	                    title="Mensaje"
	                    data-toggle="modal">
						<i class="fa fa-comments-o"></i>
	                </a>
					
					<?php echo form_open('breakdown/add_message/2'); ?>
					<div id="myModal3<?php echo $key->id_order;  ?>" class="modal fade">
        				<div class="modal-dialog">
            				<div class="modal-content">
                				<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    				<h4 class="modal-title">Mensaje</h4>
                				</div>
                				<div class="modal-body">
									<input type="hidden" value="<?php echo $key->id_order;?>" id="id" name="id">
									<?php 
										$message=$this->model_breakdown->get_message($key->id_order);
										if($message==false){
											$message="";
										}else{
											$message=$message[0]->comment_description;
										}

									?>
									<textarea rows="4" cols="50" id="message" name="message"><?php echo $message;?></textarea>                    				
                				</div>
                				<div class="modal-footer">
                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									<button type="submit" class="btn btn-success">Enviar</button>
                    			</div>
            				</div>
        				</div>
    				</div>
					</form>
				
				<?php
				echo "</td>";
				echo "</tr>";
			}
		}
		?>
	</tbody>
</table>
	
	
	