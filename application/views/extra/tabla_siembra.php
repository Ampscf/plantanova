<table class="table table-hover" id="tabla-empresa">
		<th>Cantidad</th>
		<th>Fecha</th>
		<th>Semilla</th>
		<th>Comentario</th>
		<th>Eliminar</th>
	
		<?php 
		if(is_array($sowing))
		{
			foreach ($sowing as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->volume . "</td>";
				echo "<td>" . date("Y-m-d",strtotime($key->sowing_date)) . "</td>";
				//$breakdownn=$this->model_order->get_breakdown_id_breakdown($key->id_breakdown);
				echo "<td>" . $key->seed. "</td>";
				if($key->comment != null){
				echo "<td>" ?>

					<a href="#myModal2<?php echo $key->id_sowing; ?>" class="btn btn-default"
	                    title="Comentario"
	                    data-toggle="modal">
						<i class="fa fa-comment-o"></i>
	                </a>
					
					<div id="myModal2<?php echo $key->id_sowing;  ?>" class="modal fade">
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
				echo "<td>";?>
				
					<a href="#myModal<?php echo $key->id_sowing; ?>" class="btn btn-default"
	                    title="Eliminar"
	                    data-toggle="modal">
						<i class="fa fa-times"></i>
	                </a>
					
					<div id="myModal<?php echo $key->id_sowing; ?>" class="modal fade">
        				<div class="modal-dialog">
            				<div class="modal-content">
                				<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    				<h4 class="modal-title">Confirmación</h4>
                				</div>
                				<div class="modal-body">
                    				<p>¿Estás seguro de querer eliminar este registro?</p>
                				</div>
                				<div class="modal-footer">
									<?php echo form_open('order/delete_sowing/'.$this->uri->segment(3)); ?>
                    					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    					<button type="submit" class="btn btn-success" name="<?php echo $key->id_sowing; ?>">Confirmar</button>
                					</form><!--endform2-->
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
	
</table>
