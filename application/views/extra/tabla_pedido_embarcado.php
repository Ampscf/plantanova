<table class="table table-hover" id="tabla-pedidos">
	<thead>
		<th class="col-md-1"># Pedido</th>
		<th>Agricultor</th>
		<th>Fecha</th>
		<!--<th>Empresa</th>
		<th>Categoría</th>
		<th>Planta</th>-->
		<th>Tranportador</th>
		<th>Volúmen Pedido</th>
		<th>Volúmen Embarcado</th>
		<th>Comentario</th>
		<th>Resumen</th>
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
				echo "<td>" . date("d-m-Y",strtotime($embarque[0]->date)) . "</td>";
				/*$cliente=$this->model_breakdown->get_user($key->id_client);
				echo "<td>" . $cliente[0]->farm_name . "</td>";
				$category=$this->model_breakdown->get_category($key->id_category);
				echo "<td>" . $category[0]->category_name . "</td>";
				$plant=$this->model_breakdown->get_plant($key->id_plant);
				echo "<td>" . $plant[0]->plant_name . "</td>";
				*/
				echo "<td>".$embarque[0]->transporter."</td>";
				echo "<td>" . number_format($key->total_volume) . "</td>";
				echo "<td>" . number_format($embarque[0]->final_volume) . "</td>";
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
				echo "<td>";
				?>
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Resumen"
	                    href=<?php echo site_url("breakdown/final_resume/$key->id_order");?>>
	                    <i class="fa fa-file-text-o"></i>
	                </a>
			<?php
				echo "</td>";
				echo "<td>";?>
				
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Modificar"
	                   href="edit_embark/<?php echo $key->id_order ?>">
	                    <i class="fa fa-edit"></i>
	                   
	                </a>
	         <?php
	         echo "</td>";
				echo "</tr>";
			
			}
		}
		?>
	</tbody>
</table>