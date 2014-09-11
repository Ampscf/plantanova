<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   	$this->load->model('model_user','',TRUE);
	   	$this->load->model('model_order','',TRUE);
	   	$this->load->helper('url');
		
	}

	public function index()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_body.php';
		$template['footer'] = "footer/view_footer.php";
		//Manda los datos necesarios para cargar los pedidos y datos del usuario
		$template['pedidos'] = $this->model_order->get_orders('99');

		$this->load->view('main',$template);
	}
	
	//Manda a la forma que contiene la lista de todos los registros de los usuarios
	public function list_clients() 
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_companies.php';
		$template['footer'] = "footer/view_footer.php";
		//Manda los datos necesarios para cargar la lista de los usuarios del sistema
		$template['users'] = $this->model_user->get_clients();
		
		$this->load->view('main',$template);
	}

	//Manda la forma para el registro del cliente enviandole la lista de estados
	public function register_client_form()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['header'] = "header/view_admin_header.php";
		$template['body'] = "body/view_admin_register_client_body.php";
		$template['footer'] = "footer/view_footer.php";
		
		$template['states'] = $this->model_order->get_states();
		$template['towns'] = $this->model_order->get_towns();
			
		$this->load->view('main',$template);
	}


	//Registra un usuario 
	function register_client() 
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$this->load->library('PasswordHash');
		$datos['states'] = $this->model_order->get_states();
		$datos['towns'] = $this->model_order->get_towns();
		/*$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	 	
	 	//Valida los campos que se reciben
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|is_unique[t_user.mail]');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('first_name','Nombre','required|xss_clean');
		$this->form_validation->set_rules('last_name','Apellido','required|xss_clean');
		$this->form_validation->set_rules('rfc','RFC','required|xss_clean');
		$this->form_validation->set_rules('phone','Teléfono','required|numeric|xss_clean');
		$this->form_validation->set_rules('cellphone','Celular','required|numeric|xss_clean');
		$this->form_validation->set_rules('farm_name','Agrícola','required|xss_clean');
		$this->form_validation->set_rules('street','Calle','required|xss_clean');
		$this->form_validation->set_rules('addr_number','Número','required|xss_clean');
		$this->form_validation->set_rules('colony','Colonia','required|xss_clean');
		$this->form_validation->set_rules('state','Estado','required|xss_clean|callback_sel_estado');
		$this->form_validation->set_rules('cp','Código postal','required|exact_length[5]|xss_clean');
		$this->form_validation->set_rules('social_reason','Razón social','required|xss_clean');
		$this->form_validation->set_rules('company_phone','Teléfono empresa','required|xss_clean');

		//Algunos datos no son correctos y se tiene que lenar de nuevo
		if($this->form_validation->run() == TRUE) 
		{
			//vuelve a la pagina de registro e imprime los errores
			$error['msj'] = "Error";
			$error['errores'] = "Hay errores en la forma";
			$error['template'] = $this->load->view('body/view_admin_register_client_body',$datos,TRUE);
			echo json_encode($error);
		}
		//Los datos son correctos y se redirecciona para login
		else
		{
			//$this->load->library('PasswordHash');
			//Genera un password bcrypt del input
			//$hash = $this->passwordhash->HashPassword($this->input->post('password'));
			// if ( strlen( $hash ) < 20 ) 
			// {
			// 	$error['msj'] = "Error";
			// 	$error['errores'] = "Error al encriptar contraseña";
			// 	$error['template'] = $this->load->view('view_admin_register_client_body',$datos,TRUE);
			// 	echo json_encode($error);
			// 	exit();
			// }*/

			//Obtiene tdos los campos a guardar del usuario en un arreglo
			$data['id_rol'] = $this->input->post('rol');
			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['mail'] = $this->input->post('email');
			//$data['password'] = $hash;
			$data['rfc'] = $this->input->post('rfc');
			$data['phone'] = $this->input->post('phone');
			$data['cellphone'] = $this->input->post('cellphone');
			$data['farm_name'] = $this->input->post('farm_name');
			$data['street'] = $this->input->post('street');
			$data['address_number'] = $this->input->post('addr_number');
			$data['colony'] = $this->input->post('colony');
			$data['id_town'] = $this->input->post('town');
			$data['cp'] = $this->input->post('cp');
			$data['social_reason'] = $this->input->post('social_reason');
			$data['company_phone'] = $this->input->post('company_phone');

			$data['password']=$this->passwordhash->HashPassword($this->input->post('password'));

			//Verifica si hubo una tupla modificada o agregada
			if($this->model_user->insert_client_user($data) > 0 )
			{
				/*unset($data);
				$data['msj'] = "Exito";
				$data['template'] = $this->load->view('body/view_admin_register_client_body',$datos,TRUE);
				echo json_encode($data);*/
				redirect("admin/list_clients", "refresh");

				
			}
			/*else
			{
				unset($data);
				$error['msj'] = "Error";
				$error['errores'] = "Error al guardar al usuario";
				$error['template'] = $this->load->view('body/view_admin_register_client_body',$datos,TRUE);
				echo json_encode($error);
			}
		}*/ 
	}
	
	//funcion que edita un cliente
	function update_client() 
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$datos['states'] = $this->model_order->get_states();
		$datos['towns'] = $this->model_order->get_towns();
		/*$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	 	
	 	//Valida los campos que se reciben
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('first_name','Nombre','required|xss_clean');
		$this->form_validation->set_rules('last_name','Apellido','required|xss_clean');
		$this->form_validation->set_rules('rfc','RFC','required|xss_clean');
		$this->form_validation->set_rules('phone','Teléfono','required|numeric|xss_clean');
		$this->form_validation->set_rules('cellphone','Celular','numeric|xss_clean');
		$this->form_validation->set_rules('farm_name','Agrícola','required|xss_clean');
		$this->form_validation->set_rules('street','Calle','required|xss_clean');
		$this->form_validation->set_rules('addr_number','Número','required|xss_clean');
		$this->form_validation->set_rules('colony','Colonia','required|xss_clean');
		$this->form_validation->set_rules('state','Estado','required|xss_clean|callback_sel_estado');
		$this->form_validation->set_rules('cp','Código postal','required|exact_length[5]|xss_clean');
		$this->form_validation->set_rules('social_reason','Razón social','required|xss_clean');
		$this->form_validation->set_rules('company_phone','Teléfono empresa','required|xss_clean');

		//Algunos datos no son correctos y se tiene que lenar de nuevo
		if($this->form_validation->run() == FALSE) 
		{		
			//vuelve a la pagina de registro e imprime los errores
			
			$error['msj'] = "Error";
			$error['errores'] = "Hay errores en la forma";
			$error['template'] = $this->load->view('body/view_admin_edit_client_body_empty',$datos,TRUE);
			echo json_encode($error);

		}
		//Los datos son correctos y se redirecciona para login
		else
		{		*/	
			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['mail'] = $this->input->post('email');
			//$data['password'] = $hash;
			$data['rfc'] = $this->input->post('rfc');
			$data['phone'] = $this->input->post('phone');
			$data['cellphone'] = $this->input->post('cellphone');
			$data['farm_name'] = $this->input->post('farm_name');
			$data['street'] = $this->input->post('street');
			$data['address_number'] = $this->input->post('addr_number');
			$data['colony'] = $this->input->post('colony');
			$data['id_town'] = $this->input->post('town');
			$data['cp'] = $this->input->post('cp');
			$data['social_reason'] = $this->input->post('social_reason');
			$data['company_phone'] = $this->input->post('company_phone');
		
			/*

			//Verifica si hubo una tupla modificada o agregada
			if(*/$this->model_user->update_client_user($this->uri->segment(3),$data); /*> 0 )
			{
				unset($data);
				$data['msj'] = "Exito";
				$data['template'] = $this->load->view('body/view_admin_edit_client_body_empty',$datos,TRUE);
				echo json_encode($data);
			}
			else
			{
				unset($data);
				$error['msj'] = "Error";
				$error['errores'] = "Error al guardar al usuario";
				$error['template'] = $this->load->view('body/view_admin_edit_client_body_empty',$datos,TRUE);
				echo json_encode($error);
			}
		}*/
		redirect('admin/list_clients','refresh');



	}

	function delete_client()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		foreach ($_POST as $key => $value) 
		{
			if(is_int($key))
			{
				$llave=$key;
			}
		}
		$this -> model_user -> delete_client($llave);
		redirect("admin/list_clients", "refresh");
	}


	//Verifica que el usuario haya seleccionado algún estado al registrarse
	function sel_estado()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		if($this->input->post('state') == "-1")
		{
			$this->form_validation->set_message('sel_estado', 'Selecciona un %s.');
			return FALSE;
		}
		return TRUE;
	}

	//AJAX:Función que regresa todas las ciudades de un estado
	public function get_towns()
	{	
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_state = $this->input->post('id_state');
	
		$towns = $this->model_order->get_town($id_state);
		$result = "";
		foreach ($towns as $key) 
		{
			$result = $result . "<option value='" . $key->id_town . "'>" . $key->town_name . "</option>";
		}
		echo $result;
	}

	//funcion que caraga informacion para editar al cliente
	function edit(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id = $this->uri->segment(3);
		$template['client']=$this->model_user->obtenerCliente($id);
		$template['header'] = "header/view_admin_header.php";
		$template['body'] = "body/view_admin_edit_client_body.php";
		$template['footer'] = "footer/view_footer.php";
		
		$template['states'] = $this->model_order->get_states();
		$template['towns'] = $this->model_order->get_towns();
			
		$this->load->view('main',$template);
		
	}

	function edit2($id_user){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id = $id_user;
		$template['client']=$this->model_user->obtenerCliente($id);
		$template['header'] = "header/view_admin_header.php";
		$template['body'] = "body/view_admin_edit_client_body.php";
		$template['footer'] = "footer/view_footer.php";
		
		$template['states'] = $this->model_order->get_states();
		$template['towns'] = $this->model_order->get_towns();
			
		$this->load->view('main',$template);
		
	}
	
	function carga_tabla()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$this->load->view("extra/tabla_empresa.php");
	}


	//---------------------------------
	// AJAX REQUEST, IF EMAIL EXISTS
	//---------------------------------
	function register_email_exists()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$email = $this->input->post('email');

	    if($this->model_user->email_exists($email)) {
	        echo "false";
	    } else {
	        echo "true";
	    }
	}

	public function change_pass(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('password1', 'password1', 'trim|required|xss_clean|callback_check_user');
	 	
		if($this->form_validation->run() == FALSE) 
		{	
			$this->edit2($this->uri->segment(3));
			?>
			<script>
			alert("La Contrase\u00f1a de Administrador ingresada es incorrecta. No se realizo ningun cambio.");
			</script>
			<?php
		}
		else
		{

			$password=$this->passwordhash->HashPassword($this->input->post('password2'));
			$this->model_user->update_pass_client($password,$this->uri->segment(3));
			?>
			<script>
			alert("La contrase\u00f1a se modifico con exito!");
			</script>
			<?php
			$this->edit2($this->uri->segment(3));

		}
	}

	 function check_user()
	 {
	 	if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
	 	//Carga libreria para encriptar password
	 	$this->load->library('PasswordHash');
		
	 	$pass = $this->input->post('password1');
	 	//Obtiene al usuario 
	 	$user = $this->model_user->login($this->session->userdata('mail'));

	 	//Verifica que exista el usuario
	 	if($user)
	 	{
	 		//Verifica que el password dado y el de la base de datos sean iguales despues de la encripción
	 		if($this->passwordhash->CheckPassword($pass,$user->password))
	 		{
	 			//Establece los datos de sesión
	 			$sessionData = array(
	                "id" => $user->id_user,
	                "mail" => $user->mail,
	                "logged_in" => TRUE,
	                "id_rol" => $user->id_rol,
	            );
	            $this->session->set_userdata($sessionData);
		 		return TRUE;
	 		}
	 		else
	 		{
	 			$this->form_validation->set_message('check_user', 'error');
	 			return FALSE;
	 		}
	 	}
	 	else 
	 	{
	 		$this->form_validation->set_message('check_user', 'error');
	 		return FALSE;
	 	}
	 }

	public function client_message()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}

		$template['client']=$this->model_user->get_clients();

		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_message.php';
		$template['footer'] = "footer/view_footer.php";
		

		$this->load->view('main',$template);

	}

	public function message(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}

		$id_user=$this->input->post('client');
		$type_message=$this->input->post('type');
		$message=$this->input->post('message');
		
		if($type_message==1){
			if($this->model_user->get_message($id_user,$type_message)!=false){
				$this->model_user->update_message($id_user,$type_message,$message);
			}else{
				$this->model_user->add_message($id_user,$type_message,$message);
			}

		}else{
			$this->model_user->add_message($id_user,$type_message,$message);
		}
		?>
		<script>
			alert("El mensaje fue enviado con exito!");
		</script>
		<?php
		redirect('admin/client_message', "refresh");

	}

	public function client_log_info()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_info_log_client.php';
		$template['footer'] = "footer/view_footer.php";
		
		$template['time_client'] =$this->model_user->get_time_client();

		$this->load->view('main',$template);
	}

	public function client_inform()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}

		$template['client']=$this->model_user->get_clients();

		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_client_inform.php';
		$template['footer'] = "footer/view_footer.php";
		

		$this->load->view('main',$template);

	}

	public function get_order(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_user=$this->input->post('id_user');
		$order=$this->model_user->get_order($id_user);
		$result="";
		foreach ($order as $key ) {
			$result= $result."<option value='$key->id_order'>" ."#". $key->id_order." Agricultor:".$key->farmer ."</option>";
		}
		echo "<option value='-1'>---Selecciona una Orden---</option>";
		echo $result;
	}

	public function get_breakdown_order(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_order=$this->input->post('id_order');
		$breakdown=$this->model_user->get_breakdown($id_order);
		$result="";
		$modal="";
		$javascript="";
		if(is_array($breakdown)){
			foreach ($breakdown as $key ) {
			$result.= "<a href='#myModal".$key->id_breakdown."' class='btn btn-default'
	                    title='".$key->variety."/".$key->rootstock."'
	                    data-toggle='modal'>
						<i class='fa fa-file-archive-o'></i>
	                </a>";
	        $modal.=form_open('/'.$this->uri->segment(3))."
			<div id='myModal".$key->id_breakdown."' class='modal fade'>
        		<div class='modal-dialog modal-lg'>
            		<div class='modal-content'>
                		<div class='modal-header'>
                			<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                			<h4 class='modal-title'>Informe</h4>
                		</div>
                		<div class='modal-body'>
	                		<h3>Nombre del Cliente</h3>
								<div class='input-group input-group-lg'>
									<input type='text' class='form-control' placeholder='Nombre del cliente' name='final_volume' id='final_volume'>
								</div>
							<div >&nbsp</div>
							<h3>Texto Informe</h3>
								<div class='input-group input-group-lg'>
									<textarea class='form-control' rows='4' style='height: auto !important;' id='inform_text' name='inform_text' ></textarea>								
								</div>
	                		
	                		<div >&nbsp</div>
	                		<div class='input-group input-group-lg'>
		                		<div class='col-xs-12'>
			                		<div class='col-xs-6'>
			                			<div id='recepcion".$key->id_breakdown."' style='display: none;'>
			                				<h3 style='color:#6BBD44'>Recepcion</h3>
				                			<p><b>Fecha:</b><input type='text' class='form-control' placeholder='Fecha' name='reception_date' id='reception_date'></p>
			                			</div>
			                			<div >&nbsp</div>
			                			<div id='siembra_ger".$key->id_breakdown."' style='display: none;'>
				                			<h3 style='color:#6BBD44'>Siembra/Germinacion</h3>
				                			<p><b>Variedad:</b>
				                				<input type='text' class='form-control' placeholder='Variedad' name='variety' id='variety'></p>
				                			<p><b>Fecha de Siembra:</b>
				                				<input type='text' class='form-control' placeholder='Fecha de Siembra' name='sowing_date_variety' id='sowing_date'></p>
				                			<p><b>% Germinacion:</b>
				                				<input type='text' class='form-control' placeholder='% Germinacion' name='germiantion_variety' id='germination_variety'></p>
				                			<p><b>% Viabilidad:</b>
				                				<input type='text' class='form-control' placeholder='% Viabilidad' name='viability_variety' id='viability_variety'></p>
											<div >&nbsp</div>
				                			<p><b>Portainjerto:</b>
				                				<input type='text' class='form-control' placeholder='Portainjerto' name='rootstock' id='rootstock'></p>
				                			<p><b>Fecha de Siembra:</b>
				                				<input type='text' class='form-control' placeholder='sowing_date_rootstock' name='variety' id='variety'></p>
				                			<p><b>% Germinacion:</b>
				                				<input type='text' class='form-control' placeholder='% Germinacion' name='germiantion_rootstock' id='germination_rootstock'></p>
				                			<p><b>% Viabilidad:</b>
				                			<input type='text' class='form-control' placeholder='% Viabilidad' name='viability_rootstock' id='viability_rootstock'></p>
			                			</div>
			                			<div >&nbsp</div>
			                			<div id='injerto".$key->id_breakdown."' style='display: none;'>
				                			<h3 style='color:#6BBD44'>Injerto</h3>
				                			<p><b>Fecha:</b>
				                				<input type='text' class='form-control' placeholder='Fecha' name='graft_date' id='graft_date'></p>
			                			</div>
			                			<div >&nbsp</div>
			                			<div id='transplante".$key->id_breakdown."' style='display: none;'>
			                				<h3 style='color:#6BBD44'>Transplante</h3>
				                			<p><b>Fecha:</b>
				                				<input type='text' class='form-control' placeholder='Fecha' name='transplant_date' id='transplant_date'></p>
			                			</div>
			                			<div >&nbsp</div>
			                			<div id='pinchado".$key->id_breakdown."' style='display: none;'>
			                				<h3 style='color:#6BBD44'>Pinchado</h3>
				                			<p><b>Fecha:</b>	
				                				<input type='text' class='form-control' placeholder='Fecha' name='date_punch' id='date_punch'></p>
			                			</div>
			                			<div >&nbsp</div>
			                			<div id='empaque".$key->id_breakdown."' style='display: none;'>
			                				<h3 style='color:#6BBD44'>Empaque</h3>
				                			<p><b>Fecha:</b>
				                				<input type='text' class='form-control' placeholder='Fecha' name='empak_date' id='empak_date'></p>
			                			</div>
			                			<div >&nbsp</div>
			                			<div id='embarque".$key->id_breakdown."' style='display: none;'>
			                				<h3 style='color:#6BBD44'>Embarque</h3>
				                			<p><b>Fecha:</b><input type='text' class='form-control' placeholder='Fecha' name='embark_date' id='embark_date'></p>
			                			</div>
			                		</div>
			                		<div class='col-xs-6'>
			                		<h3 style='color:#6BBD44'>¿Como vamos?</h3>
			                			
										<p><input type='checkbox' name='check' id='check1".$key->id_breakdown."' value='1'/>Recepcion </p>
										<p><input type='checkbox' name='check' id='check2".$key->id_breakdown."' value='1'/>Siembra/Germinacion </p>
										<p><input type='checkbox' name='check' id='check3".$key->id_breakdown."' value='1'/>Ingerto </p>
										<p><input type='checkbox' name='check' id='check4".$key->id_breakdown."' value='1'/>Transplante </p>
										<p><input type='checkbox' name='check' id='check5".$key->id_breakdown."' value='1'/>Pinchado </p>
										<p><input type='checkbox' name='check' id='check6".$key->id_breakdown."' value='1'/>Empaque </p>
										<p><input type='checkbox' name='check' id='check7".$key->id_breakdown."' value='1'/>Embarque </p>
										
									</div>
								</div>
							</div>
						</div>
                		<div class='modal-footer'>
								<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
                    			<button type='submit' class='btn btn-success' name='embarcar' id='embarcar'>Confirmar</button>
                		</div>
						</form>
            		</div>
        		</div>
    		</div>";    
    		$javascript.='<script>
			    $("#check1'.$key->id_breakdown.'").click(function() {  
					if (document.getElementById("check1'.$key->id_breakdown.'").checked){
						document.getElementById("recepcion'.$key->id_breakdown.'").style.display = "block";
					}
					else {
						document.getElementById("recepcion'.$key->id_breakdown.'").style.display = "none";
					}
				});
				$("#check2'.$key->id_breakdown.'").click(function() {  
					if (document.getElementById("check2'.$key->id_breakdown.'").checked){
						document.getElementById("siembra_ger'.$key->id_breakdown.'").style.display = "block";
					}
					else {
						document.getElementById("siembra_ger'.$key->id_breakdown.'").style.display = "none";
					}
				});
				$("#check3'.$key->id_breakdown.'").click(function() {  
					if (document.getElementById("check3'.$key->id_breakdown.'").checked){
						document.getElementById("injerto'.$key->id_breakdown.'").style.display = "block";
					}
					else {
						document.getElementById("injerto'.$key->id_breakdown.'").style.display = "none";
					}
				});
				$("#check4'.$key->id_breakdown.'").click(function() {  
					if (document.getElementById("check4'.$key->id_breakdown.'").checked){
						document.getElementById("transplante'.$key->id_breakdown.'").style.display = "block";
					}
					else {
						document.getElementById("transplante'.$key->id_breakdown.'").style.display = "none";
					}
				});
				$("#check5'.$key->id_breakdown.'").click(function() {  
					if (document.getElementById("check5'.$key->id_breakdown.'").checked){
						document.getElementById("pinchado'.$key->id_breakdown.'").style.display = "block";
					}
					else {
						document.getElementById("pinchado'.$key->id_breakdown.'").style.display = "none";
					}
				});
				$("#check6'.$key->id_breakdown.'").click(function() {  
					if (document.getElementById("check6'.$key->id_breakdown.'").checked){
						document.getElementById("empaque'.$key->id_breakdown.'").style.display = "block";
					}
					else {
						document.getElementById("empaque'.$key->id_breakdown.'").style.display = "none";
					}
				});
				$("#check7'.$key->id_breakdown.'").click(function() {  
					if (document.getElementById("check7'.$key->id_breakdown.'").checked){
						document.getElementById("embarque'.$key->id_breakdown.'").style.display = "block";
					}
					else {
						document.getElementById("embarque'.$key->id_breakdown.'").style.display = "none";
					}
				});
			</script>';   
			}
			echo $result;
			echo $modal;
			echo $javascript;
		}else echo "";
		
	}
}