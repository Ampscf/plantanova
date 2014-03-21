<?php

Class Order_model extends CI_Model	{

	function add_order($mail, $pass){
	
		$this -> db -> select('id_user, mail, password');
		$this -> db -> from('t_user');
		$this -> db -> where ('mail', $mail);
		$this -> db -> where ('password', SHA1($pass));
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query->num_rows()==1) 
		{
			return $query->row();
		} 
		else 
		{
			return false;
		}
	}

  
}

?>