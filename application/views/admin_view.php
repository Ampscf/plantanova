<script>
     var base_url = '<?php echo base_url(); ?>';
</script>
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
	  	<?php include('tabla_pedido.php'); ?>
	</div>
</div> <!-- End tabs-pedidos -->

