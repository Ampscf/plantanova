	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-tags"></i> Publicidad </h3>
					</div>
					<div class="panel-body">
						<div class="col-md-7">
							<?php echo form_open('publicity/send_publicity/'); ?>
							<div class="clear">&nbsp</div>
							<h3>Seleccionar cliente</h3>
							<select class="form-control" name="client" id="client">
								<?php 
									foreach($users as $key)
									{
										echo "<option value='" . $key->id_user . "' set_select('state','".$key->id_user."')>" . $key->farm_name . "</option>";
									}
								?>
							</select>
							<div class="clear">&nbsp</div>
							<h3>Selecciona la publicidad a enviar</h3>
							<select class="form-control" name="publicity" id="publicity">
									<option value="-1" selected>---Selecciona una publicidad---</option>
								<?php 
									foreach($publicity as $key)
									{
										echo "<option value='" . $key->id_publicity . "' set_select('state','".$key->id_publicity."')>" . $key->p_name . "</option>";
									}
								?>
							</select>
							<div class="clear">&nbsp</div>
							<div id="p2" class="img-previ"></div> 
							<div class="clear">&nbsp</div>
						</div>
						<script>
						$("#publicity").change(function(event) {
			
						 	var posicion=document.getElementById('publicity').value;
				           
				           $.ajax({
							url: site_url + 'publicity/get_publicity_image',
							data: {'id_publicity':+posicion},
							type: "POST",
							success: function(data){
								$("#p2").html(data);
								//alert(data);
							},
							failure:function(data){
								alert("fallo");
							}	
							});
				        });
						</script>
					</div>
					<div class="panel-footer">
						<div class="row">							
							<div class="col-md-3 col-md-offset-1">
								<?php  
								$data = array(
									'class'	=> 'btn btn-primary btn-block',
									'name' => 'Regresar',
								);
								echo anchor('breakdown/index', 'Regresar', $data);
							?>
							</div>
							<div class="col-md-3 col-md-offset-4">
								<button type="submit" class="btn btn-success btn-block" style="float: right">Mandar</button>
							</div>
						</form>
						</div>	
					</div>	
				</div>
			</div>	
		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- End content div -->

