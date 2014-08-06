<table class="table table-hover" id="tabla-pedidos">
	<thead>
		<th class="col-md-1"># Pedido</th>
		<th>Agricultor</th>
		<th>Fecha</th>
		<th>Empresa</th>
		<th>Categoría</th>
		<th>Planta</th>
		<!--<th>Tranportador</th>-->
		<th>Volúmen Pedido</th>
		<!--<th>Volúmen Embarcado</th>
		<th>Comentario</th>-->
		<th>Resumen Orden</th>
		<th>Resumen Embarque</th>
		<th>Editar</th>
	</thead>
	<tbody>
		<?php 
		if(is_array($pedidos_embarcados))
		{
			foreach ($pedidos_embarcados as $key) 
			{
				$embarque=$this->model_breakdown->get_embark($key->id_order);
				echo "<tr>";
				echo "<td>" . $key->id_order . "</td>";
				echo "<td>" . $key->farmer . "</td>";
				echo "<td>" . date("d-m-Y",strtotime($key->order_date_submit)) . "</td>";
				$cliente=$this->model_breakdown->get_user($key->id_client);
				echo "<td>" . $cliente[0]->farm_name . "</td>";
				$category=$this->model_breakdown->get_category($key->id_category);
				echo "<td>" . $category[0]->category_name . "</td>";
				$plant=$this->model_breakdown->get_plant($key->id_plant);
				echo "<td>" . $plant[0]->plant_name . "</td>";
				
				//echo "<td>".$embarque[0]->transport."</td>";
				echo "<td>" . number_format($key->total_volume) . "</td>";
				/*echo "<td>" . number_format($embarque[0]->volume) . "</td>";
				if($embarque[0]->comment != null){
				echo "<td>" ?>

					<a href="#myModal2<?php echo $embarque[0]->id_embark; ?>" class="btn btn-default"
	                    title="Comentario"
	                    data-toggle="modal">
						<i class="fa fa-comment-o"></i>
	                </a>
					
					<div id="myModal2<?php echo $embarque[0]->id_embark  ?>" class="modal fade">
        				<div class="modal-dialog">
            				<div class="modal-content">
                				<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    				<h4 class="modal-title">Comentario</h4>
                				</div>
                				<div class="modal-body">
                    				<p><?php echo $embarque[0]->comment;?></p>
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
				*/echo "<td>";
				?>
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Resumen Orden"
	                    href=<?php echo site_url("breakdown/final_resume/$key->id_order");?>>
	                    <i class="fa fa-file-text-o"></i>
	                </a>
			<?php
				echo "</td>";
				echo "<td>";
				?>
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Resumen Embarque"
	                    href=<?php echo site_url("breakdown/resume_embark/$key->id_order");?>>
	                    <i class="fa fa-file-text-o"></i>
	                </a>
			<?php
				echo "</td>";
				echo "<td>";?>

				<a href="#myModal3<?php echo $embarque[0]->id_embark; ?>" class="btn btn-default"
	                    title="Modificar Proceso"
	                    data-toggle="modal">
						<i class="fa fa-list-alt"></i>
	                </a>

	                <a href="#myModal4<?php echo $embarque[0]->id_embark; ?>" class="btn btn-default"
	                    title="Modificar Embarque"
	                    data-toggle="modal">
						<i class="fa fa-edit"></i>
	                </a>

	                <a href="#myModal5<?php echo $embarque[0]->id_embark; ?>" class="btn btn-default"
	                    title="Finalizar"
	                    data-toggle="modal">
						<i class="fa fa-archive"></i>
	                </a>
				
					<?php  echo form_open('breakdown/edit_process/'.$key->id_order); ?>	  
		                <div id="myModal3<?php echo $embarque[0]->id_embark; ?>" class="modal fade">
	        				<div class="modal-dialog">
	            				<div class="modal-content">
	                				<div class="modal-header">
	                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    				<h4 class="modal-title"></h4>
	                				</div>
	                				<div class="modal-body">
	                    				<p>¿Seguro que deseas editar este pedido?</p>
	                				</div>
	                				<div class="modal-footer">
	                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    				<button type="submit" class="btn btn-success">Modificar</button>
	                    			</div>
	            				</div>
	        				</div>
	    				</div>
	    			</form>

	    			<?php echo form_open('embark/index/'.$key->id_order.'/1'); ?>	  
		                <div id="myModal4<?php echo $embarque[0]->id_embark; ?>" class="modal fade">
	        				<div class="modal-dialog">
	            				<div class="modal-content">
	                				<div class="modal-header">
	                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    				<h4 class="modal-title"></h4>
	                				</div>
	                				<div class="modal-body">
	                    				<p>¿Seguro que deseas editar la información del embarque?</p>
	                				</div>
	                				<div class="modal-footer">
	                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    				<button type="submit" class="btn btn-success">Modificar</button>
	                    			</div>
	            				</div>
	        				</div>
	    				</div>
	    			</form>

	    			<?php  echo form_open('breakdown/edit_embark/'.$key->id_order); ?>	  
		                <div id="myModal5<?php echo $embarque[0]->id_embark; ?>" class="modal fade">
	        				<div class="modal-dialog">
	            				<div class="modal-content">
	                				<div class="modal-header">
	                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    				<h4 class="modal-title"></h4>
	                				</div>
	                				<div class="modal-body">
	                    				<p>¿Seguro que deseas finalizar este pedido?</p>
	                				</div>
	                				<div class="modal-footer">
	                    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    				<button type="submit" class="btn btn-success">Modificar</button>
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