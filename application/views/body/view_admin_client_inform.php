	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-tags"></i> Informe del Cliente </h3>
					</div>
					
					<div class="panel-body">

						<?php
							$attributes=array('id' => 'form_message', 'name'=> 'form_message');
							echo form_open('admin/message',$attributes);
						?>
						<div class="col-md-4">
							<div class="input-group">
								<p>Cliente</p>
								<select class="form-control" name="client" id="client" onchange="get_order_client(this.value)">
									<option value="-1" selected>---Selecciona un Cliente---</option>
									<?php 
										foreach($client as $key)
										{
											echo "<option value='$key->id_user'>" . $key->farm_name ."</option>";
										}
										
									?>	
								</select>
							</div><!-- Client -->	
						</div>
						<div class="col-md-4">
							<div class="input-group">
								<p>Orden</p>
								<select class="form-control" name="order_client" id="order_client" onchange="get_breakdown_order(this.value)">
									<option value="-1" selected>---Selecciona una Orden---</option>
								</select>
							</div><!-- Client -->	
						</div>
						<div class="col-md-12">
							<div class="input-group">
								<p>Informes</p>
								<div id="informes">
								</div>
							</div><!-- Client -->	
						</div>
						<div class="clear">&nbsp</div>
						<div class="col-md-12" id="error">
							<h5 style="color:red;"><?php 
								
								echo $this->session->flashdata('error');	
								
							?></h5>
						</div>

					</div>
					<div class="panel-footer">
						<button type="submit" class="btn btn-success" name="enviar" id="enviar" style="width: 20%;">Enviar</button>
					</div>	
				</form>
				</div>
				<script>
					

				</script>
			</div>	
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->

<script>
	$('#enviar').click(function() {
		var btn = $(this)
	    btn.button('loading')
	    setTimeout(function () {
	        btn.button('reset')
	    }, 3000)
	});

	$("#form_message").validate({
		rules:{
			client: {
	            min: 0
	        },
	        order_client:{
	        	min:0
	        }
		},
		messages:{
			client: {
	            min: "Selecciona un Cliente"
	        },
	       	order_client:{
	        	min:"Selecciona una Orden"
	        }
		}
	});
	

</script>


				