<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('model_user','',TRUE);
	   $this->load->model('model_order','',TRUE);
	}

	public function index()
	{
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
		$datos['states'] = $this->model_order->get_states();
		$datos['towns'] = $this->model_order->get_towns();
		$this->load->library('form_validation');
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
		if($this->form_validation->run() == FALSE) 
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
			// }

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

			//Verifica si hubo una tupla modificada o agregada
			if($this->model_user->insert_client_user($data) > 0 )
			{
				unset($data);
				$data['msj'] = "Exito";
				$data['template'] = $this->load->view('body/view_admin_register_client_body',$datos,TRUE);
				echo json_encode($data);
			}
			else
			{
				unset($data);
				$error['msj'] = "Error";
				$error['errores'] = "Error al guardar al usuario";
				$error['template'] = $this->load->view('body/view_admin_register_client_body',$datos,TRUE);
				echo json_encode($error);
			}
		} 
	}


	//Verifica que el usuario haya seleccionado algún estado al registrarse
	function sel_estado()
	{
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
		$id_state = $this->input->post('id_state');
	
		$towns = $this->model_order->get_town($id_state);
		$result = "";
		foreach ($towns as $key) 
		{
			$result = $result . "<option value='" . $key->id_town . "'>" . $key->town_name . "</option>";
		}
		echo $result;
	}
}