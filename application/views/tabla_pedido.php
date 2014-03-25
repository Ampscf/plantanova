<table class="table table-hover">
	<tr>
		<td><b> #Pedido </b></td>
		<td><b> Fecha de entrega </b></td>
		<td><b> Planta </b></td> 
		<td><b> Categoria  </b></td>
		<td><b> Cliente  </b></td>
	</tr>
	<tr>
		<td><?php echo anchor('Order_controller/pedidos/', '1');?></td>
		<td>05/05/2014</td>
		<td>Sandia</td>
		<td>Orden</td>
		<td>Jorge Torres</td>
	</tr>
	<tr>
		<td><?php echo anchor('Order_controller/pedidos/', '2');?></td>
		<td>05/15/2014</td>
		<td>Tomate</td>
		<td>Orden</td>
		<td>Jorge Torres</td>
	</tr>	
	<tr>
		<td><?php echo anchor('Order_controller/pedidos/', '3');?></td>
		<td>05/25/2014</td>
		<td>Tomate</td>
		<td>Orden</td>
		<td>Jorge Torres</td>
	</tr>
	<tr>
		<td><?php echo anchor('Order_controller/pedidos/', '4');?></td>
		<td>06/04/2014</td>
		<td>Tomate</td>
		<td>Orden</td>
		<td>Jorge Torres</td>
	</tr>
</table>