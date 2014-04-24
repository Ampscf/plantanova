<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('model_user','',TRUE);
	   $this->load->model('model_order','',TRUE);
	}

	public function index()
	{
		$sessionData = array(

            "id" => null,
            "mail" => null,
            "logged_in" => FALSE
        );

        $this->session->set_userdata($sessionData);

		$template['header'] = "header/view_login_header.php";
		$template['body'] = "body/view_login_body.php";
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	}


	//Verifica informacion y entra a la pagina principal con una sesion
	function log_in() 
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	 
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean|callback_check_user');
	 	
		if($this->form_validation->run() == FALSE) 
		{
			$template['header'] = "header/view_login_header.php";
			$template['body'] = "body/view_login_body.php";
			$template['footer'] = "footer/view_footer.php";
			//Error en el inicio de sesión devuelve a la pagina de inicio
			$this->load->view('main',$template);
		}
		else
		{
			//Manda a la pagina principal que contiene la lista de pedidos para Administradores de plantanova
			$template['header'] = 'header/view_admin_header.php';
			$template['body'] = 'body/view_admin_body.php';
			$template['footer'] = "footer/view_footer.php";
			//Manda los datos necesarios para cargar los pedidos y datos del usuario
			$template['pedidos'] = null;//$this->model_order->get_orders('99');
			$template['usuario'] = $this->model_user->get_admin_by_mail($this->session->userdata('mail'));

			$this->load->view('main',$template);
		}
	 }


	 //Verifica que los datos de usuario introducidos coincidan con los de la base de datos
	 function check_user()
	 {
	 	$this->load->library('PasswordHash');

	 	$mail = $this->input->post('email');
	 	$pass = $this->input->post('password');
	 	$user = $this->model_user->login($mail);

	 	if($user)
	 	{
	 		if($this->passwordhash->CheckPassword($pass,$user->password))
	 		{
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
	 			return FALSE;
	 		}
	 	}
	 	else 
	 	{
	 		return FALSE;
	 	}
	 }

	 //Destruye la sessión actual
	 function logout()
	 {
	 	$user_out = $this->session->all_userdata();
	 	$this->session->unset_userdata($user_out);
	 	session_destroy();
	 	redirect('Principal/index','refresh');
	 }
}