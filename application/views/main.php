<?php
	include_once($header);
	if($this->session->userdata('logged_in')){
		include_once($template);
	}
	else{
		include_once('login_view');
	}
	include_once($footer); 
?>