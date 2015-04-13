	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="col-md-11" style="padding: 0px;  margin-bottom: 10px;">
					<div>
						<?php 
							echo '<img src="'. base_url() . '/img/bannerPrincipal/LOGO.jpg" style="width:100%; height:auto">';
						?>
					</div>
				</div>
				<div>&nbsp</div>
				<?php
					if(is_array($messages)){
				?>
				<div class="col-md-6 pad">
					<div class="message-heading">
						<h3 class="message-title"><i class="fa fa-clock-o"></i> Pagos</h3>
					</div>
					<div class="message-body">
						<?php
							echo "<h4>". $messages[0]->message."</h4>";
						?>
					</div>
				</div>
				<?php
				}else{
					?>
				<div class="col-md-6 pad">
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
				<div>&nbsp</div>
				<div class="col-md-5 gray">
					<div class="container fill">
					<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
				    	<!-- Carousel indicators -->
				          
				       <!-- Carousel items -->
				        <div class="carousel-inner">
				        	<?php
				        	if(is_array($publicity)){
								$i=1;
				        		foreach ($publicity as $key) {
				        			echo '<div class="item" id="'.$i.'">';
				        			echo '<a href="/plantanova/index.php/client/colaboradores/'.$i.'" ><img src="'.base_url().'img/Publicidad/'.$key->p_thum.'" class="caru-img"></a>';
				        			echo '</div>'; 
				        			$i++;				        		
				        		}
				        	}else{
			        			echo '<img src="'.base_url().'img/plantanovaicongrand.png" class="caru-img">';

				        	}
				        		
				        	?>
				           
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
				<div>&nbsp</div>
				<div class="col-md-11" style="padding: 0px;">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-book"></span> PEDIDOS </h3>
					</div>
					<div class="panel-body">	
						<div class="table-responsive" id="area">
							<?php include_once('application/views/extra/tabla_pedidos_cliente.php');?>
						</div>	
					</div>
						
				</div>
			</div>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->


<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
    		<div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    			<h4 class="modal-title">Alerta</h4>	  
    		</div>
    		<div class="modal-body">
    			<h4>¡Hola <?php echo $user[0]->farm_name; ?>!</h4>
    			<?php
    				if(is_array($alerts)){
    					echo "<p>".$alerts[0]->message."</p>";
    				}
					
				?> 		
    		</div>
    		<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<?php 
if($this->uri->segment(3)==1 && $user[0]->message_status==1){
?>
	<script type="text/javascript">
	    $(window).load(function(){
	        $('#myModal').modal('show');
	    });
	</script>
<?php
}
?>
