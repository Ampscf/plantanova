<div align="center">
<h2>Pedidos en tránsito</h2>
<table border="1" class="table">
	<tr>
		<td><b> #Pedido </b></td>
		<td><b> Fecha de entrega </b></td>
		<td><b> Planta </b></td> 
		<td><b> Categoría  </b></td>
		<td><b> Cliente  </b></td>
	</tr>
	<tr>
		<td><?php echo anchor('Order_controller/pedido1/', '1');?></td>
		<td>05/05/2014</td>
		<td>Sandía</td>
		<td>Orden</td>
		<td>Jorge Torres</td>
    </tr>
	<tr>
		<td><?php echo anchor('Order_controller/pedido2/', '2');?></td>
		<td>10/12/2014</td>
		<td>Tomate</td>
		<td>Orden</td>
		<td>Jorge Torres</td>
    </tr>	
	<tr>
		<td><?php echo anchor('Order_controller/pedido3/', '3');?></td>
		<td>09/08/2014</td>
		<td>Tomate</td>
		<td>Orden</td>
		<td>Jorge Torres</td>
    </tr>
	<tr>
		<td><?php echo anchor('Order_controller/pedido4/', '4');?></td>
		<td>21/06/2014</td>
		<td>Tomate</td>
		<td>Orden</td>
		<td>Jorge Torres</td>
    </tr>
</table>

<div class="col-md-10 col-md-offset-1" align="center" id="tabs-pedidos">
	<h2>Pedidos</h2>
	<ul id="navtabs" class="nav nav-tabs">
	  	<li class="active">
	  		<a href="nuevos" data-toggle="tab">Nuevos</a>
	  	</li>
	  	<li>
	  		<a href="proceso" data-toggle="tab">En Proceso</a>
	  	</li>
	  	<li>
	  		<a href="completados" data-toggle="tab">Completados</a>
	  	</li>
	</ul>
	<div class="tab-content">
	  	<?php include_once('tabla_pedido.php'); ?>
	</div>

</div>