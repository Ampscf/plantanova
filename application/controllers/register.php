<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);	
	}
	
	public function index()
	{
		$this->load->model('order_model');
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
		$this->load->library('form_validation');
	 	
	 	//Valida los campos que se reciben
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		//Algunos datos no son correctos y se tiene que lenar de nuevo
		if($this->form_validation->run() == FALSE) 
		{
			//vuelve a la pagina de registro e imprime los errores
			$this->index();
		}
		//Los datos son correctos y se redirecciona para login
		else
		{
			$this->load->library('PasswordHash');
			//Genera un password bcrypt del input
			$hash = $this->passwordhash->HashPassword($this->input->post('password'));
			if ( strlen( $hash ) < 20 ) 
			{
				exit("Error al crear la cuenta");
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

			//Verifica si hubo una tupla modificada o agregada
			if($this->user_model->insert_client_user($data) > 0 )
			{
				unset($data);
				$this->session->set_flashdata('nota','Su cuenta se ha creado, inicie sesión para comenzar.');
				redirect('login/index','refresh');
			}
			else
			{
				exit("Error al crear la cuenta");
			}
		} 
	}
	
}
