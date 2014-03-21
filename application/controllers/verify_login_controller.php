<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class VerifyLogin extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('user_model','',TRUE);
	}
	
	function index() 
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');
	 
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_user');
	 
		if($this->form_validation->run() == FALSE) 
		{
			//Field validation failed.  User redirected to login page
			$this->load->view('login_view');
		}
		else
		{
			//Go to private area
			redirect('loged', 'refresh');
		}
	 }

	 function check_user()
	 {
	 	$mail = $this->input->post('email');
	 	$pass = $this->input->post('password');

	 	if($this->user_model->login($mail,$pass)){
	 		return TRUE;
	 	}
	 	else{
	 		$this->form_validation->set_message('check_user', '%s or password are incorrect.');
	 		return FALSE;
	 	}
	 }
	
}
	
?>