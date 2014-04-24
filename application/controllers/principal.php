<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Principal extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	}

	public function index()	{	
		if($this->session->userdata('logged_in'))  {
			$this->home();
		} else {
			$template['header'] = "header/view_login_header.php";
			$template['body'] = "body/view_login_body.php";
			$template['footer'] = "footer/view_footer.php";

			$this->load->view('main',$template);
		}
		

	}
	
	public function login() {
		//Metodo que contiene validaciones
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Correo electrónico', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean|callback_check_user');
		
		if($this->form_validation->run() == FALSE)  {
			$this->index();
		}
		else
		{
			$this->home();
		}
	}
	
	public function home()  {
		if($this->session->userdata('logged_in')) {
			$template['header'] = "header/view_login_header.php";
			$template['body'] = "body/view_home.php";
			$template['footer'] = "footer/view_footer.php";

			$session_data = $this->session->userdata('logged_in');
			$data['mail'] = $session_data['mail'];
			
			$this->load->view('main',$template);
		} else {
			redirect('principal', 'refresh');
		}
			
	}
	
	function check_database() {
	   //Field validation succeeded.  Validate against database
	   $email = $this->input->post('email');
	   $pass = $this->input->post('password');
	 
	   //query the database
	   $result = $this->user_model->login($email, $pass);	 
	   if($result)
	   {
	     $sess_array = array();
	     foreach($result as $row)
	     {
	       $sess_array = array(
	         'id' => $row->id,
	         'email' => $row->username
	       );
	       $this->session->set_userdata('logged_in', $sess_array);
	     }
	     return TRUE;
	   }
	   else
	   {
	     $this->form_validation->set_message('check_database', 'Correo o contraseña inválidos');
	     return false;
	   }
	 }
}