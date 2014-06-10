<table class="table table-hover" id="tabla-empresa">
	<thead>
		<th class="col-md-1" style="width:68px;">Fecha</th>
		<th>Empresa</th>
		<th>Cantidad</th>
		<th>Nombre</th>
		<th>Tipo</th>
		<th>Lote</th>
		<th>#Pedido</th>
		<th>Modificar/Eliminar</th>
	</thead>
	<tbody>
		<?php 
		if(isset($seeds))
		{
			foreach ($seeds as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->seeds_date . "</td>";
				echo "<td>" . $key->farm_name . "</td>";
				echo "<td>" . $key->volume . "</td>";
				echo "<td>" . $key->seed_name . "</td>";
				echo "<td>" . $key->type . "</td>";
				echo "<td>" . $key->batch . "</td>";
				echo "<td>" . $key->id_order . "</td>";
				echo "<td>";?>
				
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Modificar"
	                   href="edit_seeds/<?php echo $key->id_seed; ?>">
	                    <i class="fa fa-edit"></i>
	                   
	                </a>
	                 
					 
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
                    				<p>¿Estás seguro de querer eliminar este formulario de semillas?</p>
                				</div>
                				<div class="modal-footer">
									<?php echo form_open('seeds/delete_seed'); ?>
                    					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    					<button type="submit" class="btn btn-success" name="<?php echo $key->id_seed; ?>">Confirmar</button>
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
