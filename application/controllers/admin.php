<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   	$this->load->model('model_user','',TRUE);
	   	$this->load->model('model_order','',TRUE);
	   	$this->load->model('model_embark','',TRUE);
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
			redirect("admin/list_clients", "refresh");

			
		}
			
	}

	function upload_sub_user() 
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$this->load->library('PasswordHash');
		

		//Obtiene tdos los campos a guardar del usuario en un arreglo
		$data['id_user']=$this->input->post('id_user');
		$data['mail'] = $this->input->post('mail');
		$data['password']=$this->passwordhash->HashPassword($this->input->post('password'));

		//Verifica si hubo una tupla modificada o agregada
		if($this->model_user->insert_sub_user($data) > 0 )
		{
			redirect("admin/list_clients", "refresh");

			
		}
			
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
		$status=$this->input->post('status');
		
		$id_user=$this->input->post('client');
		$type_message=$this->input->post('type');
		$message=$this->input->post('message');
		if($status!=Null){
			if($status==1){
			$this->model_user->status_client_message($id_user,$status);
			//si es pago
			if($type_message==1){
				if($this->model_user->get_message($id_user,$type_message)!=false){
					$this->model_user->update_message($id_user,$type_message,$message);
				}else{
					$this->model_user->add_message($id_user,$type_message,$message);
				}
				?>
				<script>
					alert("El mensaje fue enviado con exito!");
				</script>
				<?php

			}
			//si es alerta
			else if($type_message==2){
				$this->model_user->add_message($id_user,$type_message,$message);
				$this->model_user->status_client_message($id_user,$status);
				?>
				<script>
					alert("El mensaje fue enviado con exito!");
				</script>
				<?php
			}
			
			}else if($status==0){
				$this->model_user->status_client_message($id_user,$status);
				if($type_message==1){
					if($this->model_user->get_message($id_user,$type_message)!=false){
						$this->model_user->update_message($id_user,$type_message,$message);
					}else{
						$this->model_user->add_message($id_user,$type_message,$message);
					}
					?>
					<script>
						alert("El mensaje fue enviado con exito!");
					</script>
					<?php

				}
				//si es alerta
				else if($type_message==2){
					$this->model_user->add_message($id_user,$type_message,$message);
					$this->model_user->status_client_message($id_user,$status);
					?>
					<script>
						alert("El mensaje fue enviado con exito!");
					</script>
					<?php
				}
			}

		}else{
			if($type_message==1){
				if($this->model_user->get_message($id_user,$type_message)!=false){
					$this->model_user->update_message($id_user,$type_message,$message);
				}else{
					$this->model_user->add_message($id_user,$type_message,$message);
				}
				?>
				<script>
					alert("El mensaje fue enviado con exito!");
				</script>
				<?php

			}
			//si es alerta
			else if($type_message==2){
				$this->model_user->add_message($id_user,$type_message,$message);
				$this->model_user->status_client_message($id_user,$status);
				?>
				<script>
					alert("El mensaje fue enviado con exito!");
				</script>
				<?php
			}
		}
		
		
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
			$result= $result."<option value='$key->id_order'>" ."#". $key->order_number." Agricultor: ".$key->farmer ."</option>";
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

		$order=$this->model_order->get_order_id_order($id_order);
		$user=$this->model_user->get_client($order->result()[0]->id_client);
		$embarque=$this->model_embark->get_embark($id_order);
		if($embarque==false){
			$embark_date="";
		}else{
			$embark_date=date("d-m-Y",strtotime($embarque->result()[0]->date_delivery));
		}
		$boton="";
		$modal="";
		$javascript="";
		if(is_array($breakdown)){
			foreach ($breakdown as $key ) {
				
				$inform_client=$this->model_user->get_inform_client($key->id_breakdown);

				if($inform_client == false){
					$seed= $this->model_user->seeds($key->variety,$key->rootstock,$id_order);
						if($seed==false){
							$seed_date="";
						}else{
							$seed_date=date("d-m-Y",strtotime($seed[0]->seeds_date));
						}

						$germination_variety=$this->model_user->get_germination($key->variety,$id_order);
						if($germination_variety==false){
							$gv_seed_name="";
							$gv_germ_date="";
							$gv_germ_percentage="";
							$gv_viability="";
						}else{
							$gv_seed_name=$germination_variety[0]->seed_name;
							$gv_germ_date=date("d-m-Y",strtotime($germination_variety[0]->germ_date));
							$gv_germ_percentage=$germination_variety[0]->germ_percentage;
							$gv_viability=$germination_variety[0]->viability;
						}

						$germination_rootstock=$this->model_user->get_germination($key->rootstock,$id_order);
						if($germination_rootstock==false){
							$gr_seed_name="";
							$gr_germ_date="";
							$gr_germ_percentage="";
							$gr_viability="";
						}else{
							$gr_seed_name=$germination_rootstock[0]->seed_name;
							$gr_germ_date=date("d-m-Y",strtotime($germination_rootstock[0]->germ_date));
							$gr_germ_percentage=$germination_rootstock[0]->germ_percentage;
							$gr_viability=$germination_rootstock[0]->viability;
						}

						$injerto=$this->model_order->get_graft($key->id_breakdown);
						if($injerto==false){
							$graft_date="";
						}else{
							$graft_date=date("d-m-Y",strtotime($injerto[0]->process_date));
						}

						$pinchado=$this->model_order->get_punch($key->id_breakdown);
						if($pinchado==false){
							$punch_date="";
						}else{
							$punch_date=date("d-m-Y",strtotime($pinchado[0]->process_date));
						}

						$transplante=$this->model_order->get_transplant($key->id_breakdown);
						if($transplante==false){
							$transplant_date="";
						}else{
							$transplant_date=date("d-m-Y",strtotime($transplante[0]->process_date));
						}

						$modal.=form_open_multipart('admin/inform_client/'.$key->id_breakdown)."
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
													<input type='text' class='form-control' placeholder='Nombre del cliente' name='client_name".$key->id_breakdown."' id='client_name".$key->id_breakdown."' value='".$user[0]->first_name." ".$user[0]->last_name."'>
												</div>
											<div >&nbsp</div>
											<h3>Texto Informe</h3>
												<div class='input-group input-group-lg'>
													<textarea class='form-control' rows='4' style='height: auto !important;' id='inform_text".$key->id_breakdown."' name='inform_text".$key->id_breakdown."' ></textarea>								
												</div>
					                		
					                		<div>&nbsp</div>
					                		<div class='input-group input-group-lg'>
						                		<div class='col-xs-12'>
							                		<div class='col-xs-6'>
							                			<div id='recepcion".$key->id_breakdown."' style='display: none;'>
							                				<h3 style='color:#6BBD44'>Recepcion</h3>
								                			<p><b>Fecha:</b></p>
															<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate1".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker1".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='reception_date".$key->id_breakdown."' name='reception_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$seed_date."' readonly></p>
							                			</div>
							                			<div >&nbsp</div>
							                			<div id='siembra_ger".$key->id_breakdown."' style='display: none;'>
								                			<h3 style='color:#6BBD44'>Siembra/Germinacion</h3>
								                			<div id='divvariety".$key->id_breakdown."' style='display: none;'>
									                			<p><b>Variedad:</b>
									                				<input type='text' class='form-control' placeholder='Variedad' name='variety".$key->id_breakdown."' id='variety".$key->id_breakdown."' value='".$gv_seed_name."'></p>
									                			<p><b>Fecha de Siembra:</b></p>
																	<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate2".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker2".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='variety_sowing_date".$key->id_breakdown."' name='variety_sowing_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$gv_germ_date."' readonly></p>
									                			<p><b>% Germinacion:</b>
									                				<input type='text' class='form-control' placeholder='% Germinacion' name='variety_germination".$key->id_breakdown."' id='variety_germination".$key->id_breakdown."' value='".$gv_germ_percentage."'></p>
									                			<p><b>% Viabilidad:</b>
									                				<input type='text' class='form-control' placeholder='% Viabilidad' name='variety_viability".$key->id_breakdown."' id='variety_viability".$key->id_breakdown."' value='".$gv_viability."'></p>
																<div >&nbsp</div>
								                			</div>
								                			<div id='divrootstock".$key->id_breakdown."' style='display: none;'>
									                			<p><b>Portainjerto:</b>
									                				<input type='text' class='form-control' placeholder='Portainjerto' name='rootstock".$key->id_breakdown."' id='rootstock".$key->id_breakdown."' value='".$gr_seed_name."'></p>
									                			<p><b>Fecha de Siembra:</b></p>
																	<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate3".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker3".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='rootstock_sowing_date".$key->id_breakdown."' name='rootstock_sowing_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$gr_germ_date."' readonly></p>
									                			<p><b>% Germinacion:</b>
									                				<input type='text' class='form-control' placeholder='% Germinacion' name='rootstock_germination".$key->id_breakdown."' id='rootstock_germination".$key->id_breakdown."' value='".$gr_germ_percentage."'></p>
									                			<p><b>% Viabilidad:</b>
									                			<input type='text' class='form-control' placeholder='% Viabilidad' name='rootstock_viability".$key->id_breakdown."' id='rootstock_viability".$key->id_breakdown."' value='".$gr_viability."'></p>
							                				</div>
							                			</div>
							                			<div >&nbsp</div>
							                			<div id='injerto".$key->id_breakdown."' style='display: none;'>
								                			<h3 style='color:#6BBD44'>Injerto</h3>
								                			<p><b>Fecha:</b></p>
																<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate4".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker4".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='graft_date".$key->id_breakdown."' name='graft_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$graft_date."' readonly></p>
							                			</div>
							                			<div >&nbsp</div>
							                			<div id='pinchado".$key->id_breakdown."' style='display: none;'>
							                				<h3 style='color:#6BBD44'>Pinchado</h3>
								                			<p><b>Fecha:</b></p>
																<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate6".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker6".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='punch_date".$key->id_breakdown."' name='punch_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$transplant_date."' readonly></p>
							                			</div>
							                			<div >&nbsp</div>
							                			<div id='transplante".$key->id_breakdown."' style='display: none;'>
							                				<h3 style='color:#6BBD44'>Transplante</h3>
								                			<p><b>Fecha:</b></p>
																<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate5".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker5".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='transplant_date".$key->id_breakdown."' name='transplant_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$punch_date."' readonly></p>
							                			</div>
							                			<div >&nbsp</div>
							                			<div id='empaque".$key->id_breakdown."' style='display: none;'>
							                				<h3 style='color:#6BBD44'>Empaque</h3>
								                			<p><b>Fecha:</b></p>
																<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate7".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker7".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='pack_date".$key->id_breakdown."' name='pack_date".$key->id_breakdown."' style='width:90%; float: right;' readonly></p>
							                			</div>
							                			<div >&nbsp</div>
							                			<div id='embarque".$key->id_breakdown."' style='display: none;'>
							                				<h3 style='color:#6BBD44'>Embarque</h3>
								                			<p><b>Fecha:</b></p>
																<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate8".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker8".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='embark_date".$key->id_breakdown."' name='embark_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$embark_date."' readonly></p>
							                			</div>
							                		</div>
							                		<div class='col-xs-6'>
							                		<h3 style='color:#6BBD44'>¿Como vamos?</h3>
							                			
														<p><input type='checkbox' name='check1".$key->id_breakdown."' id='check1".$key->id_breakdown."' value='1'/>Recepcion </p>
														<p><input type='checkbox' name='check2".$key->id_breakdown."' id='check2".$key->id_breakdown."' value='1'/>Siembra/Germinacion </p>
														<div id='siem_ger".$key->id_breakdown."' style='display: none;'>
															<p>&nbsp;&nbsp;<input type='checkbox' name='check21".$key->id_breakdown."' id='check21".$key->id_breakdown."' value='1'/>Variedad
															<input type='checkbox' name='check22".$key->id_breakdown."' id='check22".$key->id_breakdown."' value='1'/>Portainjerto </p>
														</div>
														<p><input type='checkbox' name='check3".$key->id_breakdown."' id='check3".$key->id_breakdown."' value='1'/>Injerto </p>
														<p><input type='checkbox' name='check4".$key->id_breakdown."' id='check4".$key->id_breakdown."' value='1'/>Pinchado </p>
														<p><input type='checkbox' name='check5".$key->id_breakdown."' id='check5".$key->id_breakdown."' value='1'/>Transplante </p>
														<p><input type='checkbox' name='check6".$key->id_breakdown."' id='check6".$key->id_breakdown."' value='1'/>Empaque </p>
														<p><input type='checkbox' name='check7".$key->id_breakdown."' id='check7".$key->id_breakdown."' value='1'/>Embarque </p>
														
													</div>
												</div>
												<div >&nbsp</div>
												<div class='col-xs-12'>
													<div class='col-xs-6'>
														<h3 style='color:#6BBD44'>Cualquier duda o comentario estamos a sus órdenes</h3>
														<h3><b>Teresa Ugalde</b></h3>
														<p style='margin-top: -15px;'>Atención a clientes</p>
														<p style='margin-top: -15px;'>t.ugalde@plantanova.com.mx</p>
														<p style='margin-top: -15px;'>(442) 229 1861 y (442) 229 1905 </p>
													</div>
													<div class='col-xs-6' style='background-color: #D0E3CA;'>
												  		<h3 style='color:#6BBD44'>Pagos</h3>
														<textarea rows='3' style='height: auto !important; width:100%; background-color: #D0E3CA;' id='pay_text".$key->id_breakdown."' name='pay_text".$key->id_breakdown."' ></textarea>								
													</div>
												</div>
												<div >&nbsp</div>
												<div class='col-xs-12'>
													<div class='col-xs-4'>
												  		<h3 style='color:#6BBD44'>Elige una imagen</h3>
														<input id='uploadFile".$key->id_breakdown."' placeholder='Elige una imagen' disabled='disabled' style='height: 30px; width: 100%;' value=''/>
														<div class='fileUpload btn btn-success' style='width: 100%; margin: 0px; margin-top: 10px;'>
							    							<span>Buscar</span>
														    <input id='uploadBtn".$key->id_breakdown."' type='file' class='upload' name='userfile1'/>
														</div>
														<script>
															document.getElementById('uploadBtn".$key->id_breakdown."').onchange = function () {
												    			document.getElementById('uploadFile".$key->id_breakdown."').value = this.value;
															};
														</script>
													</div>
													<div class='col-xs-4'>
														<h3 style='color:#6BBD44'>Elige una imagen</h3>
														<input id='uploadFile2".$key->id_breakdown."' placeholder='Elige una imagen' disabled='disabled' style='height: 30px; width: 100%;' value=''/>
														<div class='fileUpload btn btn-success' style='width: 100%; margin: 0px; margin-top: 10px;'>
							    							<span>Buscar</span>
														    <input id='uploadBtn2".$key->id_breakdown."' type='file' class='upload' name='userfile2'/>
														</div>

														<script>
															document.getElementById('uploadBtn2".$key->id_breakdown."').onchange = function () {
												    			document.getElementById('uploadFile2".$key->id_breakdown."').value = this.value;
															};
														</script>
													</div>
													<div class='col-xs-4'>
														<h3 style='color:#6BBD44'>Elige una imagen</h3>
														<input id='uploadFile3".$key->id_breakdown."' placeholder='Elige una imagen' disabled='disabled' style='height: 30px; width: 100%;' value=''/>
														<div class='fileUpload btn btn-success' style='width: 100%; margin: 0px; margin-top: 10px;'>
							    							<span>Buscar</span>
														    <input id='uploadBtn3".$key->id_breakdown."' type='file' class='upload' name='userfile3'/>
														</div>

														<script>
															document.getElementById('uploadBtn3".$key->id_breakdown."').onchange = function () {
												    			document.getElementById('uploadFile3".$key->id_breakdown."').value = this.value;
															};
														</script>
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
				}else{
					if($inform_client[0]->reception_date == Null){
						$reception_date="";
					}else{
						$reception_date=date("d-m-Y",strtotime($inform_client[0]->reception_date));
					}
					if($inform_client[0]->variety_sowing_date == Null){
						$variety_sowing_date="";
					}else{
						$variety_sowing_date=date("d-m-Y",strtotime($inform_client[0]->variety_sowing_date));
					}
					if($inform_client[0]->rootstock_sowing_date == Null){
						$rootstock_sowing_date="";
					}else{
						$rootstock_sowing_date=date("d-m-Y",strtotime($inform_client[0]->rootstock_sowing_date));
					}
					if($inform_client[0]->graft_date == Null){
						$graft_date="";
					}else{
						$graft_date=date("d-m-Y",strtotime($inform_client[0]->graft_date));
					}
					if($inform_client[0]->transplant_date == Null){
						$transplant_date="";
					}else{
						$transplant_date=date("d-m-Y",strtotime($inform_client[0]->transplant_date));
					}
					if($inform_client[0]->punch_date == Null){
						$punch_date="";
					}else{
						$punch_date=date("d-m-Y",strtotime($inform_client[0]->punch_date));
					}
					if($inform_client[0]->pack_date == Null){
						$pack_date="";
					}else{
						$pack_date=date("d-m-Y",strtotime($inform_client[0]->pack_date));
					}
					if($inform_client[0]->embark_date == Null){
						$embark_date="";
					}else{
						$embark_date=date("d-m-Y",strtotime($inform_client[0]->embark_date));
					}

					if($inform_client[0]->userfile1 != Null){
						$a="<a href='/plantanova/uploads/".$inform_client[0]->userfile1."' 
                			title='".$inform_client[0]->userfile1."'
                			data-toggle='modal'
                			target='_blank'>
							<img src='/plantanova/uploads/".$inform_client[0]->userfile1."' style='width:100%; height:200px'></a>";
					}else{
						$a='';
					}
					if($inform_client[0]->userfile2 != Null){
						$b="<a href='/plantanova/uploads/".$inform_client[0]->userfile2."' 
                			title='".$inform_client[0]->userfile2."'
                			data-toggle='modal'
                			target='_blank'>
							<img src='/plantanova/uploads/".$inform_client[0]->userfile2."' style='width:100%; height:200px'></a>";
					}
					else{
						$b='';
					}
					if($inform_client[0]->userfile3 != Null){
						$c="<a href='/plantanova/uploads/".$inform_client[0]->userfile3."' 
                			title='".$inform_client[0]->userfile3."'
                			data-toggle='modal'
                			target='_blank'>
							<img src='/plantanova/uploads/".$inform_client[0]->userfile3."' style='width:100%; height:200px'></a>";
					}
					else{
						$c='';
					}
					$modal.= form_open_multipart('admin/inform_client/'.$key->id_breakdown)."
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
													<input type='text' class='form-control' placeholder='Nombre del cliente' name='client_name".$key->id_breakdown."' id='client_name".$key->id_breakdown."' value='".$inform_client[0]->client_name."'>
												</div>
											<div >&nbsp</div>
											<h3>Texto Informe</h3>
												<div class='input-group input-group-lg'>
													<textarea class='form-control' rows='4' style='height: auto !important;' id='inform_text".$key->id_breakdown."' name='inform_text".$key->id_breakdown."' >".$inform_client[0]->inform_text."</textarea>								
												</div>
					                		
					                		<div>&nbsp</div>
					                		<div class='input-group input-group-lg'>
						                		<div class='col-xs-12'>
							                		<div class='col-xs-6'>
							                			<div id='recepcion".$key->id_breakdown."' style='display: none;'>
							                				<h3 style='color:#6BBD44'>Recepcion</h3>
								                			<p><b>Fecha:</b></p>
															<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate1".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker1".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='reception_date".$key->id_breakdown."' name='reception_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$reception_date."' readonly></p>
							                			</div>
							                			<div >&nbsp</div>
							                			<div id='siembra_ger".$key->id_breakdown."' style='display: none;'>
								                			<h3 style='color:#6BBD44'>Siembra/Germinacion</h3>
								                			<div id='divvariety".$key->id_breakdown."' style='display: none;'>
									                			<p><b>Variedad:</b>
									                				<input type='text' class='form-control' placeholder='Variedad' name='variety".$key->id_breakdown."' id='variety".$key->id_breakdown."' value='".$inform_client[0]->variety."'></p>
									                			<p><b>Fecha de Siembra:</b></p>
																	<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate2".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker2".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='variety_sowing_date".$key->id_breakdown."' name='variety_sowing_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$variety_sowing_date."' readonly></p>
									                			<p><b>% Germinacion:</b>
									                				<input type='text' class='form-control' placeholder='% Germinacion' name='variety_germination".$key->id_breakdown."' id='variety_germination".$key->id_breakdown."' value='".$inform_client[0]->variety_germination."'></p>
									                			<p><b>% Viabilidad:</b>
									                				<input type='text' class='form-control' placeholder='% Viabilidad' name='variety_viability".$key->id_breakdown."' id='variety_viability".$key->id_breakdown."' value='".$inform_client[0]->variety_viability."'></p>
																<div >&nbsp</div>
								                			</div>
								                			<div id='divrootstock".$key->id_breakdown."' style='display: none;'>
									                			<p><b>Portainjerto:</b>
									                				<input type='text' class='form-control' placeholder='Portainjerto' name='rootstock".$key->id_breakdown."' id='rootstock".$key->id_breakdown."' value='".$inform_client[0]->rootstock."'></p>
									                			<p><b>Fecha de Siembra:</b></p>
																	<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate3".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker3".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='rootstock_sowing_date".$key->id_breakdown."' name='rootstock_sowing_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$rootstock_sowing_date."' readonly></p>
									                			<p><b>% Germinacion:</b>
									                				<input type='text' class='form-control' placeholder='% Germinacion' name='rootstock_germination".$key->id_breakdown."' id='rootstock_germination".$key->id_breakdown."' value='".$inform_client[0]->rootstock_germination."'></p>
									                			<p><b>% Viabilidad:</b>
									                			<input type='text' class='form-control' placeholder='% Viabilidad' name='rootstock_viability".$key->id_breakdown."' id='rootstock_viability".$key->id_breakdown."' value='".$inform_client[0]->rootstock_viability."'></p>
							                				</div>
							                			</div>
							                			<div >&nbsp</div>
							                			<div id='injerto".$key->id_breakdown."' style='display: none;'>
								                			<h3 style='color:#6BBD44'>Injerto</h3>
								                			<p><b>Fecha:</b></p>
																<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate4".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker4".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='graft_date".$key->id_breakdown."' name='graft_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$graft_date."' readonly></p>
							                			</div>
							                			
							                			<div >&nbsp</div>
							                			<div id='pinchado".$key->id_breakdown."' style='display: none;'>
							                				<h3 style='color:#6BBD44'>Pinchado</h3>
								                			<p><b>Fecha:</b></p>
																<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate6".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker6".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='punch_date".$key->id_breakdown."' name='punch_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$punch_date."' readonly></p>
							                			</div>
							                			<div >&nbsp</div>
							                			<div id='transplante".$key->id_breakdown."' style='display: none;'>
							                				<h3 style='color:#6BBD44'>Transplante</h3>
								                			<p><b>Fecha:</b></p>
																<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate5".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker5".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='transplant_date".$key->id_breakdown."' name='transplant_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$transplant_date."' readonly></p>
							                			</div>
							                			<div >&nbsp</div>
							                			<div id='empaque".$key->id_breakdown."' style='display: none;'>
							                				<h3 style='color:#6BBD44'>Empaque</h3>
								                			<p><b>Fecha:</b></p>
																<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate7".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker7".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='pack_date".$key->id_breakdown."' name='pack_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$pack_date."' readonly></p>
							                			</div>
							                			<div >&nbsp</div>
							                			<div id='embarque".$key->id_breakdown."' style='display: none;'>
							                				<h3 style='color:#6BBD44'>Embarque</h3>
								                			<p><b>Fecha:</b></p>
																<p><a class='btn btn-default' style='height: 31px; border-radius: 0px;' id='butondate8".$key->id_breakdown."'><i class='fa fa-calendar'></i></a><input type='text' class='datepicker8".$key->id_breakdown."' placeholder='--Selecciona una Fecha--' id='embark_date".$key->id_breakdown."' name='embark_date".$key->id_breakdown."' style='width:90%; float: right;' value='".$embark_date."' readonly></p>
							                			</div>
							                		</div>
							                		<div class='col-xs-6'>
							                		<h3 style='color:#6BBD44'>¿Como vamos?</h3>
							                			
														<p><input type='checkbox' name='check1".$key->id_breakdown."' id='check1".$key->id_breakdown."' value='1'/>Recepcion </p>
														<p><input type='checkbox' name='check2".$key->id_breakdown."' id='check2".$key->id_breakdown."' value='1'/>Siembra/Germinacion </p>
														<div id='siem_ger".$key->id_breakdown."' style='display: none;'>
															<p>&nbsp;&nbsp;<input type='checkbox' name='check21".$key->id_breakdown."' id='check21".$key->id_breakdown."' value='1'/>Variedad
															<input type='checkbox' name='check22".$key->id_breakdown."' id='check22".$key->id_breakdown."' value='1'/>Portainjerto </p>
														</div>
														<p><input type='checkbox' name='check3".$key->id_breakdown."' id='check3".$key->id_breakdown."' value='1'/>Injerto </p>
														<p><input type='checkbox' name='check4".$key->id_breakdown."' id='check4".$key->id_breakdown."' value='1'/>Pinchado </p>
														<p><input type='checkbox' name='check5".$key->id_breakdown."' id='check5".$key->id_breakdown."' value='1'/>Transplante </p>
														<p><input type='checkbox' name='check6".$key->id_breakdown."' id='check6".$key->id_breakdown."' value='1'/>Empaque </p>
														<p><input type='checkbox' name='check7".$key->id_breakdown."' id='check7".$key->id_breakdown."' value='1'/>Embarque </p>
														
													</div>
												</div>
												<div >&nbsp</div>
												<div class='col-xs-12'>
													<div class='col-xs-6'>
														<h3 style='color:#6BBD44'>Cualquier duda o comentario estamos a sus órdenes</h3>
														<h3><b>Teresa Ugalde</b></h3>
														<p style='margin-top: -15px;'>Atención a clientes</p>
														<p style='margin-top: -15px;'>t.ugalde@plantanova.com.mx</p>
														<p style='margin-top: -15px;'>(442) 229 1861 ext. 802</p>
													</div>
													<div class='col-xs-6' style='background-color: #D0E3CA;'>
												  		<h3 style='color:#6BBD44'>Pagos</h3>
														<textarea rows='3' style='height: auto !important; width:100%; background-color: #D0E3CA;' id='pay_text".$key->id_breakdown."' name='pay_text".$key->id_breakdown."' >".$inform_client[0]->pay_text."</textarea>								
													</div>
												</div>
												<div >&nbsp</div>
												<div class='col-xs-12'>
													<div class='col-xs-4'>
												  		<h3 style='color:#6BBD44'>Elige una imagen</h3>
														<input id='uploadFile".$key->id_breakdown."' placeholder='Elige una imagen' disabled='disabled' style='height: 30px; width: 100%;' value='".$inform_client[0]->userfile1."'/>
														<div class='fileUpload btn btn-success' style='width: 100%; margin: 0px; margin-top: 10px;'>
							    							<span>Buscar</span>
														    <input id='uploadBtn".$key->id_breakdown."' type='file' class='upload' name='userfile1'/>
														</div>
														<script>
															document.getElementById('uploadBtn".$key->id_breakdown."').onchange = function () {
												    			document.getElementById('uploadFile".$key->id_breakdown."').value = this.value;
															};
														</script>
													</div>
													<div class='col-xs-4'>
														<h3 style='color:#6BBD44'>Elige una imagen</h3>
														<input id='uploadFile2".$key->id_breakdown."' placeholder='Elige una imagen' disabled='disabled' style='height: 30px; width: 100%;' value='".$inform_client[0]->userfile2."'/>
														<div class='fileUpload btn btn-success' style='width: 100%; margin: 0px; margin-top: 10px;'>
							    							<span>Buscar</span>
														    <input id='uploadBtn2".$key->id_breakdown."' type='file' class='upload' name='userfile2'/>
														</div>

														<script>
															document.getElementById('uploadBtn2".$key->id_breakdown."').onchange = function () {
																document.getElementById('uploadFile2".$key->id_breakdown."').value = this.value;
															};
														</script>
													</div>
													<div class='col-xs-4'>
														<h3 style='color:#6BBD44'>Elige una imagen</h3>
														<input id='uploadFile3".$key->id_breakdown."' placeholder='Elige una imagen' disabled='disabled' style='height: 30px; width: 100%;' value='".$inform_client[0]->userfile3."'/>
														<div class='fileUpload btn btn-success' style='width: 100%; margin: 0px; margin-top: 10px;'>
							    							<span>Buscar</span>
															<input id='uploadBtn3".$key->id_breakdown."' type='file' class='upload' name='userfile3'/>
														</div>

														<script>
															document.getElementById('uploadBtn3".$key->id_breakdown."').onchange = function () {
																document.getElementById('uploadFile3".$key->id_breakdown."').value = this.value;
															};
														</script>
													</div>
												</div>
												<div >&nbsp</div>
												<div class='col-xs-12'>	

													<div class='col-xs-4' id='file1".$key->id_breakdown."'>
													 	".$a."
													</div>
													
													<div class='col-xs-4'>
													 	".$b."
													</div>
													<div class='col-xs-4'>
													 	".$c."
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
				}
				

			$boton.= "<a href='#myModal".$key->id_breakdown."' class='btn btn-default'
						title='".$key->variety."/".$key->rootstock."'
	                    data-toggle='modal'>
						<i class='fa fa-file-archive-o'></i>
					</a>";
	        
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
						document.getElementById("siem_ger'.$key->id_breakdown.'").style.display = "block";
					}
					else {
						document.getElementById("siembra_ger'.$key->id_breakdown.'").style.display = "none";
						document.getElementById("siem_ger'.$key->id_breakdown.'").style.display = "none";

					}
				});
				$("#check21'.$key->id_breakdown.'").click(function() {  
					if (document.getElementById("check21'.$key->id_breakdown.'").checked){
						document.getElementById("divvariety'.$key->id_breakdown.'").style.display = "block";
					}
					else {
						document.getElementById("divvariety'.$key->id_breakdown.'").style.display = "none";
					}
				});
				$("#check22'.$key->id_breakdown.'").click(function() {  
					if (document.getElementById("check22'.$key->id_breakdown.'").checked){
						document.getElementById("divrootstock'.$key->id_breakdown.'").style.display = "block";
					}
					else {
						document.getElementById("divrootstock'.$key->id_breakdown.'").style.display = "none";
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
						document.getElementById("pinchado'.$key->id_breakdown.'").style.display = "block";
					}
					else {
						document.getElementById("pinchado'.$key->id_breakdown.'").style.display = "none";
					}
				});
				$("#check5'.$key->id_breakdown.'").click(function() {  
					if (document.getElementById("check5'.$key->id_breakdown.'").checked){
						document.getElementById("transplante'.$key->id_breakdown.'").style.display = "block";
					}
					else {
						document.getElementById("transplante'.$key->id_breakdown.'").style.display = "none";
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

				$(function() {			
					$( ".datepicker1'.$key->id_breakdown.'" ).datepicker();
				});
				$(function() {    
		      		$("#butondate1'.$key->id_breakdown.'").click(function() {
		        		$(".datepicker1'.$key->id_breakdown.'").datepicker("show");
		       		});
		    	});
				$(function() {			
					$( ".datepicker2'.$key->id_breakdown.'" ).datepicker();
				});
				$(function() {    
		      		$("#butondate2'.$key->id_breakdown.'").click(function() {
		        		$(".datepicker2'.$key->id_breakdown.'").datepicker("show");
		       		});
		    	});
				$(function() {			
					$( ".datepicker3'.$key->id_breakdown.'" ).datepicker();
				});
				$(function() {    
		      		$("#butondate3'.$key->id_breakdown.'").click(function() {
		        		$(".datepicker3'.$key->id_breakdown.'").datepicker("show");
		       		});
		    	});
				$(function() {			
					$( ".datepicker4'.$key->id_breakdown.'" ).datepicker();
				});
				$(function() {    
		      		$("#butondate4'.$key->id_breakdown.'").click(function() {
		        		$(".datepicker4'.$key->id_breakdown.'").datepicker("show");
		       		});
		    	});
				$(function() {			
					$( ".datepicker5'.$key->id_breakdown.'" ).datepicker();
				});
				$(function() {    
		      		$("#butondate5'.$key->id_breakdown.'").click(function() {
		        		$(".datepicker5'.$key->id_breakdown.'").datepicker("show");
		       		});
		    	});
				$(function() {			
					$( ".datepicker6'.$key->id_breakdown.'" ).datepicker();
				});
				$(function() {    
		      		$("#butondate6'.$key->id_breakdown.'").click(function() {
		        		$(".datepicker6'.$key->id_breakdown.'").datepicker("show");
		       		});
		    	});
				$(function() {			
					$( ".datepicker7'.$key->id_breakdown.'" ).datepicker();
				});
				$(function() {    
		      		$("#butondate7'.$key->id_breakdown.'").click(function() {
		        		$(".datepicker7'.$key->id_breakdown.'").datepicker("show");
		       		});
		    	});
				$(function() {			
					$( ".datepicker8'.$key->id_breakdown.'" ).datepicker();
				});
				$(function() {    
		      		$("#butondate8'.$key->id_breakdown.'").click(function() {
		        		$(".datepicker8'.$key->id_breakdown.'").datepicker("show");
		       		});
		    	});
				jQuery(function($){
				 	$.datepicker.regional["es"] = {
			            closeText: "Cerrar",
			            prevText: "&#x3c;Ant",
			            nextText: "Sig&#x3e;",
			            currentText: "Hoy",
			            monthNames: ["Enero","Febrero","Marzo","Abril","Mayo","Junio",
			            "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
			            monthNamesShort: ["Ene","Feb","Mar","Abr","May","Jun",
			            "Jul","Ago","Sep","Oct","Nov","Dic"],
			            dayNames: ["Domingo","Lunes","Martes","Mi&eacute;rcoles","Jueves","Viernes","S&aacute;bado"],
			            dayNamesShort: ["Dom","Lun","Mar","Mi&eacute;","Juv","Vie","S&aacute;b"],
			            dayNamesMin: ["Do","Lu","Ma","Mi","Ju","Vi","S&aacute;"],
			            weekHeader: "Sm",
			            dateFormat: "dd-mm-yy",
			            firstDay: 1,
			            isRTL: false,
			            showMonthAfterYear: false,
			            yearSuffix: ""
			        };
			    
			    	$.datepicker.setDefaults($.datepicker.regional["es"]);
				});
			
			</script>';   
			}
			echo $boton;
			echo $modal;
			echo $javascript;
		}else echo "";
		
	}

	function inform_client(){
		$id_breakdown=$this->uri->segment(3);
				
		$datos['id_breakdown']=$id_breakdown;
		$datos['client_name']=$this->input->post('client_name'.$id_breakdown);
		
		if($this->input->post("check1".$id_breakdown)==1){
			$fecha1=$this->input->post('reception_date'.$id_breakdown);
			if($fecha1==null){
				$datos['reception_date']=null;
			}else{
				$datos['reception_date']=date("Y-m-d H:i:s", strtotime($fecha1));
			}
		}else{
			$datos['reception_date']=null;
		}
		
		
		$datos['inform_text']=$this->input->post('inform_text'.$id_breakdown);
		if($this->input->post("check21".$id_breakdown)==1){
			$datos['variety']=$this->input->post('variety'.$id_breakdown);
			$fecha2=$this->input->post('variety_sowing_date'.$id_breakdown);
			if($fecha2==null){
				$datos['variety_sowing_date']=null;
			}else{
				$datos['variety_sowing_date']=date("Y-m-d H:i:s", strtotime($fecha2));
			}
			$datos['variety_germination']=$this->input->post('variety_germination'.$id_breakdown);
			$datos['variety_viability']=$this->input->post('variety_viability'.$id_breakdown);
		}else{
			$datos['variety_sowing_date']=null;
		}

		if($this->input->post("check22".$id_breakdown)==1){
			$datos['rootstock']=$this->input->post('rootstock'.$id_breakdown);
			$fecha3=$this->input->post('rootstock_sowing_date'.$id_breakdown);
			if($fecha3==null){
				$datos['rootstock_sowing_date']=null;
			}else{
				$datos['rootstock_sowing_date']=date("Y-m-d H:i:s", strtotime($fecha3));
			}
			$datos['rootstock_germination']=$this->input->post('rootstock_germination'.$id_breakdown);
			$datos['rootstock_viability']=$this->input->post('rootstock_viability'.$id_breakdown);
		}else{
			$datos['rootstock_sowing_date']=null;
		}

		if($this->input->post("check3".$id_breakdown)==1){
			$fecha4=$this->input->post('graft_date'.$id_breakdown);
			if($fecha4==null){
				$datos['graft_date']=null;
			}else{
				$datos['graft_date']=date("Y-m-d H:i:s", strtotime($fecha4));
			}
		}else{
			$datos['graft_date']=null;
		}
		if($this->input->post("check4".$id_breakdown)==1){
			$fecha5=$this->input->post('punch_date'.$id_breakdown);
			if($fecha5==null){
				$datos['punch_date']=null;
			}else{
				$datos['punch_date']=date("Y-m-d H:i:s", strtotime($fecha5));
			}
		}else{
			$datos['punch_date']=null;
		}

		if($this->input->post("check5".$id_breakdown)==1){
			$fecha6=$this->input->post('transplant_date'.$id_breakdown);
			if($fecha6==null){
				$datos['transplant_date']=null;
			}else{
				$datos['transplant_date']=date("Y-m-d H:i:s", strtotime($fecha6));
			}
		}else{
			$datos['transplant_date']=null;
		}

		if($this->input->post("check6".$id_breakdown)==1){
			$fecha7=$this->input->post('pack_date'.$id_breakdown);
			if($fecha7==null){
				$datos['pack_date']=null;
			}else{
				$datos['pack_date']=date("Y-m-d H:i:s", strtotime($fecha7));
			}
		}else{
			$datos['pack_date']=null;
		}

		if($this->input->post("check7".$id_breakdown)==1){
			$fecha8=$this->input->post('embark_date'.$id_breakdown);
			if($fecha8==null){
				$datos['embark_date']=null;
			}else{
				$datos['embark_date']=date("Y-m-d H:i:s", strtotime($fecha8));
			}
		}else{
			$datos['embark_date']=null;
		}

		$datos['pay_text']=$this->input->post('pay_text'.$id_breakdown);
		

		if($this->model_user->get_inform_client($id_breakdown) != false){
			$this->model_user->update_inform_client($datos);
		}else{
			$this->model_user->insert_inform_client($datos);
		}

		$config = array();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jepg';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		foreach ($_FILES as $key => $value)
        {
            if ($value['name'] != '')
            {
                //upload the image
                if ( $this->upload->do_upload($key))
                {
					$datas['id_breakdown'] = $datos['id_breakdown'];
					$data = $this->upload->data();
					$datas[$key]=$data['file_name'];
					$this->model_user->update_inform_client($datas);
				}
                else{
					$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
					redirect('admin/inform_client#error');
				}
            }
        }
		redirect("admin/client_inform",$refresh);
	}

	
}