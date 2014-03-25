<table class="table table-hover">
	<tr>
		<td><b> #Pedido </b></td>
		<td><b> Fecha de entrega </b></td>
		<td><b> Planta </b></td> 
		<td><b> Categoria  </b></td>
		<td><b> Cliente  </b></td>
	</tr>
	<tr>
		<td><?php echo anchor('Order_controller/pedido/', '1');?></td>
		<td>05/05/2014</td>
		<td>Sandia</td>
		<td>Orden</td>
		<td>
		<?php 
			if(isset($tipo)){
				echo $tipo;
			}
			else{
				echo "Jorge Torresa";
			}
		?>
		</td>
	</tr>
	<tr>
		<td><?php echo anchor('Order_controller/pedido/', '2');?></td>
		<td>10/12/2014</td>
		<td>Tomate</td>
		<td>Orden</td>
		<td>Jorge Torres</td>
	</tr>	
	<tr>
		<td><?php echo anchor('Order_controller/pedido/', '3');?></td>
		<td>09/08/2014</td>
		<td>Tomate</td>
		<td>Orden</td>
		<td>Jorge Torres</td>
	</tr>
	<tr>
		<td><?php echo anchor('Order_controller/pedido/', '4');?></td>
		<td>21/06/2014</td>
		<td>Tomate</td>
		<td>Orden</td>
		<td>Jorge Torres</td>
	</tr>
</table>