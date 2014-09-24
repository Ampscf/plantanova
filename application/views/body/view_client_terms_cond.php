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
							<h1>Aviso de Privacidad</h1>
							<p>Los Datos Personales que nos proporciona, son tratados por Plantanova, S.A. de C.V., (en adelante “Plantanova”), con domicilio Prolongación Zaragoza S/N, Cofradía de Guadalupe, Tuxpan, Michoacan, con las siguientes finalidades primarias:</p> 
							<p>•	Emitir la factura electrónica 
							•	Asesar al Software de atención de clientes Plantanova; y
							•	Dar cumplimiento a la legislación fiscal vigente.</p>
							<p>Nos abstendremos de vender, arrendar o alquilar sus Datos Personales. Podremos llegar a compartir sus Datos Personales, en cumplimiento a las obligaciones contempladas en la legislación fiscal aplicable, y/o a los requerimientos por parte de autoridades locales y federales. </p></p>
							<p>En virtud de lo anterior, dichas personas no podrán utilizar la información proporcionada por Plantanova de manera diversa a la establecida en el presente Aviso de Privacidad. Estas transferencias de Datos Personales serán realizadas con todas las medidas de seguridad apropiadas, de conformidad con los principios contenidos en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, su Reglamento y los Lineamientos del Aviso de Privacidad (en adelante y conjuntamente “La Legislación”). </p>
							<p>Los Datos Personales que nos ha proporcionado, serán conservados por un periodo de 5 años en medios físicos y electrónicos y posteriormente descartados a efecto de evitar un tratamiento indebido de los mismos. </p>
							<p>Sus Datos Personales serán tratados con base en los principios de licitud, consentimiento, información, calidad, finalidad, lealtad, proporcionalidad y responsabilidad en términos de la Legislación. Se mantendrá la confidencialidad de sus datos personales estableciendo y manteniendo de forma efectiva las medidas de seguridad administrativas, técnicas y físicas, para evitar su daño, pérdida, alteración, destrucción, uso, acceso o divulgación indebida. </p>


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

