	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-tags"></i> Mensajes </h3>
					</div>
					<div class="panel-body">
						<?php
							$attributes=array('id' => 'form_message', 'name'=> 'form_message');
							echo form_open('admin/message',$attributes);
						?>
						<div class="col-xs-10 col-md-4 center-block">
							<div class="input-group">
								<p>Cleinte</p>
								<select class="form-control" name="client" id="client" >
									<option value="-1" selected>---Selecciona un Cliente---</option>
									<?php 
										foreach($client as $key)
										{
											echo "<option value='$key->id_user'>" . $key->farm_name ."</option>";
										}
										
									?>	
								</select>
							</div><!-- End Cantidad -->	
							<div class="clear">&nbsp</div>
							<div class="input-group">
								<p>Pop-up de Alerta</p>
								<input type="radio" name="status" id="activate" value="1" cheked >Activado
								<input type="radio" name="status" id="disable" value="0" >Desactivado
							</div>
							<div class="clear">&nbsp</div>
							<div id="div_message">
								<div class="input-group">
									<p>Tipo de Mensage:</p>
									<select class="form-control" name="type" id="type" >
										<option value="-1" selected>---Selecciona un Tipo de Mensaje---</option>
										<option value="1">Pago</option>
										<option value="2">Alerta</option>
									</select>
								</div><!-- End Cantidad -->	
								<div class="clear">&nbsp</div>
								<div class="input-group">
									<p>Mensage</p>
									<textarea class="form-control" rows="4" style="height: auto !important;" id="message" name="message"></textarea>								
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer alignright">
							<button type="submit" class="btn btn-success" name="enviar" id="enviar" style="width: 20%;">Enviar</button>
						
						</div>	
				</form>
				</div>
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
						        }
							},
							messages:{
								client: {
						            min: "Selecciona un Cliente"
						        }
							}
						});

				</script>
			</div>	
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->


				