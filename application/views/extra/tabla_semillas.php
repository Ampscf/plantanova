<table class="table table-hover" id="tabla-empresa">

		<th class="col-md-1" style="width: 100px;">Fecha</th>
		<th>Semilla</th>
		<th>Cantidad</th>
		<th>Lote</th>
		<th>Marca</th>
		<th>% de germinación</th>
		<th>Eliminar</th>

	<tbody>
		<?php 
		if(isset($seeds))
		{
			foreach ($seeds as $key) 
			{
				echo "<tr>";
				echo "<td>" . date("d-m-Y",strtotime($key->seeds_date)) . "</td>";
				echo "<td>" . $key->seed_name . "</td>";
				echo "<td>" . number_format($key->volume) . "</td>";
				echo "<td>" . $key->batch . "</td>";
				echo "<td>" .$key->mark ."</td>";
				if($key->germ_percentage==0){
					echo "<td>N/A</td>";
				}else{
					echo "<td>" . $key->germ_percentage ."%"."</td>";
				}
				$sowing=$this->model_seeds->get_id_seed($key->id_seed);
				if ($sowing < 1){
					echo "<td>";?>	                 
					 
	                <a href="#myModal<?php echo $key->id_seed; ?>" class="btn btn-default"
	                    title="Eliminar"
	                    data-toggle="modal">
						<i class="fa fa-times"></i>
	                </a>
					
					<div id="myModal<?php echo $key->id_seed; ?>" class="modal fade">
        				<div class="modal-dialog">
            				<div class="modal-content">
                				<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    				<h4 class="modal-title">Confirmación</h4>
                				</div>
                				<div class="modal-body">
                    				<p>¿Estás seguro de querer eliminar esta semila?</p>
                				</div>
                				<div class="modal-footer">
									<?php echo form_open('seeds/delete_seed/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>
                    					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    					<button type="submit" class="btn btn-success" name="<?php echo $key->id_seed; ?>">Aceptar</button>
                					</form>
								</div>
            				</div>
        				</div>
    				</div>
		<?php 
				echo "</td>";

				}else{
					echo "<td></td>";
				}
				
				echo "</tr>";
			}
		}
		?>
	</tbody>
</table>
