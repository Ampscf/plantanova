<div align="center">
<h2>Pedidos</h2>
<ul class="nav nav-tabs nav-justified">
  	<li class="active"><a href="#nuevos" data-toggle="tab">Nuevos</a></li>
  	<li><a href="#proceso" data-toggle="tab">En Proceso</a></li>
  	<li><a href="#entregados" data-toggle="tab">Entregados</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane fade in active" id="home">...</div>
  <div class="tab-pane fade" id="profile">...</div>
  <div class="tab-pane fade" id="messages">...</div>
  <div class="tab-pane fade" id="settings">...</div>
</div>

	<table border="1" class="table">
		<tr>
			<td><b> #Pedido </b></td>
			<td><b> Fecha de entrega </b></td>
			<td><b> Planta </b></td> 
			<td><b> Categoria  </b></td>
			<td><b> Cliente  </b></td>
		</tr>
		<tr>
			<td><?php echo anchor('Order_controller/pedido1/', '1');?></td>
			<td>05/05/2014</td>
			<td>Sandia</td>
			<td>Orden</td>
			<td>Jorge Torres</td>
	    </tr>
		<tr>
			<td><?php echo anchor('Order_controller/index/', '2');?></td>
			<td>10/12/2014</td>
			<td>Tomate</td>
			<td>Orden</td>
			<td>Jorge Torres</td>
	    </tr>	
		<tr>
			<td><?php echo anchor('Order_controller/index/', '3');?></td>
			<td>09/08/2014</td>
			<td>Tomate</td>
			<td>Orden</td>
			<td>Jorge Torres</td>
	    </tr>
		<tr>
			<td><?php echo anchor('Order_controller/index/', '4');?></td>
			<td>21/06/2014</td>
			<td>Tomate</td>
			<td>Orden</td>
			<td>Jorge Torres</td>
	    </tr>
	</table>
</div>