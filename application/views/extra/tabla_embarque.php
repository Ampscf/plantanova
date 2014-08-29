<table class="table table-hover" id="tabla-pedidos">
	<th># Embarque</th>
	<th>Fecha de Entrega</th>
	<th>Fecha de Arribo</th>
	<th>Volumen Embarcado</th>
	<th>Destino</th>
	<th>Transporte</th>
	<th>Fletera</th>
	<th>Eliminar</th>
	
	<?php 
	if(is_array($embarque_pedido))
	{
		foreach ($embarque_pedido as $key) 
		{
			echo "<tr>";
			echo "<td>" . $key->id_embark . "</td>";
			echo "<td>" . date("d-m-Y",strtotime($key->date_delivery)) . "</td>";
			echo "<td>" . date("d-m-Y",strtotime($key->date_arrival)) . "</td>";
			echo "<td>" . number_format($key->volume). "</td>";
			echo "<td>" . $key->destiny. "</td>";
			echo "<td>" . $key->transport. "</td>";
			echo "<td>" . $key->freight."</td>";
			echo "<td>";?>
			
				<a href="#myModal<?php echo $key->id_embark; ?>" class="btn btn-default"
		            title="Eliminar"
	                data-toggle="modal">
					<i class="fa fa-times"></i>
	            </a>
					
				<div id="myModal<?php echo $key->id_embark; ?>" class="modal fade">
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
								<?php echo form_open('embark/delete_embark/'.$this->uri->segment(3)."/".$this->uri->segment(4)); ?>
                   					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                   					<button type="submit" class="btn btn-success" name="<?php echo $key->id_embark; ?>">Confirmar</button>
               					</form><!--endform2-->
							</div>	
           				</div>
        			</div>
    			</div>
	<?php 
			echo "</td>";
		}
	}
	?>	
</table>