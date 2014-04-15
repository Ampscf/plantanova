<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);	
	   $this->load->model('order_model','',TRUE);
	}
	
	public function index()
	{
		//Carga la vista de registro de cliente
		$template['header'] = "main_header.php";
		$template['template'] = "registro_view.php";
		$template['footer'] = "main_footer.php";
		$template['action'] = "register";
		
		$template['states'] = $this->order_model->get_states();
		$template['towns'] = $this->order_model->get_towns();
			
		$this->load->view('main',$template);
	}
	
	
	
	//Registra un usuario y lo redirecciona a la pagina de inicio para login	 
	function registered () 
	{
		$datos['states'] = $this->order_model->get_states();
		$datos['towns'] = $this->order_model->get_towns();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	 	
	 	//Valida los campos que se reciben
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|is_unique[t_user.mail]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
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

		//Algunos datos no son correctos y se tiene que lenar de nuevo
		if($this->form_validation->run() == FALSE) 
		{
			//vuelve a la pagina de registro e imprime los errores
			$error['msj'] = "Error";
			$error['errores'] = "Hay errores en la forma";
			$error['template'] = $this->load->view('registro_view',$datos,TRUE);
			echo json_encode($error);
		}
		//Los datos son correctos y se redirecciona para login
		else
		{
			$this->load->library('PasswordHash');
			//Genera un password bcrypt del input
			$hash = $this->passwordhash->HashPassword($this->input->post('password'));
			if ( strlen( $hash ) < 20 ) 
			{
				$error['msj'] = "Error";
				$error['errores'] = "Error al encriptar contraseña";
				$error['template'] = $this->load->view('registro_view',$datos,TRUE);
				echo json_encode($error);
				exit();
			}

			//Obtiene tdos los campos a guardar del usuario en un arreglo
			$data['id_rol'] = $this->input->post('rol');
			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['mail'] = $this->input->post('email');
			$data['password'] = $hash;
			$data['rfc'] = $this->input->post('rfc');
			$data['phone'] = $this->input->post('phone');
			$data['cellphone'] = $this->input->post('cellphone');
			$data['farm_name'] = $this->input->post('farm_name');
			$data['street'] = $this->input->post('street');
			$data['addr_number'] = $this->input->post('addr_number');
			$data['colony'] = $this->input->post('colony');
			$data['id_town'] = $this->input->post('town');
			$data['id_state'] = $this->input->post('state');
			$data['cp'] = $this->input->post('cp');

			//Verifica si hubo una tupla modificada o agregada
			if($this->user_model->insert_client_user($data) > 0 )
			{
				unset($data);
				$data['msj'] = "Exito";
				$data['template'] = $this->load->view('login_view',null,TRUE);
				echo json_encode($data);
			}
			else
			{
				unset($data);
				$error['msj'] = "Error";
				$error['errores'] = "Error al guardar al usuario";
				$error['template'] = $this->load->view('registro_view',$datos,TRUE);
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
	
}
