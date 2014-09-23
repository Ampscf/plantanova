	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-certificate"></i> Terminos y Condiciones </h3>
				</div>
					<div class="panel-body">
						<?php echo form_open('client/acept_terms');?>
						<div id="terms" style="overflow: scroll; height:300px">
							Aqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condicionesAqui van los terminos y condiciones
						</div>
						<div>
							<div>&nbsp</div>
							<input type="checkbox" id="checkterms" name="checkterms"> He leído y acepto los Términos y Condiciones
						</div>

					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-3 col-md-offset-9">
								<input class="btn btn-success btn-block" type="submit" value="Continuar"  id="botoncontinuar" disabled="true">
							</div>
						</div><!-- End row -->
					</div><!-- End panel-footer -->
				</form>
				</div>
			</div>
		</div> <!-- End row -->	
	</div> <!-- End container -->	
</div> <!-- End content div -->

<script>
	$("#checkterms").click(function() {  
		if (document.getElementById("checkterms").checked){
			document.getElementById("botoncontinuar").disabled = false;
		}
		else {
			document.getElementById("botoncontinuar").disabled = true;
		}
	});
</script>

