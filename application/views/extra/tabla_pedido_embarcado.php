<table class="table table-hover" id="tabla-pedidos">
	<thead>
		<th class="col-md-1"># Pedido</th>
		<th>Agricultor</th>
		<th style="width:165px">Fecha</th>
		<th>Empresa</th>
		<th>Categoría</th>
		<th>Planta</th>
		<th>Volúmen Pedido</th>
		<th>Resumen</th>
		<th>Editar</th>
		<th>Comentario</th>
		<th>Finalizar/Cancelar</th>
		
	</thead>
	<tbody>
		<?php 
		if(is_array($pedidos_embarcados))
		{
			foreach ($pedidos_embarcados as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->order_number . "</td>";
				echo "<td>" . $key->farmer . "</td>";
				echo "<td>" . date("d-m-Y",strtotime($key->order_date_submit)) . "</td>";
				$cliente=$this->model_breakdown->get_user($key->id_client);
				echo "<td>" . $cliente[0]->farm_name . "</td>";
				$category=$this->model_breakdown->get_category($key->id_category);
				echo "<td>" . $category[0]->category_name . "</td>";
				$plant=$this->model_breakdown->get_plant($key->id_plant);
				echo "<td>" . $plant[0]->plant_name . "</td>";
				echo "<td>" . number_format($key->total_volume) . "</td>";
				echo "<td>";
				?>
				 <p>
	                <a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Resumen Embarque"
	                    href=<?php echo site_url("embark/resume_embark/$key->id_order");?>>
	                    <i class="fa fa-file-o"></i>
	                </a>
	            </p>
	            <p>
	                <a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Resumen Proceso"
	                    href=<?php echo site_url("breakdown/final_resume/$key->id_order");?>>
	                    <i class="fa fa-file-text"></i>
	                </a>
	            </p>
	           
			<?php
				echo "</td>";
				echo "<td>";?>

				
	            <p>
	                <a href="#myModal4<?php echo $key->id_order; ?>" class="btn btn-default"
	                    title="Modificar Embarque"
	                    data-toggle="modal">
						<i class="fa fa-edit"></i>
	                </a>
	            </p>
	            <p>
					<a href="#myModal3<?php echo $key->id_order; ?>" class="btn btn-default"
	                    title="Modificar Proceso"
	                    data-toggle="modal">
						<i class="fa fa-pencil"></i>
	                </a>
	            </p>
					<?php  echo form_open('breakdown/edit_process/'.$key->id_order); ?>	  
		                <div id="myModal3<?php echo $key->id_order; ?>" class="modal fade">
	        				<div class="modal-dialog">
	            				<div class="modal-content">
	                				<div class="modal-header">
	                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    				<h4 class="modal-title">Modificar pedido</h4>
	                				</div>
	                				<div class="modal-body">
	                    				<p>¿Seguro que deseas editar este pedido?</p>
	                				</div>
	                				<div class="modal-footer">
	                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    				<button type="submit" class="btn btn-success" id="modPedido">Modificar</button>
	                    			</div>
	            				</div>
	        				</div>
	    				</div>
	    			</form>
	    			<script>
						$('#modPedido').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});
					</script>
	    			<?php echo form_open('embark/index/'.$key->id_order.'/1'); ?>	  
		                <div id="myModal4<?php echo $key->id_order; ?>" class="modal fade">
	        				<div class="modal-dialog">
	            				<div class="modal-content">
	                				<div class="modal-header">
	                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    				<h4 class="modal-title">Modificar embarque</h4>
	                				</div>
	                				<div class="modal-body">
	                    				<p>¿Seguro que deseas editar la información del embarque?</p>
	                				</div>
	                				<div class="modal-footer">
	                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    				<button type="submit" class="btn btn-success" id="modEmbarque">Modificar</button>
	                    			</div>
	            				</div>
	        				</div>
	    				</div>
	    			</form>
					<script>
						$('#modEmbarque').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});
					</script>
	    			<?php  echo form_open('breakdown/finish/'.$key->id_order); ?>	  
		                <div id="myModal5<?php echo $key->id_order; ?>" class="modal fade">
	        				<div class="modal-dialog">
	            				<div class="modal-content">
	                				<div class="modal-header">
	                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    				<h4 class="modal-title">Finalizar pedido</h4>
	                				</div>
	                				<div class="modal-body">
	                    				<p>¿Seguro que deseas finalizar este pedido?</p>
	                				</div>
	                				<div class="modal-footer">
	                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    				<button type="submit" class="btn btn-success" id="finish">Finalizar</button>
	                    			</div>
	            				</div>
	        				</div>
	    				</div>
	    			</form>	
	    			<script>
						$('#finish').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});
					</script>
	         <?php
	         echo "</td>";
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
	         echo "<td>";?>
	         		 <a href="#myModal5<?php echo $key->id_order; ?>" class="btn btn-default"
	                    title="Finalizar"
	                    data-toggle="modal">
						<i class="fa fa-check"></i>
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
                    					<button type="submit" class="btn btn-success" id="cancel" name="<?php echo $key->id_order; ?>">Confirmar</button>
                					</form>
								</div>
            				</div>
        				</div>
    				</div>
    				<script>
						$('#cancel').click(function() {
					    	var btn = $(this)
					        btn.button('loading')
					        setTimeout(function () {
					            btn.button('reset')
					        }, 2000)
						});
					</script>
		<?php 
				echo "</td>";
				echo "</tr>";
			}
		}
		?>
	</tbody>
</table>