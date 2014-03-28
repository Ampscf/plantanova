<?php
	if($this->session->userdata('logged_in') == 1)
	{
		include_once($header);
		include_once($template);
	}
	else
	{
		include_once('main_header.php');
		include_once('login_view.php');
	}
	include_once($footer); 
?>