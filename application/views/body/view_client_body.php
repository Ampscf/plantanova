	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="col-md-8">
					<div>
						<?php 
							echo '<img src="'. base_url() . '/img/LOGOS_plantanova_AVANZAMOS.jpg" style="width:100%; height:500px">';
						?>
					</div>
				</div>
				<?php
					if(is_array($messages)){
				?>
				<div class="col-md-4 pad">
					<div class="message-heading">
						<h3 class="message-title"><i class="fa fa-clock-o"></i> Pagos</h3>
					</div>
					<div class="message-body">
						<?php
							echo "<h4>". $messages[0]->comment_description."</h4>";
						
						?>
					</div>
				</div>
				<?php
				}else{
					?>
				<div class="col-md-4 pad">
					<div class="message-heading">
						<h3 class="message-title"><i class="fa fa-star-o"></i> Bienvenido</h3>
					</div>
					<div class="message-body">
						<?php
							echo "<h4>Bienvenido a PlantaNova</h4>";
						
						?>
					</div>
				</div>
				<?php
				}
				?>
				<div class="clear">&nbsp</div>
				<div class="col-md-4 gray">
					<div class="container fill">
					<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
				    	<!-- Carousel indicators -->
				          
				       <!-- Carousel items -->
				        <div class="carousel-inner">
				            <div class="item" id="1">				      
				               	<img src="<?php echo base_url();?>img/Publicidad/semillas-calabaza.jpg" class="caru-img">
				            </div>
				            <div class="item" id="2">
				            	<img src="<?php echo base_url();?>img/Publicidad/download.jpg" class="caru-img">
				            </div>
				            <div class="item" id="3">
				            	<img src="<?php echo base_url();?>img/Publicidad/nova.jpg" class="caru-img">
				            </div>
				        </div>
				        <script>
				            document.getElementById('1').className="active item";
				        </script>
				        <!-- Carousel nav -->
				        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
				            <span class="glyphicon glyphicon-chevron-left"></span>
				        </a>
				        <a class="carousel-control right" href="#myCarousel" data-slide="next">
				            <span class="glyphicon glyphicon-chevron-right"></span>
				        </a>
				    </div>
				    </div>
				</div>
				<div class="clear">&nbsp</div>
				<div class="panel panel-default">
					
					<div class="order-navs">
						<ul class="nav nav-pills">
							<li class="active"><?php echo anchor('client/index#area', 'Nuevos') ?></li>
							<li><?php echo anchor('client/pedido_proceso#area', 'En proceso') ?></li>
							<li><?php echo anchor('client/pedido_embarcado#area', 'Embarcados') ?></li>
							<li><?php echo anchor('client/finalizado#area', 'Finalizados') ?></li>	
							<li><?php echo anchor('client/todos#area', 'Todos') ?></li>
						</ul>
					</div>

					<div class="panel-body">	
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_pedidos_cliente.php');?>
						</div>	
					</div>
						
				</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->