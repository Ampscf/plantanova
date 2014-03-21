<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	}

	public function index()
	{
		$this->load->helper(array('form'));
		$template['header'] = "main_header.php";
		$template['template'] = "login_view.php";
		$template['footer'] = "main_footer.php";
		$this->load->view('main',$template);
	}

	function login() 
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');
	 
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_user');
	 
		if($this->form_validation->run() == FALSE) 
		{
			$template['header'] = "main_header.php";
			$template['template'] = "login_view.php";
			$template['footer'] = "main_footer.php";
			//Field validation failed.  User redirected to login page
			$this->load->view('main',$template);
		}
		else
		{
			$template['header'] = "home_header.php";
			$template['template'] = "home_view.php";
			$template['footer'] = "main_footer.php";
			//Go to private area
			$this->load->view('main',$template);
		}
	 }

	 function check_user()
	 {
	 	$mail = $this->input->post('email');
	 	$pass = $this->input->post('password');
	 	$user = $this->user_model->login($mail,$pass);
	 	if($user){
	 		$sessionData = array(

                    "id" => $user->id_usuario,
                    "mail" => $user->mail,
                    "logged_in" => true
                );

            $this->session->set_userdata($sessionData);
	 		return TRUE;
	 	}
	 	else{
	 		$this->form_validation->set_message('check_user', '%s or password are incorrect.');
	 		return FALSE;
	 	}
	 }
	
}
