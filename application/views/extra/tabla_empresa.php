<table class="table table-hover" id="tabla-empresa">
	<thead>
		<th class="col-md-1"># Cliente</th>
		<th>Empresa</th>
		<th>RFC</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Opciones</th>
	</thead>
	<tbody>
		<?php 
		if(isset($users))
		{
			foreach ($users as $key) 
			{
				echo "<tr>";
				echo "<td>" . $key->id_user . "</td>";
				echo "<td>" . $key->farm_name . "</td>";
				echo "<td>" . $key->rfc . "</td>";
				echo "<td>" . $key->first_name . "</td>";
				echo "<td>" . $key->last_name . "</td>";
				echo "<td>";?>
				
					<a class="btn btn-default"
	                    rel="tooltip"
	                    data-placement="top"
	                    title="Modificar"
	                   href="edit/<?php echo $key->id_user ?>">
	                    <i class="fa fa-edit"></i>
	                   
	                </a>
	                 
					 
	                <a href="#myModal<?php echo $key->id_user; ?>" class="btn btn-default"
	                    title="Eliminar"
	                    data-toggle="modal">
						<i class="fa fa-times"></i>
	                </a>
					
					<div id="myModal<?php echo $key->id_user; ?>" class="modal fade">
        				<div class="modal-dialog">
            				<div class="modal-content">
                				<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    				<h4 class="modal-title">Confirmación</h4>
                				</div>
                				<div class="modal-body">
                    				<p>¿Estás seguro de querer eliminar a la empresa <?php echo $key->farm_name; ?>?</p>
                				</div>
                				<div class="modal-footer">
									<?php echo form_open('admin/delete_client'); ?>
                    					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    					<button type="submit" class="btn btn-success" name="<?php echo $key->id_user; ?>">Confirmar</button>
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